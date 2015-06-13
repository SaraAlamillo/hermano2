<h1>Eliminar <?= $baja ?></h1>
<p>¿Está seguro que quiere eliminar el siguiente registro y todos los datos asociados?</p>
<form action="" method="POST" class="eliminar-form contact-form">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Campo</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $clave => $valor): ?>
                <tr>
                    <td><?= nombresCampos($clave) ?></td>
                    <td><?= $valor ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <input type="submit" name="eliminar" value="Si" />
    <input type="submit" name="eliminar" value="No" />
</form>