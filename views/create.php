<h2>Crear Votación</h2>

<hr>

<a href="index.php?route=list">🏠 Inicio</a> |
<a href="index.php?route=list">⬅ Volver</a> |
<a href="index.php?route=logout">🚪 Cerrar sesión</a>

<hr><br>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Votación</title>
</head>
<body>

<h2>Crear Votación</h2>

<form method="POST" action="index.php?route=store">
    Fecha: <input type="date" name="fecha"><br>
    Partido: <input type="text" name="partidoPolitico"><br>
    Candidato: <input type="text" name="candidato"><br>
    Votante: <input type="text" name="votante"><br>
    País: <input type="text" name="pais"><br>
    Departamento: <input type="text" name="departamento"><br>
    Ciudad: <input type="text" name="ciudad"><br>
    Mesa: <input type="text" name="mesa"><br>
    Puesto: <input type="text" name="puestoPolitico"><br>
    Duración: <input type="number" name="duracion"><br>
    Tarjetón: <input type="text" name="numeroTarjeton"><br>

    <button type="submit">Guardar</button>
</form>

<a href="index.php?route=list">Ver votaciones</a>

</body>
</html>