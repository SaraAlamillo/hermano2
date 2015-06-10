<h1>Añadir una nueva remesa</h1>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <div class="float-input">
            <input type="text" name="anio" placeholder="Año" />
            <span><i class="fa fa-user"></i></span>
        </div>
        <input type="submit" value="Añadir" />
    </div>
    <div class="submit-area">
        <textarea name="descripcion">Descripción</textarea>
    </div>
</form>
<?= anchor(site_url('remesa'), 'Volver al listado') ?>
