<!-- menu principal -->
<aside class="visible-desktop">
    <ul class="menu">
        <?php 
        //Agendamento / Or�amento
        $active = ($pagina == 'agendamentos') ? "class='active'" : "";
        echo "<li {$active}>";
            echo anchor('agendamentos', 'Agendamento / Or�amento');
        echo "</li>";
        //Clientes
        $active = ($pagina == 'clientes') ? "class='active'" : "";
        echo "<li {$active}>";
            echo anchor('clientes', 'Clientes');
        echo "</li>";
        //Servi�os
        $active = ($pagina == 'servicos') ? "class='active'" : "";
        echo "<li {$active}>";
            echo anchor('servicos', 'Servi�os');
        echo "</li>";
        //Produtos
        $active = ($pagina == 'produtos') ? "class='active'" : "";
        echo "<li {$active}>";
            echo anchor('produtos', 'Produtos');
        echo "</li>";
        //Marcas
        $active = ($pagina == 'marcas') ? "class='active'" : "";
        echo "<li {$active}>";
            echo anchor('marcas', 'Marcas');
        echo "</li>";
        //Produtos
        $active = ($pagina == 'modelos') ? "class='active'" : "";
        echo "<li {$active}>";
            echo anchor('modelos', 'Modelos');
        echo "</li>";
        //Combust�veis
        $active = ($pagina == 'combustiveis') ? "class='active'" : "";
        echo "<li {$active}>";
            echo anchor('combustiveis', 'Combust�veis');
        echo "</li>";
        //Combust�veis
        $active = ($pagina == 'combustiveis') ? "class='active'" : "";
        echo "<li {$active}>";
            echo anchor('combustiveis', 'Combust�veis');
        echo "</li>";
        //Cidades
        $active = ($pagina == 'cidades') ? "class='active'" : "";
        echo "<li {$active}>";
            echo anchor('cidades', 'Cidades');
        echo "</li>";
        //Usu�rios
        $active = ($pagina == 'usuarios') ? "class='active'" : "";
        echo "<li {$active}>";
            echo anchor('usuarios', 'Usu�rios');
        echo "</li>";
        ?>
    </ul>
</aside>