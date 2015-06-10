<p>¿Está seguro que quiere eliminar el siguiente registro y todos los datos asociados?</p>
<form action="" method="POST">
    <table border="1">
        <?php foreach ($datos as $clave => $valor): ?>
            <tr>
                <td><?= $clave ?></td>
                <td><?= $valor ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <input type="submit" name="eliminar" value="Si" />
    <input type="submit" name="eliminar" value="No" />
</form>