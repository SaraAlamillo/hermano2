<h1>Añadir una nueva remesa</h1>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <?= form_error('descripcion') ?>
        <textarea name="descripcion" placeholder="Descripción"><?= set_value('descripcion') ?></textarea>
    </div>
    <div class="submit-area">
        <?= form_error('anio') ?>
        <div class="float-input">
            <input type="text" name="anio" placeholder="Año" value="<?= set_value('anio') ?>" />
            <span>Año</span>
        </div>
        <input type="submit" value="Añadir" />
    </div>
</form>
<?= anchor(site_url('remesa'), '<img alt="Volver al listado" title="Volver al listado" src="' . base_url() . 'assets/images/icons/btnAtras.png" />') ?>
