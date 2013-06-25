<h4><?php echo utf8_encode($title)?></h4>
<?php foreach ($fields as $key => $field) { ?>
<div class="span12">
    <div class="span4"><?php echo utf8_encode($field)?>: </div>
    <div class="span8"><?php echo $record->$key?> </div>
</div>    
<?php }?>
