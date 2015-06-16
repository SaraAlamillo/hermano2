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
            <?php if (!is_null($alerta)): ?>
                <div id='loginConAlerta'>
                <?php else: ?>
                    <div id='login'>
                    <?php endif; ?>
                    <img src='<?= base_url() ?>assets/images/imgLogin.png' />
                    <?php if (!is_null($alerta)): ?>
                        <div class="alert alert-<?= $alerta['tipo'] ?> alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?= $alerta['mensaje'] ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= site_url('Main/login') ?>" method="POST" id="contact-form">
                        <div class="float-input">
                            <input type="text" name="usuario" placeholder="Usuario" />
                            <span>Usuario</span>
                        </div>
                        <div class="float-input">
                            <input type="password" name="clave" placeholder="Contraseña" />
                            <span>Contraseña</span>
                        </div>
                        <input type="hidden" name="url" value="<?= current_url() ?>" />
                        <input type="submit" value="Acceder" />
                    </form>
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