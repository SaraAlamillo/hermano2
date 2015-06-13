<?php $contador = 0; ?>
<form action="" method="POST" id="contact-form">
    <h1>Participantes del sorteo de medallas</h1>
    <input type="submit" value="Generar sorteo" />
    <p>En el siguiente listado están recogidos todos los hermanos que podrán ser participantes en el sorteo de medallas. Quedan excluidos los hermanos que ya han sido premiados con una medalla anteriormente.</p>
    <p>Para excluir a cualquier otro hermano, basta con desmarcar la casilla correspondiente a dicho hermano.</p>
    <div class="bs-glyphicons">
        <ul class="bs-glyphicons-list">
            <?php foreach ($listado as $l): ?>
                <li>
                    <label for="<?= $l->idHermano ?>">
                        <input type="checkbox" id="<?= $l->idHermano ?>" name="hermanos[]" value="<?= $l->idHermano . '. ' . $l->nombre . ' ' . $l->apellido1 . ' ' . $l->apellido2 ?>" checked="checked" /> <br />
                        <span><?= $l->idHermano . '. ' . $l->nombre . ' ' . $l->apellido1 . ' ' . $l->apellido2 ?></span>                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <input type="submit" value="Generar sorteo" />
</form>
