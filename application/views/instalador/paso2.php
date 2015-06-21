<?php if (!is_null($alerta)): ?>
    <div class='paso paso2ConAlerta'>
    <?php else: ?>
        <div class='paso paso2'>
        <?php endif; ?>
    <img src='<?= base_url() ?>assets/images/imgInstalador.png' />
        <?php if (!is_null($alerta)): ?>
    <div class="alert alert-<?= $alerta['tipo'] ?>" role="alert">
                <?= $alerta['mensaje'] ?>
            </div>
        <?php endif; ?>
        <form action="<?= site_url('Instalador/paso2') ?>" method="POST" id="contact-form">
            <div class="float-input">
                <input type="text" name="servidor" placeholder="Servidor" />
                <span>Servidor</span>
            </div>
            <div class="float-input">
                <input type="text" name="bd" placeholder="Base de datos" />
                <span>Base de datos</span>
            </div>
            <div class="float-input">
                <input type="text" name="usuario" placeholder="Usuario" />
                <span>Usuario</span>
            </div>
            <div class="float-input">
                <input type="password" name="clave" placeholder="Contraseña" />
                <span>Contraseña</span>
            </div>
            <input type="submit" value="Conectar" />
        </form>
    </div>