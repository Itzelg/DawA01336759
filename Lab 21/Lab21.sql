IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'creaMaterial' AND type = 'P')
                DROP PROCEDURE creaMaterial
            GO

            CREATE PROCEDURE creaMaterial
                @uclave NUMERIC(5,0),
                @udescripcion VARCHAR(50),
                @ucosto NUMERIC(8,2),
                @uimpuesto NUMERIC(6,2)
            AS
                INSERT INTO Materiales VALUES(@uclave, @udescripcion, @ucosto, @uimpuesto)
            GO

EXECUTE creaMaterial 5000,'Martillos Acme',250,15


/*  Modifica Material */
IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'modificaMaterial' AND type = 'P')
                DROP PROCEDURE modificaMaterial
            GO

						CREATE PROCEDURE modificaMaterial
    				@uclave NUMERIC(5,0),
    				@udescripcion VARCHAR(50),
   					@ucosto NUMERIC(8,2),
    				@uimpuesto NUMERIC(6,2)
						AS
    						UPDATE Materiales
						SET Descripcion = @udescripcion,Costo = @ucosto, PorcentajeImpuesto=@uimpuesto
						WHERE Clave=@uclave
GO
	EXECUTE modificaMaterial 5000,'Martillos Acme 2',255,20



/* Borrar Material  */

IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'deleteMaterial' AND type = 'P')
                DROP PROCEDURE deleteMaterial
            GO
CREATE PROCEDURE deleteMaterial
    @uclave NUMERIC(5,0)
AS
    DELETE FROM Materiales
	WHERE Clave = @uclave
GO
	EXECUTE deleteMaterial 5000


/*  Crear Proyecto */

IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'creaProyecto' AND type = 'P')
                DROP PROCEDURE creaProyecto
            GO
CREATE PROCEDURE creaProyecto
    @num NUMERIC(5,0),
    @denom VARCHAR(50)
AS
	INSERT INTO Proyectos VALUES(@num,@denom)
GO
	EXECUTE creaProyecto 5020,'HOLA'



/*  Modifica Proyecto */

IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'modifyProyecto' AND type = 'P')
                DROP PROCEDURE modifyProyecto
            GO
CREATE PROCEDURE modifyProyecto
    @num NUMERIC(5,0),
    @denom VARCHAR(50)
AS
	UPDATE Proyectos
	set Denominacion = @denom
	WHERE Numero = @num
GO
	EXECUTE modifyProyecto 5020,'ADIÓS'



/*  Borrar Proyecto */
IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'deleteProyecto' AND type = 'P')
                DROP PROCEDURE deleteProyecto
            GO
CREATE PROCEDURE deleteProyecto
    @num NUMERIC(5,0)
AS
	DELETE FROM Proyectos
	WHERE Numero = @num
GO
	EXECUTE deleteProyecto 5020

/* Crear Proveedor  */

IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'creaProveedor' AND type = 'P')
                DROP PROCEDURE creaProveedor
            GO
CREATE PROCEDURE creaProveedor
    @rfc VARCHAR(13),
    @razonsocial VARCHAR(50)
AS
	INSERT INTO Proveedores VALUES(@rfc,@razonsocial)
GO
	  EXECUTE creaProveedor IIII800101,'Itzel'


/* Modificar Proveedor  */

IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'modifyProveedor' AND type = 'P')
                DROP PROCEDURE modifyProveedor
            GO
CREATE PROCEDURE modifyProveedor
    @rfc VARCHAR(13),
    @razonsocial VARCHAR(50)
AS
	UPDATE Proveedores
	set RazonSocial = @razonsocial
	WHERE RFC = @rfc
GO
	EXECUTE modifyProveedor IIII800101,'Gil'


/* Borrar Proveedor  */

IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'deleteProveedor' AND type = 'P')
                DROP PROCEDURE deleteProveedor
            GO
CREATE PROCEDURE deleteProveedor
    @rfc VARCHAR(13)
AS
	DELETE FROM Proveedores
	WHERE RFC = @rfc
GO
	EXECUTE deleteProveedor IIII800101

/*  Crear Entregan */

IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'crearEntregan' AND type = 'P')
                DROP PROCEDURE crearEntregan
            GO
CREATE PROCEDURE crearEntrega
    @uclave NUMERIC(5),
	  @urfc VARCHAR(13),
	  @unum NUMERIC(5),
	  @ufecha DATETIME,
	  @ucantidad NUMERIC(5,2)

AS
	INSERT INTO Entregan VALUES(@uclave,@urfc,@unum,@ufecha,@ucantidad)
GO
	EXECUTE creaEntregan 1000, DDDD800101, 5010, '2001-10-10', 400


/* Modificar entregan  */

IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'modifyEntregan' AND type = 'P')
                DROP PROCEDURE modifyEntregan
            GO
CREATE PROCEDURE modifyEntrega
	@uclave NUMERIC(5),
	@urfc VARCHAR(13),
	@unum NUMERIC(5),
	@ufecha DATETIME,
	@ucantidad NUMERIC(5,2)
AS
	UPDATE Entregan
	set Fecha = @ufecha, Cantidad = @ucantidad
	WHERE Clave = @uclave AND RFC = @urfc AND Numero = @unum
GO
	EXECUTE modifyEntregan 1000, DDDD800101, 5010, '2010-06-10', 500

/*  Borrar entregan */

IF EXISTS (SELECT name FROM sysobjects
                       WHERE name = 'deleteEntregan' AND type = 'P')
                DROP PROCEDURE deleteEntregan
            GO
CREATE PROCEDURE deleteEntrega
    @clave NUMERIC(5),
	@rfc VARCHAR(13),
	@num NUMERIC(5)
AS
	DELETE FROM Entregan
	WHERE Clave = @clave AND RFC = @rfc AND Numero = @num
GO
	EXECUTE deleteEntregan 1000, DDDD800101, 5010