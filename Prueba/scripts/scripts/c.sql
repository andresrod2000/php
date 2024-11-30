-- BORRADO DE LAS TABLAS SI SE OLVIDA TIRARLAS
DROP TABLE IF EXISTS tab_detallefactura;
DROP TABLE IF EXISTS tab_kardex;
DROP TABLE IF EXISTS tab_auditoria;
DROP TABLE IF EXISTS tab_prodprom;
DROP TABLE IF EXISTS tab_prodprov;
DROP TABLE IF EXISTS tab_factura;
DROP TABLE IF EXISTS tab_detallecompra;
DROP TABLE IF EXISTS tab_compra;
DROP TABLE IF EXISTS tab_provcon;
DROP TABLE IF EXISTS tab_prodven;
DROP TABLE IF EXISTS tab_prov;
DROP TABLE IF EXISTS tab_promocion;
DROP TABLE IF EXISTS tab_categoria;
DROP TABLE IF EXISTS tab_prod;
DROP TABLE IF EXISTS tab_marcas;

-- CREACION DE LAS TABLAS PARA INVENTARIO DE CENTRAL NEXUS

CREATE TABLE IF NOT EXISTS tab_marcas -- Tabla marcas
(
    id_marca        SMALLINT        NOT NULL,
    nom_marca       VARCHAR         NOT NULL,
    PRIMARY KEY(id_marca)
);

CREATE TABLE IF NOT EXISTS tab_prod -- tabla producto
(
    id_prod         VARCHAR         NOT NULL,
    nom_prod        TEXT            NOT NULL,
    ref_prod        VARCHAR         NOT NULL,
    id_marca        SMALLINT        NOT NULL,
    val_stock_min   INTEGER         NOT NULL,
    val_stock_max   INTEGER         NOT NULL,
    val_pto_reord   INTEGER         NOT NULL,
    val_stock       INTEGER         NOT NULL,
    PRIMARY KEY(id_prod),
    FOREIGN KEY(id_marca)   REFERENCES tab_marcas(id_marca)
);

CREATE TABLE IF NOT EXISTS tab_categoria -- Tabla categoria
(
    id_categoria    SMALLINT        NOT NULL,
    nom_categoria   VARCHAR         NOT NULL,
    PRIMARY KEY(id_categoria)
);

CREATE TABLE IF NOT EXISTS tab_promocion -- Tabla Promocion
(   
    id_promocion SERIAL PRIMARY KEY,
    nom_promocion VARCHAR(100) NOT NULL,
    descuento_porcentaje DECIMAL(5, 2) NOT NULL CHECK (descuento_porcentaje > 0),
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    activa BOOLEAN DEFAULT TRUE
);

CREATE TABLE IF NOT EXISTS tab_prov -- Tabla proveedores
(
    id_prov         BIGINT          NOT NULL,
    nom_prov        VARCHAR         NOT NULL,
    ape_prov        VARCHAR         NOT NULL,
    dir_prov        VARCHAR         NOT NULL,
    id_ciudad       SMALLINT        NOT NULL,
    tel_prov        DECIMAL(10,0)   NOT NULL,
    PRIMARY KEY(id_prov),
    FOREIGN KEY(id_ciudad)  REFERENCES tab_ciudades(id_ciudad)
);

