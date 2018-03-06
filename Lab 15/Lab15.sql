SELECT * from Materiales
SELECT * FROM Materiales
WHERE Clave=1000
SELECT Clave, RFC, Fecha FROM Entregan
SELECT * FROM Materiales,Entregan
WHERE Materiales.clave = Entregan.clave
SELECT * FROM Entregan,Proyectos
WHERE entregan.numero <= proyectos.numero
(SELECT * FROM entregan WHERE clave=1450)
union
SELECT * FROM entregan WHERE clave=1300
(SELECT * FROM entregan WHERE clave=1450 OR clave=1300)
(SELECT clave fROM entregan WHERE numero=5001)
intersect
(SELECT clave FROM entregan WHERE numero=5018)
(SELECT * FROM entregan WHERE NOT clave=1000)
SELECT * FROM Entregan,Materiales
SET DATEFORMAT dmy
SELECT Descripcion
FROM Materiales, Entregan
WHERE Materiales.Clave=Entregan.Clave AND
  Fecha BETWEEN '01/01/2000' AND '31/12/2000'
SET DATEFORMAT dmy
SELECT DISTINCT Descripcion
FROM Materiales, Entregan
WHERE Materiales.Clave=Entregan.Clave AND
  Fecha BETWEEN '01/01/2000' AND '31/12/2000'
SET DATEFORMAT dmy
SELECT p.Numero, p.Denominacion, e.Fecha, e.Cantidad
FROM proyectos p, entregan
WHERE p.Numero=e.Numero
ORDER BY  e.Fecha DESC
SELECT * FROM Materiales WHERE Descripcion LIKE 'Si%'
DECLARE @foo varchar(40);
DECLARE @bar varchar(40);
SET @foo = '¿Que resultado';
SET @bar = ' ¿¿¿??? '
SET @foo += ' obtienes?';
PRINT @foo + @bar;
SELECT RFC FROM Entregan WHERE RFC LIKE '[A-D]%';
SELECT RFC FROM Entregan WHERE RFC LIKE '[^A]%';
SELECT Numero FROM Entregan WHERE Numero LIKE '___6';
SELECT Clave,RFC,Numero,Fecha,Cantidad
FROM Entregan
WHERE Numero Between 5000 and 5010;

SELECT RFC,Cantidad, Fecha,Numero
FROM [Entregan]
WHERE [Numero] Between 5000 and 5010 AND
Exists ( SELECT [RFC]
FROM [Proveedores]
WHERE RazonSocial LIKE 'La%' and [Entregan].[RFC] = [Proveedores].[RFC] )
SELECT RFC,Cantidad, Fecha,Numero
FROM [Entregan]
WHERE [Numero] Between 5000 and 5010 AND
RFC IN ( SELECT [RFC]
FROM [Proveedores]
WHERE RazonSocial LIKE 'La%' and [Entregan].[RFC] = [Proveedores].[RFC] )
SELECT RFC,Cantidad, Fecha,Numero
FROM [Entregan]
WHERE [Numero] Between 5000 and 5010 AND
RFC NOT IN ( SELECT [RFC]
FROM [Proveedores]
WHERE RazonSocial LIKE 'La%' and [Entregan].[RFC] = [Proveedores].[RFC] )
FROM Entregan
WHERE Clave = ALL(SELECT Clave FROM Entregan WHERE Clave = 1000)
SELECT TOP 2 * FROM Proyectos
SELECT TOP Numero FROM Proyectos
ALTER TABLE materiales ADD PorcentajeImpuesto NUMERIC(6,2);
UPDATE materiales SET PorcentajeImpuesto = 2*clave/1000;
SELECT Denominacion, SUM(Costo*Cantidad*(1+PorcentajeImpuesto/100)) as "Total A Pagar"
FROM Materiales M, Entregan E, Proyectos P
WHERE E.Clave = M.Clave AND E.Numero = P.Numero
GROUP BY Denominacion
CREATE VIEW Top_2_Proyectos("Numero", "Denominacion") as
SELECT TOP 2 * FROM Proyectos
CREATE VIEW Razon_Social_La("RFC","Cantidad","Fecha","Numero") as
SELECT RFC,Cantidad, Fecha,Numero
FROM [Entregan]
WHERE [Numero] Between 5000 and 5010 AND
Exists ( SELECT [RFC]
FROM [Proveedores]
WHERE RazonSocial LIKE 'La%' and [Entregan].[RFC] = [Proveedores].[RFC] )
CREATE VIEW Clave_NOT_1000("Clave","RFC","Numero","Fecha","Cantidad") as
(select * from entregan where NOT clave=1000)
CREATE VIEW Clave_1450("Clave","RFC","Numero","Fecha","Cantidad") as
select * from entregan where clave=1450
CREATE VIEW Descripcion_Materiales_2000("Descripcion") as
select DISTINCT descripcion
from materiales, entregan
where materiales.clave=entregan.clave AND
Fecha BETWEEN '01/01/00' AND '31/12/00';
select m.clave, descripcion
from materiales m, proyectos p, entregan e
where m.clave = e.clave and e.numero = p.numero
and p.denominacion = 'Mexico sin ti no estamos completos'
select m.clave, descripcion
from materiales m, entregan e, proveedores pr
where m.clave = e.clave and pr.rfc = e.rfc
and pr.razonSocial = 'Acme tools'
select rfc
from entregan
where fecha between '01/01/00' and '31/12/00'
group by rfc
having avg(cantidad)>=300
select descripcion, sum(cantidad) as 'total entregas'
from entregan e, materiales m
where e.clave = m.clave and fecha between '01/01/00' and '31/12/00'
group by descripcion
select top 1 clave
from entregan
where fecha between '01/01/01' and '31/12/01'
group by clave
order by sum(cantidad) desc
select descripcion
from materiales
where descripcion like '%ub%'
select denominacion, sum(costo*cantidad*(1+porcentajeImpuesto/100)) as 'total a pagar'
from materiales m, entregan e, proyectos p
where e.clave = m.clave and e.numero = p.numero
group by denominacion
create view a as
select denominacion, e.RFC, pr.RazonSocial
from proyectos p, entregan e, proveedores pr
where denominacion = 'Educando en coahuila'
and e.numero = p.numero and pr.RFC = e.RFC
select denominacion, e.RFC, pr.RazonSocial
from proyectos p, entregan e, proveedores pr
where denominacion = 'Educando en coahuila'
and e.numero = p.numero and pr.RFC = e.RFC
select costo, descripcion
from proyectos p, entregan e, materiales m, proveedores pr
where denominacion = 'Televisa%' and  pr.RazonSocial LIKE 'Educando en Coahuila'
and e.numero = p.numero and m.clave = e.clave
select descripcion, count(e.clave) as "Cantidad de veces entregado" , sum(e.Cantidad * m.Costo) as "Total del costo"
from entregan e, materiales m
where m.Clave = e.Clave
group by descripcion
