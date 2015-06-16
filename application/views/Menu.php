<div class="portfolio-page">
    <div class="portfolio-box">

        <div class="project-post">
            <img alt="" src="<?= base_url() ?>assets/images/main_menu/GestViviendas.png">
            <div class="hover-box">
                <div class="project-title">
                    <h2>Viviendas</h2>
                    <span>Listado de viviendas registradas</span>
                    <div><?= anchor(site_url('vivienda'), '<i class="fa fa-arrow-right"></i>') ?></div>
                </div>
            </div>
        </div>

        <div class="project-post">
            <img alt="" src="<?= base_url() ?>assets/images/main_menu/GestHermanos.png">
            <div class="hover-box">
                <div class="project-title">
                    <h2>Hermanos</h2>
                    <span>Listados de hermanos dados de alta</span>
                    <div><?= anchor(site_url('hermano'), '<i class="fa fa-arrow-right"></i>') ?></div>
                </div>
            </div>
        </div>

        <div class="project-post">
            <img alt="" src="<?= base_url() ?>assets/images/main_menu/Remesas.png">
            <div class="hover-box">
                <div class="project-title">
                    <h2>Remesas</h2>
                    <span>Listado de remesas</span>
                    <div><?= anchor(site_url('remesa'), '<i class="fa fa-arrow-right"></i>') ?></div>
                </div>
            </div>
        </div>
		
						<?php if ($rolActual == 'Administrador'): ?>
        <div class="project-post">
            <img alt="" src="<?= base_url() ?>assets/images/main_menu/GestPagos.png">
            <div class="hover-box">
                <div class="project-title">
                    <h2>Registro de pago</h2>
                    <span>Registro del pago de un plazo</span>
                    <div><?= anchor(site_url('pago/registra'), '<i class="fa fa-arrow-right"></i>') ?></div>
                </div>
            </div>
        </div>
		<?php endif; ?>

        <div class="project-post">
            <img alt="" src="<?= base_url() ?>assets/images/main_menu/AgContactos.png">
            <div class="hover-box">
                <div class="project-title">
                    <h2>Agenda de contactos</h2>
                    <span>Listado de contactos</span>
                    <div><?= anchor(site_url('contacto'), '<i class="fa fa-arrow-right"></i>') ?></div>
                </div>
            </div>
        </div>

        <div class="project-post">
            <img alt="" src="<?= base_url() ?>assets/images/main_menu/Medallas.png">
            <div class="hover-box">
                <div class="project-title">
                    <h2>Sorteo de medallas</h2>
                    <span>Generación de las papeletas</span>
                    <div><?= anchor(site_url('hermano/medallas'), '<i class="fa fa-arrow-right"></i>') ?></div>
                </div>
            </div>
        </div>

    </div>
</div>
