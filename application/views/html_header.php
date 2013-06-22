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
                <a class="logo" href="<?php echo base_url()?>agendamentos" title="Munhoz Pneus - Sistema de Gestão de Oficina">Munhoz Pneus</a>
                <!-- perfil -->
                <ul class="user-bar">
                    <li class="logoff"><a href="<?php echo base_url()?>home/logout">Sair<span class="icon-white icon-share-alt"></span></a></li>
                    <li class="user"><?php echo $this->session->userdata('usuario');?><span class="icon-white icon-user"></li>
                </ul>
                <!-- menu responsive -->
                <div class="nav-collapse collapse">
                    <ul class="topMenu hidden-desktop">
                        <li<?php echo checkActiveLink($pagina, 'agendamentos');?>><a href="<?php echo base_url();?>agendamentos">Agendamento / Orçamento</a></li>
                        <li<?php echo checkActiveLink($pagina, 'clientes');?>><a href="<?php echo base_url();?>clientes">Clientes</a></li>
                        <li<?php echo checkActiveLink($pagina, 'servicos');?>><a href="<?php echo base_url();?>servicos">Serviços</a></li>
                        <li<?php echo checkActiveLink($pagina, 'produtos');?>><a href="<?php echo base_url();?>produtos">Produtos</a></li>
                        <li<?php echo checkActiveLink($pagina, 'marcas');?>><a href="<?php echo base_url();?>marcas">Marcas</a></li>
                        <li<?php echo checkActiveLink($pagina, 'modelos');?>><a href="<?php echo base_url();?>modelos">Modelos</a></li>
                        <li<?php echo checkActiveLink($pagina, 'combustiveis');?>><a href="<?php echo base_url();?>combustiveis">Combustíveis</a></li>
                        <li<?php echo checkActiveLink($pagina, 'cidades');?>><a href="<?php echo base_url();?>cidades">Cidades</a></li>
                        <li<?php echo checkActiveLink($pagina, 'usuarios');?>><a href="<?php echo base_url();?>usuarios">Usuários</a></li>
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