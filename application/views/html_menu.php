<!-- menu principal -->
<aside class="visible-desktop">
    <ul class="menu">
        <?php 
        //Agendamento / Orçamento
        $active = ($pagina == 'agendamentos') ? "class='active'" : "";
        echo "<li {$active}>";
            echo anchor('agendamentos', 'Agendamento / Orçamento');
        echo "</li>";
        //Clientes
        $active = ($pagina == 'clientes') ? "class='active'" : "";
        echo "<li {$active}>";
            echo anchor('clientes', 'Clientes');
        echo "</li>";
        //Serviços
        $active = ($pagina == 'servicos') ? "class='active'" : "";
        echo "<li {$active}>";
            echo anchor('servicos', 'Serviços');
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
        //Combustíveis
        $active = ($pagina == 'combustiveis') ? "class='active'" : "";
        echo "<li {$active}>";
            echo anchor('combustiveis', 'Combustíveis');
        echo "</li>";
        //Cidades
        $active = ($pagina == 'cidades') ? "class='active'" : "";
        echo "<li {$active}>";
            echo anchor('cidades', 'Cidades');
        echo "</li>";
        //Usuários
        $active = ($pagina == 'usuarios') ? "class='active'" : "";
        echo "<li {$active}>";
            echo anchor('usuarios', 'Usuários');
        echo "</li>";
        ?>
    </ul>
</aside>