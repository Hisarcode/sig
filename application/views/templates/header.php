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

    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">

    <!-- Leaflet Map style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/leaflet/leaflet.css">

    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/leaflet-panel-layers/src/leaflet-panel-layers.css" />

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/leaflet-coordinates/Leaflet.Coordinates-0.1.5.css" />

    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/leaflet-routing/leaflet-routing-machine.css" />

    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/leaflet-zoomhome/leaflet.zoomhome.css" />

    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/leaflet-locate/L.Control.Locate.min.css" />

    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/lightbox/mygallery.css" />

    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bar.css" />

    <style type="text/css">
        #mapid {
            height: 30rem;
            width: 100%;
        }
    </style>
</head>

<body class="hold-transition fixed">