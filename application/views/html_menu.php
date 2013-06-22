<!-- menu principal -->
<aside class="visible-desktop">
    <ul class="menu">
        <?php 
        //Agendamento / Orçamento
        echo "<li".checkActiveLink($pagina, 'agendamentos').">";
            echo anchor('agendamentos', 'Agendamento / Orçamento');
        echo "</li>";
        //Clientes
        echo "<li".checkActiveLink($pagina, 'clientes').">";
            echo anchor('clientes', 'Clientes');
        echo "</li>";
        //Serviços
        echo "<li".checkActiveLink($pagina, 'servicos').">";
            echo anchor('servicos', 'Serviços');
        echo "</li>";
        //Produtos
        echo "<li".checkActiveLink($pagina, 'produtos').">";
            echo anchor('produtos', 'Produtos');
        echo "</li>";
        //Veículos
        echo "<li".checkActiveLink($pagina, 'veiculos').">";
            echo anchor('veiculos', 'Veículos');
        echo "</li>";
        //Marcas
        echo "<li".checkActiveLink($pagina, 'marcas').">";
            echo anchor('marcas', 'Marcas');
        echo "</li>";
        //Modelos
        echo "<li".checkActiveLink($pagina, 'modelos').">";
            echo anchor('modelos', 'Modelos');
        echo "</li>";
        //Combustíveis
        echo "<li".checkActiveLink($pagina, 'combustiveis').">";
            echo anchor('combustiveis', 'Combustíveis');
        echo "</li>";
        //Cidades
        echo "<li".checkActiveLink($pagina, 'cidades').">";
            echo anchor('cidades', 'Cidades');
        echo "</li>";
        //Usuários
        echo "<li".checkActiveLink($pagina, 'usuarios').">";
            echo anchor('usuarios', 'Usuários');
        echo "</li>";
        ?>
    </ul>
</aside>