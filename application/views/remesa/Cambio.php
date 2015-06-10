    <h1>Modificar una remesa</h1>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <div class="float-input">
            <input type="text" name="anio" value="<?= $remesa->anio ?>" title="Año" />
            <span><i class="fa fa-user"></i></span>
        </div>
        <input type="submit" value="Modificar" />
    </div>
    <div class="submit-area">
        <textarea name="descripcion" title="Descripción"><?= $remesa->descripcion ?></textarea>
    </div>
</form>
<?= anchor(site_url('remesa'), 'Volver al listado') ?>
