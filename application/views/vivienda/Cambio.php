<h1>Modificar una vivienda</h1>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <div class="float-input">
            <input type="text" value="<?= $vivienda->Barriada ?>" readonly="readonly" />
            <span>Barriada</span>
        </div>
        <div class="float-input">
            <input type="text" value="<?= $vivienda->Linea ?>" readonly="readonly" />
            <span>Línea</span>
        </div>
        <div class="float-input">
            <input type="text" value="<?= $vivienda->Numero ?>" readonly="readonly" />
            <span>Número</span>
        </div>
    </div>
    <div class="submit-area">
        <textarea name="Observaciones"><?= set_value('Observaciones', $vivienda->Observaciones) ?></textarea>
        <?= form_error('Observaciones') ?>
        <input type="submit" value="Modificar" />
    </div>
    <input type="hidden" value="<?= $vivienda->idVivienda ?>" name="idVivienda" />
</form>
<?= anchor(site_url('vivienda'), '<img alt="Volver al listado" title="Volver al listado" src="' . base_url() . 'assets/images/icons/btnAtras.png" />') ?>