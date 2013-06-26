<!DOCTYPE html>
<html>
    <head>
        <meta charset="iso-8859-1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sistema de Gerenciamento de Oficina - Munhoz Pneus</title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <?php
        $current = current_url();
        echo link_tag('css/bootstrap.css')."\n";
        echo link_tag('css/bootstrap-responsive.css')."\n";
        echo link_tag('css/general.css')."\n";
        echo link_tag('css/base.css')."\n";
        if($current == 'http://localhost/munhozpneus/home' || $current == 'http://localhost/munhozpneus/home/index'){
            echo link_tag('css/login.css')."\n";   
        }
        echo link_tag('css/breadcrumbs.css')."\n";
        echo link_tag('css/menu.css')."\n";
        echo link_tag('css/messages.css')."\n";
        echo link_tag('css/tabela.css')."\n";
        echo link_tag('css/tinytable.css')."\n";
        echo link_tag('css/uniform.css')."\n";
        echo link_tag('css/jquery-ui-1.10.3.custom.css')."\n";
        ?>
        <script src="<?php echo base_url()?>js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <!-- jQuery -->
        <script src="<?php echo base_url()?>js/jquery-1.10.1.min.js"></script>
        <!-- jQuery UI-->
        <script src="<?php echo base_url()?>js/jquery-ui-1.10.3.min.js"></script>
        <!-- TinyTable -->
        <script src="<?php echo base_url()?>js/tinytable.js"></script>
        <!-- Uniform -->
        <script src="<?php echo base_url()?>js/uniform.js"></script>
        <!-- Objeto Sistema -->
        <script src="<?php echo base_url()?>js/sistema.js"></script>
    </head>
    <body>