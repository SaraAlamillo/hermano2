<h1>Añadir una nueva remesa</h1>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <textarea name="descripcion">Descripción</textarea>
    </div>
    <div class="submit-area">
        <div class="float-input">
            <input type="text" name="anio" placeholder="Año" />
            <span><i class="fa fa-user"></i></span>
        </div>
        <input type="submit" value="Añadir" />
    </div>
</form>
<?= anchor(site_url('remesa'), 'Volver al listado') ?>
