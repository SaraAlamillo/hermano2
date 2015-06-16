<!DOCTYPE html>
<html>
    <head>
        <title>San Telmo</title>
        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.css" media="screen">	
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/magnific-popup.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/font-awesome.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/flexslider.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/responsive.css" media="screen">
    </head>
    <body>
        <div id="container">
            <header>
                <div class="logo-box">
                    <?= anchor(site_url('main'), "<img src='" . base_url() . "assets/images/logo.png' />", ['class' => 'logo img-responsive']) ?>
                </div>
                <a class="elemadded responsive-link" href="#">Menu</a>
                <div class="menu-box">
                    <ul class="menu">
                        <li><?= anchor(site_url('Main'), '<span>Inicio</span>', ['class' => $activo == 'home' ? 'active' : '']) ?></li>
                        <li><?= anchor(site_url('Vivienda'), '<span>Viviendas</span>', ['class' => $activo == 'vivienda' ? 'active' : '']) ?></li>
                        <li><?= anchor(site_url('Hermano'), '<span>Hermanos</span>', ['class' => $activo == 'hermano' ? 'active' : '']) ?></li>
                        <li><?= anchor(site_url('Remesa'), '<span>Remesas</span>', ['class' => $activo == 'remesa' ? 'active' : '']) ?></li>
                        <?php if ($rolActual == 'Administrador'): ?>
                            <li><?= anchor(site_url('Pago/registra'), '<span>Registro de pago</span>', ['class' => $activo == 'registro' ? 'active' : '']) ?></li>
                        <?php endif; ?>
                        <li><?= anchor(site_url('Contacto'), '<span>Contactos</span>', ['class' => $activo == 'contacto' ? 'active' : '']) ?></li>
                        <li><?= anchor(site_url('Hermano/medallas'), '<span>Sorteo de medalla</span>', ['class' => $activo == 'medalla' ? 'active' : '']) ?></li>
                        <li>
                            <?= anchor(site_url('Main/salir'), '<span><img  src="' . base_url() . 'assets/images/icons/iconCerrSes.png" class="img-responsive" style="float:left;" /><br />Cerrar Sesión</span>') ?></li>
                    </ul>				
                </div>
            </header>

            <div id="content">
                <div class="inner-content">
                    <?php if ($menu): ?>
                        <?= $contenido ?>
                    <?php else: ?>
                        <div class="about-page">
                            <div class="contact-box">
                                <?= $contenido ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>

    <div class="preloader">
        <img alt="" src="<?= base_url() ?>assets/images/preloader.gif">
    </div>

    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.migrate.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.imagesloaded.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/retina-1.1.0.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/script.js"></script> 
</body>
</html>