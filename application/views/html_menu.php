<!-- menu principal -->
<aside class="visible-desktop">
    <ul class="menu">
        <?php 
        //Agendamento / Or�amento
        echo "<li".checkActiveLink($pagina, 'agendamentos').">";
            echo anchor('agendamentos', 'Agendamento / Or�amento');
        echo "</li>";
        //Clientes
        echo "<li".checkActiveLink($pagina, 'clientes').">";
            echo anchor('clientes', 'Clientes');
        echo "</li>";
        //Servi�os
        echo "<li".checkActiveLink($pagina, 'servicos').">";
            echo anchor('servicos', 'Servi�os');
        echo "</li>";
        //Produtos
        echo "<li".checkActiveLink($pagina, 'produtos').">";
            echo anchor('produtos', 'Produtos');
        echo "</li>";
        //Ve�culos
        echo "<li".checkActiveLink($pagina, 'veiculos').">";
            echo anchor('veiculos', 'Ve�culos');
        echo "</li>";
        //Marcas
        echo "<li".checkActiveLink($pagina, 'marcas').">";
            echo anchor('marcas', 'Marcas');
        echo "</li>";
        //Modelos
        echo "<li".checkActiveLink($pagina, 'modelos').">";
            echo anchor('modelos', 'Modelos');
        echo "</li>";
        //Combust�veis
        echo "<li".checkActiveLink($pagina, 'combustiveis').">";
            echo anchor('combustiveis', 'Combust�veis');
        echo "</li>";
        //Cidades
        echo "<li".checkActiveLink($pagina, 'cidades').">";
            echo anchor('cidades', 'Cidades');
        echo "</li>";
        //Usu�rios
        echo "<li".checkActiveLink($pagina, 'usuarios').">";
            echo anchor('usuarios', 'Usu�rios');
        echo "</li>";
        ?>
    </ul>
</aside>