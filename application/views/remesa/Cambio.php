<h1>Modificar una remesa</h1>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <textarea name="descripcion" title="Descripción"><?= $remesa->descripcion ?></textarea>
    </div>
    <div class="submit-area">
        <div class="float-input">
            <input type="text" name="anio" value="<?= $remesa->anio ?>" title="Año" />
            <span>Año</span>
        </div>
        <input type="submit" value="Modificar" />
    </div>
</form>
<?= anchor(site_url('remesa'), '<img alt="Volver al listado" title="Volver al listado" src="' . base_url() . 'assets/images/icons/btnAtras.png" />') ?>
