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
                    <li class="logoff"><a href="<?php echo base_url() ?>/home/logout">Sair<span class="icon-white icon-share-alt"></span></a></li>
                    <li class="user">João Pedro da Silva<span class="icon-white icon-user"></li>
                </ul>
                <!-- menu responsive -->
                <div class="nav-collapse collapse">
                    <ul class="topMenu hidden-desktop">
                        <li class="active"><a href="#">Agendamento / Orçamento</a></li>
                        <li><a href="#">Clientes</a></li>
                        <li><a href="#">Serviços</a></li>
                        <li><a href="#">Produtos</a></li>
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
            <li class="home"><?php echo anchor('', 'Home')?><span class="divider"></span></li>
            <?php
            if(!isset($breadcrumb)){
                echo "<li class='active'>{$title}</li>";
            }else{
                echo "<li class='active'>".anchor($pagina, $title)."<span class='divider'></span></li>";
                echo "<li class='active'>{$breadcrumb}</li>";
            }
            ?>
        </ul>
        <input type="hidden" name="select-page" id="select-page" value="<?php echo $pagina ?>" />
        <input type="hidden" name="base-url" id="base-url" value="<?php echo base_url() ?>" />
    </div>
</header>