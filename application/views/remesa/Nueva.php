<h1>Añadir una nueva remesa</h1>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <textarea name="descripcion" placeholder="Descripción"></textarea>
    </div>
    <div class="submit-area">
        <div class="float-input">
            <input type="text" name="anio" placeholder="Año" />
            <span>Año</span>
        </div>
        <input type="submit" value="Añadir" />
    </div>
</form>
<?= anchor(site_url('remesa'), '<img alt="Volver al listado" title="Volver al listado" src="' . base_url() . 'assets/images/icons/btnAtras.png" />') ?>
