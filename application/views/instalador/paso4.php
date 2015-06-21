<?php if (!is_null($alerta)): ?>
    <div class='paso paso4ConAlerta'>
    <?php else: ?>
        <div class='paso paso4'>
        <?php endif; ?>
        <img src='<?= base_url() ?>assets/images/imgInstalador.png' />
        <?php if (!is_null($alerta)): ?>
            <div class="alert alert-<?= $alerta['tipo'] ?>" role="alert">
                <?= $alerta['mensaje'] ?>
            </div>
        <?php endif; ?>
        <form action="<?= site_url('Instalador/paso4') ?>" method="POST" id="contact-form">
            <fieldset>
                <legend>Usuario administrador</legend>
                <div class="float-input">
                    <input type="text" name="user-admin" placeholder="Usuario" />
                    <span>Usuario</span>
                </div>
                <div class="float-input">
                    <input type="password" name="clave-admin" placeholder="Contraseña" />
                    <span>Contraseña</span>
                </div>
            </fieldset>
            <fieldset>
                <legend>Usuario estándar</legend>
                <div class="float-input">
                    <input type="text" name="user-normal" placeholder="Usuario" />
                    <span>Usuario</span>
                </div>
                <div class="float-input">
                    <input type="password" name="clave-normal" placeholder="Contraseña" />
                    <span>Contraseña</span>
                </div>
            </fieldset>
            <input type="submit" value="Conectar" />
        </form>
    </div>

