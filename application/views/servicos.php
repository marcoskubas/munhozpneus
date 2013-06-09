<?php
//Verificar se alguma ação foi executada
$sessionMessage = $this->session->userdata('acaoOk');
$acaoMessage = "";
$classMessage = "";
if(!empty($sessionMessage)):
    $acaoMessage = $this->session->userdata('acaoOk');
    $classMessage = " sucesso";
    $this->session->set_userdata('acaoOk','');
else:
    $classMessage = " hidden";
endif;
?>
<!-- Content -->
<div id="content" class="container-fluid">
    <h2>Serviços</h2>
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