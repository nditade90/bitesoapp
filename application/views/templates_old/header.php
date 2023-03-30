<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
       <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=(isset($title))?$title : "FDNB - HRMS" ?> </title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/fontawesome-free/css/all.min.css">
    <!-- flag-icon-css -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/flag-icon-css/css/flag-icon.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/jqvmap/jqvmap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/summernote/summernote-bs4.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>plugins/select2-bootstrap4-theme/css/select2-bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?=base_url('assets/');?>plugins/jquery/jquery.min.js"></script>

    <link rel="apple-touch-icon" sizes="57x57" href="<?=base_url('assets/icons');?>/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url('assets/icons');?>/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('assets/icons');?>/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('assets/icons');?>/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('assets/icons');?>/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url('assets/icons');?>/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?=base_url('assets/icons');?>/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url('assets/icons');?>/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/icons');?>/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url('assets/icons');?>/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/icons');?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=base_url('assets/icons');?>/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/icons');?>/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?=base_url('assets/icons');?>/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <script type="text/javascript">
        function i18nize(lng) {
            let url = window.location.href;
            let newUrl = url.substr(0, url.indexOf('#'));
            if (url.indexOf('?lang=') != -1) {
                newUrl = url.split("?")[0];
            }
            window.location.replace(newUrl + '?lang=' + lng);

            $.ajax({

            });

        }
    </script>


</head>

<body class="sidebar-mini layout-fixed sidebar-mini-xs text-sm control-sidebar-slide-open sidebar-mini-md"
    style="height: auto;">

    <div class="wrapper">