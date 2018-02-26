INSERT INTO Materiales values(1000, 'xxx', 1000)

SELECT *
FROM Entregan
SELECT *
FROM Materiales

Delete from Materiales where Clave = 1000 and Costo = 1000

 ALTER TABLE Materiales add constraint llaveMateriales PRIMARY KEY (Clave)
 ALTER TABLE Entregan add constraint llaveEntregan PRIMARY KEY (Clave, RFC, Numero, Fecha)
 ALTER TABLE Proveedores add constraint llaveProveedores PRIMARY KEY (RFC)
 ALTER TABLE Proyectos add constraint llaveProyectos PRIMARY KEY (Numero)

ALTER TABLE tableName drop constraint ConstraintName

sp_help Entregan

INSERT INTO entregan values (0, 'xxx', 0, '1-jan-02', 0) ;

Delete from Entregan where Clave = 0

ALTER TABLE Entregan drop constraint cfentreganclave

ALTER TABLE Entregan
ADD CONSTRAINT cfEntreganClave
FOREIGN KEY (Clave) REFERENCES Materiales(Clave);

ALTER TABLE Entregan
ADD CONSTRAINT cfEntreganRFC
FOREIGN KEY (RFC) REFERENCES Proveedores(RFC);

ALTER TABLE Entregan
ADD CONSTRAINT cfEntreganNumero
FOREIGN KEY (Numero) REFERENCES Proyectos(Numero);

sp_helpconstraint Entregan

INSERT INTO Entregan values (1000, 'AAAA800101', 5000, GETDATE(), 0);

Delete from Entregan where Cantidad = 0

ALTER TABLE Entregan add constraint Cantidad check (Cantidad > 0) ;