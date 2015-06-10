    <?= anchor(site_url('vivienda'), 'Volver al listado') ?>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <fieldset>
            <legend>Barriada</legend> 
            <div class="float-input">
                <input type="text" value="<?= $vivienda->Barriada ?>" readonly="readonly" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Línea</legend> 
            <div class="float-input">
                <input type="text" value="<?= $vivienda->Linea ?>" readonly="readonly" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Número</legend> 
            <div class="float-input">
                <input type="text" value="<?= $vivienda->Numero ?>" readonly="readonly" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
    </div>
    <div class="submit-area">
        <fieldset>
            <legend>Observaciones</legend> 
            <textarea name="Observaciones"><?= $vivienda->Observaciones ?></textarea>
        </fieldset>
    </div>
    <input type="hidden" value="<?= $vivienda->idVivienda ?>" name="idVivienda" />
    <input type="submit" id="submit_contact" class="main-button" value="Modificar" />
</form>
