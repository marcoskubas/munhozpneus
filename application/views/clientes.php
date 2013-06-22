<?php
//Verificar se alguma ação foi executada
$acoes = checkActionMessage($this->session->userdata('acaoOk'));
$acaoMessage = $acoes['acaoMessage'];
$classMessage = $acoes['classMessage'];
$this->session->set_userdata('acaoOk','');
?>
<!-- Content -->
<div id="content" class="container-fluid">
    <h2>Clientes</h2>
    <div class="mensagem <?php echo $classMessage?>"><?php echo $acaoMessage?></div>
    <div class="actions fRight">
        <?php $this->load->view('html_buttons');?>
    </div>
    <?php 
    tinytable($records, $fields);
    ?>
</div>
<script type="text/javascript">
    var sorter = Sistema.setTinytable(<?php echo count($records)?>);
    Sistema.setUniform();
</script>
<!-- /Content -->