<?php
//Setting form attributes
$formpageEdit = array('id' => 'pageEdit', 'name' => 'pageEdit');
$formInputTitle = array('id' => 'title', 'name' => 'title');
$formTextareaContent = array('id' => 'content', 'name' => 'content');
if($success == TRUE) {
echo '<section id = "validation">Page Updated</section>';	
}
?>
<section id = "validation"><?php echo validation_errors();?></section>

<h4><?= $page[0]['name']; ?> </h4>
<?php
echo form_open('admin/editpage/index/'.$page[0]['id'].'/'.url_title($page[0]['name'],'dash', TRUE),$formpageEdit);
echo form_fieldset();
echo form_label ('Content', 'content');
echo form_textarea("content", $page[0]['content']);
echo form_submit('submit','Submit');
echo form_fieldset_close();
echo form_close();
?>