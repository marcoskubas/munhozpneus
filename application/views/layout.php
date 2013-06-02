<!DOCTYPE html>
<html>
    <head>
        <meta charset="iso-8859-1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sistema de Gerenciamento de Oficina - Munhoz Pneus</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <link href="css/general.css" rel="stylesheet">
        <link href="css/base.css" rel="stylesheet">
        <link href="css/breadcrumbs.css" rel="stylesheet">
        <link href="css/menu.css" rel="stylesheet">
        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <header>
            <div class="navbar navbar-inverse">
                <div class="navbar-inner header-admin">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <!-- logo -->
                        <a class="logo" href="#" title="Munhoz Pneus - Sistema de Gestão de Oficina">Munhoz Pneus</a>
                        <!-- perfil -->
                        <ul class="user-bar">
                            <li class="logoff"><a href="#">Sair<span class="icon-white icon-share-alt"></span></a></li>
                            <li class="user">João Pedro da Silva<span class="icon-white icon-user"></li>
                        </ul>
                        <!-- menu responsive -->
                        <div class="nav-collapse collapse">
                            <ul class="topMenu hidden-desktop">
                                <li class="active"><a href="#">Agendamento / Orçamento</a></li>
                                <li><a href="#">Clientes</a></li>
                                <li><a href="#">Serviços</a></li>
                                <li><a href="#">Produtos</a></li>
                                <li><a href="#">Veículos</a></li>
                                <li><a href="#">Marcas</a></li>
                                <li><a href="#">Modelos</a></li>
                                <li><a href="#">Combustíveis</a></li>
                                <li><a href="#">Cidades</a></li>
                                <li><a href="#">Usuários</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner navigation">
                <!-- breadcrumbs -->
                <ul class="breadcrumb">
                    <li class="home"><a href="#">Home</a><span class="divider"></span></li>
                    <li class="active"><?=$title?></li>
                </ul>
            </div>
        </header>
        <!-- menu principal -->
        <aside class="visible-desktop">
            <ul class="menu">
                <li <?php if($pagina == 'agendamentos'){ echo "class='active'"; }?>><a href="agendamentos">Agendamento / Orçamento</a></li>
                <li <?php if($pagina == 'clientes'){ echo "class='active'"; }?>><a href="clientes">Clientes</a></li>
                <li <?php if($pagina == 'servicos'){ echo "class='active'"; }?>><a href="servicos">Serviços</a></li>
                <li <?php if($pagina == 'produtos'){ echo "class='active'"; }?>><a href="produtos">Produtos</a></li>
                <li <?php if($pagina == 'veiculos'){ echo "class='active'"; }?>><a href="veiculos">Veículos</a></li>
                <li <?php if($pagina == 'marcas'){ echo "class='active'"; }?>><a href="marcas">Marcas</a></li>
                <li <?php if($pagina == 'modelos'){ echo "class='active'"; }?>><a href="modelos">Modelos</a></li>
                <li <?php if($pagina == 'combustiveis'){ echo "class='active'"; }?>><a href="combustiveis">Combustíveis</a></li>
                <li <?php if($pagina == 'cidades'){ echo "class='active'"; }?>><a href="cidades">Cidades</a></li>
                <li <?php if($pagina == 'usuarios'){ echo "class='active'"; }?>><a href="usuarios">Usuários</a></li>
            </ul>
        </aside>
        <!-- Content -->
        <div id="content" class="container-fluid">
            <?php
            $this->load->view($pagina);
            ?>
            <!-- Content -->
        </div>
        <!-- jQuery -->
        <script src="js/jquery-1.9.1.js"></script>
        <!-- bootstrap -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>