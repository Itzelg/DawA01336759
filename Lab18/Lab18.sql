SET DATEFORMAT dmy
SELECT SUM(e.Cantidad) as 'Cantidad', (e.Cantidad*(m.Costo + m.PorcentajeImpuesto)) as 'Importe Total'
FROM Entregan e, Materiales m
WHERE e.clave=m.Clave
AND e.fecha BETWEEN '01/01/1997' AND '31/12/1997'
GROUP BY (e.Cantidad*(m.Costo + m.PorcentajeImpuesto))

SELECT p.RazonSocial, COUNT(e.Cantidad) as 'No. Entregas', SUM(e.Cantidad*(m.Costo + m.PorcentajeImpuesto)) as 'Importe Total'
FROM Entregan e, Proveedores p, Materiales m
WHERE  e.clave=m.Clave AND e.RFC = p.RFC
GROUP BY p.RazonSocial --  (e.Cantidad*(m.Costo + m.PorcentajeImpuesto))
ORDER BY SUM(e.Cantidad*(m.Costo + m.PorcentajeImpuesto)), COUNT(e.Cantidad)

SELECT m.Clave, m.Descripcion, SUM(e.Cantidad) as 'Cantidad entregada', MIN(e.Cantidad) as 'Menor cantidad',
      MAX(e.Cantidad) as 'Mayor cantidad de 400', SUM(e.Cantidad*(m.Costo + m.PorcentajeImpuesto)) as 'Importe Total'
FROM Materiales m, Entregan e
WHERE e.clave=m.Clave
GROUP BY m.Descripcion, m.Clave
HAVING  AVG(e.Cantidad) > 400
ORDER BY m.Clave, SUM(e.Cantidad*(m.Costo + m.PorcentajeImpuesto))

SELECT p.RazonSocial, e.Clave, m.Descripcion, AVG(e.Cantidad) as 'Promedio por entrega'
FROM Proveedores p, Entregan e, Materiales m
WHERE  e.clave=m.Clave AND e.RFC = p.RFC
GROUP BY p.RazonSocial, e.Clave, m.Descripcion
HAVING AVG(e.Cantidad) >500
ORDER BY p.RazonSocial, e.Clave

SELECT p.RazonSocial, e.Clave, m.Descripcion, AVG(e.Cantidad) as 'Promedio por entrega'
FROM Proveedores p, Entregan e, Materiales m
WHERE  e.clave=m.Clave AND e.RFC = p.RFC
GROUP BY p.RazonSocial, e.Clave, m.Descripcion
HAVING (AVG(e.Cantidad) < 370) OR (AVG(e.Cantidad) > 450)
ORDER BY p.RazonSocial, e.Clave

INSERT INTO Materiales VALUES (3839, 'Vidrio', 500.00, 3.998);
INSERT INTO Materiales VALUES (1500, 'Tabiques', 200.00,1.90 );
INSERT INTO Materiales VALUES (1650, 'Aluminio', 380.00, 3.00);
INSERT INTO Materiales VALUES (1511, 'Madera X', 100.00, 2.38);
INSERT INTO Materiales VALUES (1480, 'Tejas', 60.00, 2.5);

SELECT m.Clave, m.Descripcion
FROM Materiales m, Entregan e
WHERE m.Clave NOT IN
      (SELECT e.Clave
 FROM Entregan e)
GROUP BY m.Clave, m.Descripcion

SELECT prov.RazonSocial
FROM Entregan e, Proveedores prov, Proyectos proy
WHERE e.RFC=prov.RFC AND e.Numero=proy.Numero
AND  proy.Denominacion IN
(SELECT proy.Denominacion
 FROM Entregan e, Proyectos proy
 WHERE e.Numero=proy.Numero
 AND proy.Denominacion = 'Vamos Mexico')

AND proy.Denominacion IN
    (SELECT proy.Denominacion
 FROM Entregan e, Proyectos proy
 WHERE e.Numero=proy.Numero
 AND proy.Denominacion = 'Queretaro Limpio')

SELECT m.Descripcion
FROM Materiales m, Entregan e, Proyectos p
WHERE m.Clave =  e.Clave AND p.Numero = e.Numero
AND Denominacion <> 'CIT Yucatan'
GROUP BY m.Descripcion

SELECT p.RazonSocial, AVG(e.Cantidad) as 'Promedio de cantidad entregada'
FROM Proveedores p, Entregan e, Materiales m
WHERE e.clave = m.Clave AND e.RFC = p.RFC
GROUP BY p.RazonSocial
HAVING  AVG(e.Cantidad) > (SELECT AVG(e.Cantidad)
       FROM Entregan e)

SET DATEFORMAT dmy
SELECT prov.RFC, prov.RazonSocial
FROM Proveedores prov, Proyectos proy, Entregan e
WHERE e.RFC=prov.RFC AND e.Numero=proy.Numero
AND Denominacion LIKE 'Infonavit Durango'
GROUP BY prov.RFC, prov.RazonSocial
HAVING
 (SELECT SUM(e.Cantidad)
  FROM Entregan e, Proyectos proy
  WHERE e.Numero=proy.Numero
  AND proy.Denominacion LIKE 'Infonavit Durango'
  AND e.Fecha BETWEEN '01/01/2000' AND '31/12/2000')
 >
 (SELECT SUM(e.Cantidad)
  FROM Entregan e, Proyectos proy
  WHERE e.Numero=proy.Numero
  AND proy.Denominacion LIKE 'Infonavit Durango'
  AND e.Fecha BETWEEN '01/01/2001' AND '31/12/2001')