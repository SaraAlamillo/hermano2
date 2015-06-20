<h1>Añadir una nueva remesa</h1>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <textarea name="descripcion" placeholder="Descripción"><?= set_value('descripcion') ?></textarea>
        <?= form_error('descripcion') ?>
    </div>
    <div class="submit-area">
        <div class="float-input">
            <input type="text" name="anio" placeholder="Año" value="<?= set_value('anio') ?>" />
            <span>Año</span>
        </div>
        <?= form_error('anio') ?>
        <input type="submit" value="Añadir" />
    </div>
</form>
<?= anchor(site_url('remesa'), '<img alt="Volver al listado" title="Volver al listado" src="' . base_url() . 'assets/images/icons/btnAtras.png" />') ?>
