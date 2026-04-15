<h2>Sistema de Votaciones</h2>

<hr>

<a href="index.php?route=list">🏠 Inicio</a> |
<a href="index.php?route=create">➕ Crear votación</a> |
<a href="index.php?route=logout">🚪 Cerrar sesión</a>

<hr><br>

<table border="1" cellpadding="8" cellspacing="0">
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
                <a href="index.php?route=edit&id=<?= $v['id'] ?>">✏️ Editar</a> |
                <a href="index.php?route=delete&id=<?= $v['id'] ?>">🗑️ Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>