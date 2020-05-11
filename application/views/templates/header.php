<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?= $title; ?></title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">

    <!-- Leaflet Map style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/leaflet/leaflet.css">

    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/leaflet-panel-layers/src/leaflet-panel-layers.css" />

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style type="text/css">
        #mapid {
            height: 30rem;
        }


        @media screen and (max-height: 823px) and (max-width: 411px) {
            #mapid {
                height: 723px;
            }
        }

        @media screen and (max-height: 812px) and (max-width: 375px) {
            #mapid {
                height: 712px;
            }
        }

        @media screen and (max-height: 736px) and (max-width: 414px) {
            #mapid {
                height: 636px;
            }
        }

        @media screen and (max-height: 667px) and (max-width: 375px) {
            #mapid {
                height: 567px;
            }
        }

        @media screen and (max-height: 640px) and (max-width: 360px) {
            #mapid {
                height: 540px;
            }
        }

        @media screen and (max-height: 568px) and (max-width: 320px) {
            #mapid {
                height: 468px;
            }
        }
    </style>
</head>

<body class="hold-transition fixed sidebar-collapse">