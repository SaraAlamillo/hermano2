<?php if (count($tablas) != 0): ?>
    <div class='paso paso3' id="capa">        
        <img src='<?= base_url() ?>assets/images/imgInstalador.png' />
        <p>Se han encontrado las siguientes tablas:</p>
        <ol>
            <?php foreach ($tablas as $t): ?>
                <li><?= $t ?></li>
            <?php endforeach; ?>
        </ol>
        <form action="<?= site_url('Instalador/paso3') ?>" method="POST" class="contact-form">
            <input type="submit" name="enviar" class="mitadBoton" value="Eliminar antiguas" />
            <input type="submit" name="enviar" class="mitadBoton" value="Utilizar actuales" />
        </form>
    </div>
<?php else: ?>
    <div class='paso paso3' id="capa">        
        <img src='<?= base_url() ?>assets/images/imgInstalador.png' />
        <p>No se ha encontrado ninguna tabla en la base de datos.</p>
        <form action="<?= site_url('Instalador/paso3') ?>" method="POST" id="contact-form">
            <input type="submit" name="enviar" value="Crear tablas" />
        </form>
    </div>
<?php endif; ?>


