<!DOCTYPE html>
<html>
<head>
    <title>Lista de Votaciones</title>
</head>
<body>

<h2>Lista de Votaciones</h2>

<a href="index.php?route=create">Nueva votación</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Fecha</th>
    <th>Candidato</th>
</tr>

<?php foreach ($votaciones as $v): ?>
<tr>
    <td><?= $v['id'] ?></td>
    <td><?= $v['fecha'] ?></td>
    <td><?= $v['candidato'] ?></td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>