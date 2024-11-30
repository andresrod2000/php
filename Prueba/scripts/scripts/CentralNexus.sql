-- Tabla de Marcas
CREATE TABLE Marcas (
    IdMarca SERIAL PRIMARY KEY,
    NombreMarca VARCHAR(100) NOT NULL
);

-- Tabla de Proveedores 
CREATE TABLE Proveedor (
    IdProveedor SERIAL PRIMARY KEY,
    NombreProveedor VARCHAR(100) NOT NULL,
    Direccion VARCHAR(200),
    Correo VARCHAR(100),
    Telefono VARCHAR(15)
);

-- Tabla de Categorías para organizar los productos
CREATE TABLE Categoria (
    IdCategoria SERIAL PRIMARY KEY,
    NombreCategoria VARCHAR(100) NOT NULL
);

-- Tabla de Promociones para registrar descuentos aplicables a productos
CREATE TABLE Promocion (
    IdPromocion SERIAL PRIMARY KEY,
    NombrePromocion VARCHAR(100) NOT NULL,
    DescuentoPorcentaje DECIMAL(5, 2) NOT NULL CHECK (DescuentoPorcentaje > 0),
    FechaInicio DATE NOT NULL,
    FechaFin DATE NOT NULL,
    Activa BOOLEAN DEFAULT TRUE
);

-- Tabla de Productos
CREATE TABLE Producto (
    IdProducto SERIAL PRIMARY KEY,
    NumeroProducto INT NOT NULL,
    NombreProducto VARCHAR(100) NOT NULL,
    MarcaProducto INT, -- Cambiado a referencia de la tabla Marcas
    ReferenciaProducto VARCHAR(100),
    StockProducto INT NOT NULL,
    IdCategoria INT,
    FOREIGN KEY (IdCategoria) REFERENCES Categoria(IdCategoria) ON DELETE SET NULL,
    FOREIGN KEY (MarcaProducto) REFERENCES Marcas(IdMarca) ON DELETE SET NULL -- Relación con la tabla Marcas
);

-- Tabla ProductoVencimiento para gestionar fechas de vencimiento de productos por lote
CREATE TABLE ProductoVencimiento (
    IdVencimiento SERIAL PRIMARY KEY,
    IdProducto INT NOT NULL,
    Lote VARCHAR(50) NOT NULL,
    FechaVencimiento DATE NOT NULL,
    Cantidad INT NOT NULL,
    FOREIGN KEY (IdProducto) REFERENCES Producto(IdProducto) ON DELETE CASCADE
);

-- Tabla de Contactos de Proveedor para gestionar múltiples contactos
CREATE TABLE ProveedorContacto (
    IdContacto SERIAL PRIMARY KEY,
    IdProveedor INT NOT NULL,
    NombreContacto VARCHAR(100) NOT NULL,
    TelefonoContacto VARCHAR(15),
    CorreoContacto VARCHAR(100),
    PosicionContacto VARCHAR(50),
    FOREIGN KEY (IdProveedor) REFERENCES Proveedor(IdProveedor) ON DELETE CASCADE
);

-- Tabla de Kardex para entradas, salidas y devoluciones de productos
CREATE TABLE Kardex (
    IdKardex SERIAL PRIMARY KEY,
    IdProducto INT NOT NULL,
    FechaMovimiento TIMESTAMP NOT NULL,
    Cantidad INT NOT NULL,
    TipoMovimiento VARCHAR(10) CHECK (TipoMovimiento IN ('entrada', 'salida', 'devolucion')),
    ValorUnidad DECIMAL(10,2),
    Motivo VARCHAR(200), -- Motivo para devoluciones
    FOREIGN KEY (IdProducto) REFERENCES Producto(IdProducto) ON DELETE CASCADE
);

-- Tabla de Compras para registrar las adquisiciones a proveedores
CREATE TABLE Compra (
    IdCompra SERIAL PRIMARY KEY,
    IdProveedor INT NOT NULL,
    FechaCompra DATE NOT NULL,
    HoraCompra TIME NOT NULL,
    TotalCompra DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (IdProveedor) REFERENCES Proveedor(IdProveedor) ON DELETE CASCADE
);

-- Tabla DetalleCompra para almacenar los productos comprados en cada compra
CREATE TABLE DetalleCompra (
    IdDetalleCompra SERIAL PRIMARY KEY,
    IdCompra INT NOT NULL,
    IdProducto INT NOT NULL,
    CantidadProducto INT NOT NULL,
    PrecioUnidad DECIMAL(10, 2) NOT NULL,
    Importe DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (IdCompra) REFERENCES Compra(IdCompra) ON DELETE CASCADE,
    FOREIGN KEY (IdProducto) REFERENCES Producto(IdProducto) ON DELETE CASCADE
);

-- Tabla de Facturas para registrar ventas
CREATE TABLE Factura (
    IdFactura SERIAL PRIMARY KEY,
    FechaFactura DATE NOT NULL,
    HoraFactura TIME NOT NULL
);

-- Tabla DetalleFactura para registrar productos en cada factura
CREATE TABLE DetalleFactura (
    IdDetalleFactura SERIAL PRIMARY KEY,
    IdFactura INT NOT NULL,
    IdProducto INT NOT NULL,
    CantidadProducto INT NOT NULL,
    ValorUnidad DECIMAL(10,2) NOT NULL,
    Importe DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (IdFactura) REFERENCES Factura(IdFactura) ON DELETE CASCADE,
    FOREIGN KEY (IdProducto) REFERENCES Producto(IdProducto) ON DELETE CASCADE
);

-- Tabla ProductoXProveedor para registrar qué productos trae cada proveedor
CREATE TABLE ProductoXProveedor (
    IdProducto INT NOT NULL,
    IdProveedor INT NOT NULL,
    PrecioCompra DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (IdProducto, IdProveedor),
    FOREIGN KEY (IdProducto) REFERENCES Producto(IdProducto) ON DELETE CASCADE,
    FOREIGN KEY (IdProveedor) REFERENCES Proveedor(IdProveedor) ON DELETE CASCADE
);

-- Tabla ProductoXPromocion para asociar productos con promociones
CREATE TABLE ProductoXPromocion (
    IdProducto INT NOT NULL,
    IdPromocion INT NOT NULL,
    PRIMARY KEY (IdProducto, IdPromocion),
    FOREIGN KEY (IdProducto) REFERENCES Producto(IdProducto) ON DELETE CASCADE,
    FOREIGN KEY (IdPromocion) REFERENCES Promocion(IdPromocion) ON DELETE CASCADE
);

-- Tabla de Auditoría (opcional, se puede mantener o eliminar según necesidad)
CREATE TABLE Auditoria (
    IdAuditoria SERIAL PRIMARY KEY,
    TablaAfectada VARCHAR(100) NOT NULL,
    IdRegistroAfectado INT,
    FechaAuditoria TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    TipoOperacion VARCHAR(10) CHECK (TipoOperacion IN ('insert', 'update', 'delete')),
    Usuario VARCHAR(100)
);
