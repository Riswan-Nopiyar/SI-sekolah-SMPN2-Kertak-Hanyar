<?php
$page_title         = $judulHalaman;

foreach ($setting as $dataSetting) {
    $system_title   = $dataSetting->system_title;
    $text_align     = $dataSetting->text_align;
    $skin_colour    = $dataSetting->skin_colour;
}
?>
<!DOCTYPE html>
<html lang="en" dir="<?php if ($text_align == 'right-to-left') echo 'rtl'; ?>">

<head>
    <title><?php echo $page_title; ?> | <?php echo $system_title; ?></title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="School Management Informatiion System - Freelance Chanel - Youtube" />
    <meta name="author" content="Nopiyar" />

    <!-- INCLUDES TOP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/font-icons/entypo/css/entypo.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/neon-core.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/neon-theme.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/neon-forms.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/skins/' . $skin_colour); ?>.css">
    <?php if ($text_align == 'right-to-left') : ?>
        <link rel="stylesheet" href="<?= base_url('assets/css/neon-rtl.css') ?>">
    <?php endif; ?>

    <script src="<?= base_url('assets/js/jquery-1.11.0.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo.png') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/font-icons/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/vertical-timeline/css/component.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/datatables/responsive/css/datatables.responsive.css') ?>">

    <!--Amcharts-->
    <!-- <script src="<?php echo base_url('assets/js/amcharts/amcharts.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/amcharts/pie.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/amcharts/serial.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/amcharts/gauge.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/amcharts/funnel.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/amcharts/radar.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/amcharts/exporting/amexport.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/amcharts/exporting/rgbcolor.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/amcharts/exporting/canvg.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/amcharts/exporting/jspdf.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/amcharts/exporting/filesaver.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/amcharts/exporting/jspdf.plugin.addimage.js" type="text/javascript"></script> -->

    <script>
        function checkDelete() {
            var chk = confirm("Are You Sure To Delete This !");
            if (chk) {
                return true;
            } else {
                return false;
            }
        }
    </script>

</head>

<body class="page-body <?php if ($skin_colour != '') echo 'skin-' . $skin_colour; ?>">
    <div class="page-container <?php if ($text_align == 'right-to-left') echo 'right-sidebar'; ?>">
        <!-- SIDEBAR HERE -->
        <div class="sidebar-menu">
            <header class="logo-env">
                <!-- logo -->
                <div class="logo">
                    <a href="<?php echo base_url($this->session->userdata('login_type') . '/dashboard'); ?>">
                        <img src="<?= base_url('assets/images/logo.png') ?>" style="max-height:60px;" />
                    </a>
                </div>
                <!-- logo collapse icon -->
                <div class="sidebar-collapse">
                    <a href="#" class="sidebar-collapse-icon with-animation">

                        <i class="entypo-menu"></i>
                    </a>
                </div>

                <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                <div class="sidebar-mobile-menu visible-xs">
                    <a href="#" class="with-animation">
                        <i class="entypo-menu"></i>
                    </a>
                </div>
            </header>