CREATE TABLE IF NOT EXISTS tab_prodven -- tabla productoVencimiento
(
    id_vencimiento SERIAL PRIMARY KEY,
    id_producto VARCHAR NOT NULL,
    lote VARCHAR(50) NOT NULL,
    fecha_vencimiento DATE NOT NULL,
    cantidad INT NOT NULL,
    FOREIGN KEY (id_producto) REFERENCES tab_prod(id_prod) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS tab_provcon --tabla proveedorContacto
(
    id_contacto SERIAL PRIMARY KEY,
    id_proveedor BIGINT NOT NULL,
    nom_contacto VARCHAR(100) NOT NULL,
    tel_contacto VARCHAR(15),
    correo_contacto VARCHAR(100),
    pos_contacto VARCHAR(50),
    FOREIGN KEY (id_proveedor) REFERENCES tab_prov(id_prov) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS tab_compra -- tabla compra
(
    id_compra SERIAL PRIMARY KEY,
    id_proveedor BIGINT NOT NULL,
    fecha_compra DATE NOT NULL,
    hora_compra TIME NOT NULL,
    total_compra DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_proveedor) REFERENCES tab_prov(id_prov) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS tab_detallecompra -- tabla Detalle Compra
(
    id_detallecompra SERIAL PRIMARY KEY,
    id_compra INT NOT NULL,
    id_producto VARCHAR NOT NULL,
    cantidad_producto INT NOT NULL,
    precio_unidad DECIMAL(10, 2) NOT NULL,
    importe DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_compra) REFERENCES tab_compra(id_compra) ON DELETE CASCADE,
    FOREIGN KEY (id_producto) REFERENCES tab_prod(id_prod) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS tab_factura
(
    id_factura SERIAL PRIMARY KEY,
    fecha_factura DATE NOT NULL,
    hora_factura TIME NOT NULL
);

CREATE TABLE IF NOT EXISTS tab_detallefactura -- detalles de la factura
(
    id_detallefactura SERIAL PRIMARY KEY,
    id_factura INT NOT NULL,
    id_producto VARCHAR NOT NULL,
    cantidad_producto INT NOT NULL,
    valor_unidad DECIMAL(10,2) NOT NULL,
    importe DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_factura) REFERENCES tab_factura(id_factura) ON DELETE CASCADE,
    FOREIGN KEY (id_producto) REFERENCES tab_prod(id_prod) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS tab_prodprov -- Tabla Producto por proveedor
(
    id_prov         BIGINT          NOT NULL,
    id_prod         VARCHAR         NOT NULL,
    val_prod        DECIMAL(8,0)    NOT NULL DEFAULT 0 CHECK(val_prod >= 0),
    PRIMARY KEY(id_prov, id_prod),
    FOREIGN KEY(id_prov)    REFERENCES tab_prov(id_prov),
    FOREIGN KEY(id_prod)    REFERENCES tab_prod(id_prod)
);

CREATE TABLE IF NOT EXISTS tab_prodprom -- Tabla ProductoXPromocion para asociar productos con promociones
(
    id_producto VARCHAR NOT NULL,
    id_promocion INT NOT NULL,
    PRIMARY KEY (id_producto, id_promocion),
    FOREIGN KEY (id_producto) REFERENCES tab_prod(id_prod) ON DELETE CASCADE,
    FOREIGN KEY (id_promocion) REFERENCES tab_promocion(id_promocion) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS tab_auditoria
(
    id_audi      BIGINT NOT NULL,
    id_tab       SMALLINT NOT NULL,
    reg_audi     VARCHAR NOT NULL, --Registro modificado o la tabla modificada
    usr_audi     VARCHAR NOT NULL, --Usuario que realizó la modificación
    fec_audi     TIMESTAMP WITHOUT TIME ZONE NOT NULL,
    tipoop_audi  VARCHAR NOT NULL, --Tipo de operación: insert, update, delete
    PRIMARY KEY(id_audi)
);

CREATE TABLE IF NOT EXISTS tab_kardex
(
    val_conse       BIGINT          NOT NULL,
    id_prod         VARCHAR         NOT NULL,
    fec_nove        DATE            NOT NULL,
    ind_nove        BOOLEAN         NOT NULL, -- TRUE=Entrada / FALSE=Salida
    val_canti       INTEGER         NOT NULL CHECK(val_canti >= 0),
    val_nove        INTEGER         NOT NULL CHECK(val_nove >= 0),
    PRIMARY KEY(val_conse),
    FOREIGN KEY(id_prod)    REFERENCES tab_prod(id_prod)
);
