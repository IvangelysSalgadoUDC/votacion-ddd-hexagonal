<table border="1">
<tr>
    <th>ID</th>
    <th>Fecha</th>
    <th>Candidato</th>
    <th>Acciones</th>
</tr>

<?php foreach ($votaciones as $v): ?>
<tr>
    <td><?= $v['id'] ?></td>
    <td><?= $v['fecha'] ?></td>
    <td><?= $v['candidato'] ?></td>
    <td>
        <a href="index.php?route=edit&id=<?= $v['id'] ?>">Editar</a>
        |
        <a href="index.php?route=delete&id=<?= $v['id'] ?>">Eliminar</a>
    </td>
</tr>
<?php endforeach; ?>

</table>