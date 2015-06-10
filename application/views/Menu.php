<!DOCTYPE html>
<html>
    <head>
        <title>Menú principal</title>
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
        <div class="inner-content">
            <div class="portfolio-page">
                <div class="portfolio-box">

                    <div class="project-post">
                        <img alt="" src="<?= base_url() ?>assets/images/image6.jpg">
                        <div class="hover-box">
                            <div class="project-title">
                                <h2>Viviendas</h2>
                                <span>Listado de viviendas registradas</span>
                                <div><?= anchor(site_url('vivienda'), '<i class="fa fa-arrow-right"></i>') ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="project-post">
                        <img alt="" src="<?= base_url() ?>assets/images/image6.jpg">
                        <div class="hover-box">
                            <div class="project-title">
                                <h2>Hermanos</h2>
                                <span>Listados de hermanos dados de alta</span>
                                <div><?= anchor(site_url('hermano'), '<i class="fa fa-arrow-right"></i>') ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="project-post">
                        <img alt="" src="<?= base_url() ?>assets/images/image6.jpg">
                        <div class="hover-box">
                            <div class="project-title">
                                <h2>Remesas</h2>
                                <span>Listado de remesas</span>
                                <div><?= anchor(site_url('remesa'), '<i class="fa fa-arrow-right"></i>') ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="project-post">
                        <img alt="" src="<?= base_url() ?>assets/images/image6.jpg">
                        <div class="hover-box">
                            <div class="project-title">
                                <h2>Consultas</h2>
                                <span>Constructor de consultas</span>
                                <div><?= anchor(site_url('constructor'), '<i class="fa fa-arrow-right"></i>') ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="project-post">
                        <img alt="" src="<?= base_url() ?>assets/images/image6.jpg">
                        <div class="hover-box">
                            <div class="project-title">
                                <h2>Registro de pago</h2>
                                <span>Registro del pago de un plazo</span>
                                <div><?= anchor(site_url('pago/registra'), '<i class="fa fa-arrow-right"></i>') ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="project-post">
                        <img alt="" src="<?= base_url() ?>assets/images/image6.jpg">
                        <div class="hover-box">
                            <div class="project-title">
                                <h2>Agenda de contactos</h2>
                                <span>Listado de contactos</span>
                                <div><?= anchor(site_url('contacto'), '<i class="fa fa-arrow-right"></i>') ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="project-post">
                        <img alt="" src="<?= base_url() ?>assets/images/image6.jpg">
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
        </div>
    </div>
    <!-- End content -->

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