<?php
//Setting form attributes
$formAddImage = array('id' => 'addImage', 'name' => 'addImage');
$imageImage = array('id' => 'userfile', 'name' => 'userfile', 'placeholder' => 'File Location*');
$imageDescription = array('id' => 'description','name' => 'description', 'placeholder' => set_value('description'));

if($success == TRUE) {
echo '<section id = "validation">Image Uploaded</section>';	
}


echo '<section id = "validation">'.$message['imageError'].'</section>';
?>

<section id = "validation"><?php echo validation_errors(); ?></section>


<?php
echo form_open_multipart('admin/addimage', $formAddImage);
echo form_fieldset();
echo form_upload($imageImage);
echo form_textarea($imageDescription);
echo form_submit('submit','Submit');
echo form_fieldset_close();
echo form_close();
?>