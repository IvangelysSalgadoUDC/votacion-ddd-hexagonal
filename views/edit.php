<!DOCTYPE html>
<html>
<head>
    <title>Editar Votación</title>
</head>
<body>

<h2>Editar Votación</h2>

<form method="POST" action="index.php?route=update">
    <input type="hidden" name="id" value="<?= $votacion['id'] ?>">

    Fecha: <input type="date" name="fecha" value="<?= $votacion['fecha'] ?>"><br>
    Partido: <input type="text" name="partidoPolitico" value="<?= $votacion['partido_politico'] ?>"><br>
    Candidato: <input type="text" name="candidato" value="<?= $votacion['candidato'] ?>"><br>
    Votante: <input type="text" name="votante" value="<?= $votacion['votante'] ?>"><br>
    País: <input type="text" name="pais" value="<?= $votacion['pais'] ?>"><br>
    Departamento: <input type="text" name="departamento" value="<?= $votacion['departamento'] ?>"><br>
    Ciudad: <input type="text" name="ciudad" value="<?= $votacion['ciudad'] ?>"><br>
    Mesa: <input type="text" name="mesa" value="<?= $votacion['mesa'] ?>"><br>
    Puesto: <input type="text" name="puestoPolitico" value="<?= $votacion['puesto_politico'] ?>"><br>
    Duración: <input type="number" name="duracion" value="<?= $votacion['duracion'] ?>"><br>
    Tarjetón: <input type="text" name="numeroTarjeton" value="<?= $votacion['numero_tarjeton'] ?>"><br>

    <button type="submit">Actualizar</button>
</form>

<a href="index.php?route=list">Volver</a>

</body>
</html>