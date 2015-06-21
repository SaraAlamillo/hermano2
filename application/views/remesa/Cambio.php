<h1>Modificar una remesa</h1>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <?= form_error('descripcion') ?>
        <textarea name="descripcion" title="Descripción"><?= set_value('descripcion', $remesa->descripcion) ?></textarea>
    </div>
    <div class="submit-area">
        <?= form_error('anio') ?>
        <div class="float-input">
            <input type="text" name="anio" value="<?= set_value('anio', $remesa->anio) ?>" title="Año" />
            <span>Año</span>
        </div>
        <input type="submit" value="Modificar" />
    </div>
</form>
<?= anchor(site_url('remesa'), '<img alt="Volver al listado" title="Volver al listado" src="' . base_url() . 'assets/images/icons/btnAtras.png" />') ?>
