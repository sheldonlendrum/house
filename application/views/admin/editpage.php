<?php
//Setting form attributes
$formpageEdit = array('id' => 'pageEdit', 'name' => 'pageEdit');
$formInputTitle = array('id' => 'title', 'name' => 'title');
$formTextareaContent = array('id' => 'content', 'name' => 'content');
?>


<div id ="formLayout" class="form">
<?php echo form_open('admin/editpage/index/'.$page[0]['id'].'/'.url_title($page[0]['name'],'dash', TRUE),$formpageEdit); ?>
<?php echo form_fieldset(); ?>
<h4>You are editing: <?= $page[0]['name']; ?> </h4>
<section id = "validation"><?php echo validation_errors();?></section>
<?php
if($success == TRUE) {
echo '<section id = "validation">Page Updated</section>';	
}
?>
<label><?php echo form_label ('Content:', 'content');?><span class="small">Required Field</span></label>
<?php echo display_ckeditor($ckeditor); ?>
<?php echo form_textarea("content", $page[0]['content']); ?>
<?php echo form_submit('submit','Submit'); ?>
<?php echo form_fieldset_close();
	  echo form_close(); ?>
</div>	
