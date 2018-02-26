BULK INSERT A1336759.A1336759.[Materiales]
   FROM 'e:\wwwroot\A1336759\materiales (1).csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )

BULK INSERT A1336759.A1336759.[Proyectos]
  FROM 'e:\wwwroot\A1336759\proyectos (1).csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )

BULK INSERT A1336759.A1336759.[Proveedores]
  FROM 'e:\wwroot\A1336759\proveedores.csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = ' '
  )

SET DATEFORMAT dmy -- especificar formato de la fecha

BULK INSERT A1336759.A1336759.[Entregan]
  FROM 'e:\wwwroot\A1336759\entregan (1).csv'
  WITH
  (
    CODEPAGE = 'ACP',
    FIELDTERMINATOR = ',',
    ROWTERMINATOR = '\n'
  )
