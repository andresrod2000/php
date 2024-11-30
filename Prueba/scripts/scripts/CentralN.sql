
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
--CREACION DE LAS TABLAS PARA INVENTARIO DE CENTRAL NEXUS 

CREATE TABLE IF NOT EXISTS tab_marcas -- Tabla marcas
(
    id_marca        SMALLINT        NOT NULL,
    nom_marca       VARCHAR         NOT NULL,
    PRIMARY KEY(id_marca)
);

CREATE TABLE IF NOT EXISTS tab_prod -- tabla producto
(
    id_prod         BIGINT          NOT NULL,
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


CREATE TABLE IF NOT EXISTS tab_categoria-- Tabla categoria
(
    IdCategoria     SMALLINT        NOT NULL,
    NombreCategoria VARCHAR         NOT NULL,
    PRIMARY KEY(IdCategoria)
);

CREATE TABLE IF NOT EXISTS tab_promocion-- Tabla Promocion  -- corregir datos que no estan 
(   
    id_promocion    SMALLINT        NOT NULL,
    nom_promocion   VARCHAR         NOT NULL,
    des_porc        DECIMAL(5, 2)   NOT NULL CHECK (des_porc > 0), --DESCUENTO_PORCENTAJE
    fecha_inicio    TIMESTAMP WITHOUT TIME ZONE NOT NULL,
    fecha_fin       TIMESTAMP WITHOUT TIME ZONE NOT NULL,
    noactiva        BOOLEAN         DEFAULT FALSE,-- MEJOR NO ACTIVA PORQUE HAY MENOS PROMOCIONES QUE NO PROMOCIONES DE PRODUCTOS
PRIMARY KEY(id_promocion)
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

CREATE TABLE IF NOT EXISTS tab_prodven -- tabla productoVencimiento (es para marcar productos que ya su fechas esta por caducar o demasiado tiempo en inventario Xd)
(    
    id_vencimiento  BIGINT          NOT NULL,
    id_producto     BIGINT          NOT NULL,
    lote            VARCHAR         NOT NULL,
    fec_ven         TIMESTAMP WITHOUT TIME ZONE NOT NULL, --fecha_vencimiento
    cantidad        INT             NOT NULL,
    PRIMARY KEY (id_vencimiento),
    FOREIGN KEY (id_producto) REFERENCES tab_prod(id_prod)
);

CREATE TABLE IF NOT EXISTS tab_provcon --tabla proveedorContacto (datos de contacto )
(
    id_contacto  BIGINT          NOT NULL,
    id_proveedor BIGINT          NOT NULL,
    nom_contacto VARCHAR         NOT NULL,
    tel_contacto DECIMAL(10,0)   NOT NULL,
    cor_contacto VARCHAR         NOT NULL,--correo_contacto
    pos_contacto VARCHAR         NOT NULL,
    PRIMARY KEY (id_contacto),
    FOREIGN KEY (id_proveedor) REFERENCES tab_prov(id_prov) 
);

CREATE TABLE IF NOT EXISTS tab_compra-- tabla compra (almacena información sobre cada transacción de compra realizada a los proveedores. Esto incluye datos como la fecha y hora de la compra, el proveedor involucrado y el total de la compra sjsj)
(
    id_compra    BIGINT          NOT NULL,
    id_proveedor BIGINT          NOT NULL,
    fecha_compra DATE            NOT NULL,
    hora_compra  TIME            NOT NULL,
    total_compra DECIMAL(10, 2)  NOT NULL,
    PRIMARY KEY (id_compra),
    FOREIGN KEY (id_proveedor) REFERENCES tab_prov(id_prov)
);

CREATE TABLE IF NOT EXISTS tab_detallecompra-- tabla Detalle Compra( especifica la informacion dada en tab compra en la cual se registra la cantidad y el precio individual de cada producto. Esto permite saber cuánto se compró de cada producto y a qué precio )
( 
    id_det_com   BIGINT          NOT NULL,--id_detallecompra
    id_compra    BIGINT          NOT NULL,
    id_producto  BIGINT          NOT NULL,
    can_producto INT             NOT NULL,--Cantidad Producto
    pre_unidad   DECIMAL(10, 2)  NOT NULL,
    importe      DECIMAL(10, 2)  NOT NULL,
    PRIMARY KEY (id_det_com),
    FOREIGN KEY (id_compra) REFERENCES tab_compra(id_compra),
    FOREIGN KEY (id_producto) REFERENCES tab_prod(id_prod) 
);

CREATE TABLE IF NOT EXISTS tab_factura
(
    id_factura    BIGINT NOT NULL,
    fecha_factura DATE NOT NULL,
    hora_factura  TIME NOT NULL
    PRIMARY KEY(id_factura)
    
);

CREATE TABLE IF NOT EXISTS tab_prodprov --TABLA productox proveedor la cual registra  que productos trae cada proveedor
(
    id_prov         BIGINT          NOT NULL,
    id_prod         VARCHAR         NOT NULL,
    val_prod        DECIMAL(8,0)    NOT NULL DEFAULT 0 CHECK(val_prod >= 0),
    PRIMARY KEY(id_prov,id_prod),
    FOREIGN KEY(id_prov)    REFERENCES tab_prov(id_prov),
    FOREIGN KEY(id_prod)    REFERENCES tab_prod(id_prod)
);

-- Tabla ProductoXPromocion para asociar productos con promociones ARREGLAR
CREATE TABLE IF NOT EXISTS tab_prodprom (
    id_producto  BIGINT       NOT NULL,
    id_promocion INT          NOT NULL,
    PRIMARY KEY (id_producto, id_promocion),
    FOREIGN KEY (id_producto) REFERENCES tab_prod(id_prod),
    FOREIGN KEY (id_promocion) REFERENCES tab_promocion(id_promocion) 
);

CREATE TABLE IF NOT EXISTS tab_auditoria
(
id_audi      BIGINT NOT NULL,
id_tab       SMALLINT NOT NULL,
reg_audi     VARCHAR NOT NULL,--Registro modificado osea la tabla modificada
usr_audi     VARCHAR NOT NULL,--Usuario el cual modifico
fec_audi     TIMESTAMP WITHOUT TIME ZONE NOT NULL,
TipoOp_audi  VARCHAR NOT NULL,--Tipo de operacion como insert,update,delete en este caso es mas delete
PRIMARY KEY(id_audi)
);

CREATE TABLE IF NOT EXISTS tab_kardex
(
    val_conse       BIGINT          NOT NULL,
    id_prod         VARCHAR         NOT NULL,
    fec_nove        DATE            NOT NULL,
    ind_nove        BOOLEAN         NOT NULL, --TRUE=Entrada / FALSE=Salida
    val_canti       INTEGER         NOT NULL CHECK(val_canti >= 0),
    val_nove        INTEGER         NOT NULL CHECK(val_nove >= 0),
    PRIMARY KEY(val_conse),
    FOREIGN KEY(id_prod)    REFERENCES tab_prod(id_prod)
);

CREATE TABLE IF NOT EXISTS tab_detallefactura-- Tabla DetalleFactura para registrar productos en cada factura ARREGLAR
(--Arreglar
    id_detfac   BIGINT        NOT NULL,--id_detallefactura
    id_factura  BIGINT        NOT NULL,
    id_producto BIGINT        NOT NULL,
    cant_prod   INT           NOT NULL,--cantidad_producto
    val_unid    DECIMAL(10,2) NOT NULL,--valor_unidad
    importe     DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id_detallefactura),
    FOREIGN KEY (id_factura) REFERENCES tab_factura(id_factura),
    FOREIGN KEY (id_producto) REFERENCES tab_prod(id_prod)
);