<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 2.0.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8"/>
  <title>SIGA-Qx | Inicio de Sesión de Usuario</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta content="" name="description"/>
  <meta content="" name="author"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" />
  <link rel="stylesheet" type="text/css" href="/assets/plugins/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="/assets/plugins/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="/assets/plugins/uniform/css/uniform.default.css" />
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL STYLES -->
  <link rel="stylesheet" type="text/css" href="/assets/plugins/select2/select2.css"/>
  <link rel="stylesheet" type="text/css" href="/assets/plugins/select2/select2-metronic.css"/>
<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN THEME STYLES -->
  <link rel="stylesheet" type="text/css" href="/assets/css/style-metronic.css" />
  <link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
  <link rel="stylesheet" type="text/css" href="/assets/css/style-responsive.css" />
  <link rel="stylesheet" type="text/css" href="/assets/css/plugins.css" />
  <link rel="stylesheet" type="text/css" href="/assets/css/themes/default.css" id="style_color" />
  <link rel="stylesheet" type="text/css" href="/assets/css/pages/login.css" />
  <link rel="stylesheet" type="text/css" href="/assets/css/custom.css" />
<!-- END THEME STYLES -->

<link rel="shortcut icon" href="favicon.ico"/>
</head>

<!-- BEGIN BODY -->
<body class="login">

<!-- BEGIN LOGO -->
<div class="logo">
  <a href="index.html">
    <h2>SIGA - <span class="danger">Qx</span></h2>
    <!-- <img src="/assets/img/logo-big.png" alt=""/> -->
  </a>
</div>
<!-- END LOGO -->

<!-- ############################################## Contenido del Modulo Symfony ############################################## -->
          <?php echo $sf_content ?>
<!-- ########################################## Fin del contenido del Modulo Symfony ###########################################-->

<!-- BEGIN COPYRIGHT -->
<div class="copyright">
   2014 &copy; Metronic. Admin Dashboard Template.
</div>
<!-- END COPYRIGHT -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
  <script src="/assets/plugins/respond.min.js"></script>
  <script src="/assets/plugins/excanvas.min.js"></script>
  <![endif]-->
<script type="text/javascript" src="/assets/plugins/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery.blockui.min.js"></script>
<script type="text/javascript" src="/assets/plugins/jquery.cokie.min.js"></script>
<script type="text/javascript" src="/assets/plugins/uniform/jquery.uniform.min.js"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="/assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script type="text/javascript" src="/assets/scripts/core/app.js"></script>
<script type="text/javascript" src="/assets/scripts/custom/login.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>
    jQuery(document).ready(function() {
      App.init();
      Login.init();
    });
  </script>
<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>
