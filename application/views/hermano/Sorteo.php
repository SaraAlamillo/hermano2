<?php $contador = 0; ?>
<form action="" method="POST" id="contact-form">
    <h1>Participantes del sorteo de medallas</h1>
    <input type="submit" value="Generar sorteo" />
    <p>En el siguiente listado están recogidos todos los hermanos que podrán ser participantes en el sorteo de medallas. Quedan excluidos los hermanos que ya han sido premiados con una medalla anteriormente.</p>
    <p>Para excluir a cualquier otro hermano, basta con desmarcar la casilla correspondiente a dicho hermano.</p>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <?php foreach ($listado as $l): ?>
                    <?php $contador++; ?>
                    <td>
                        <input type="checkbox" name="hermanos[]" value="<?= $l->idHermano . '. ' . $l->nombre . ' ' . $l->apellido1 . ' ' . $l->apellido2 ?>" checked="checked" /><?= $l->idHermano . '. ' . $l->nombre . ' ' . $l->apellido1 . ' ' . $l->apellido2 ?>
                    </td>
                    <?php if ($contador % 3 == 0): ?>
                    </tr>
                    <tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tr>
        </table>
    </div>
    <input type="submit" value="Generar sorteo" />
</form>
