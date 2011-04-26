<?php
//Setting form attributes
$formEditSale = array('id' => 'editSale', 'name' => 'editSale');
$formEditSaleName = array('id' => 'name', 'name' => 'name');
$formEditSaleLocation = array('id' => 'location', 'name' => 'location');
$formEditSaleBedrooms = array('id' => 'bedrooms','name' => 'bedrooms');
$formEditSaleBathrooms = array('id' => 'bathrooms','name' => 'bathrooms');
$formEditSaleCondition = array('id' => 'condition','name' => 'condition');
$formEditSaleImage = array('id' => 'userfile', 'name'=> 'userfile');
$formEditSalePrice = array('id' => 'price','name' => 'price');
$formEditSaleDescription = array('id' => 'description','name' => 'description');


if($success == TRUE) {
echo '<section id = "validation">Sale Updated</section>';	
}

echo '<section id = "validation">'.$message['imageError'].'</section>';
?>

<section id = "validation"><?php echo validation_errors();?></section>

<div id ="formLayout" class="form">
<?php echo form_open_multipart('admin/editsale/index/'.$sale[0]['id'].'/'.url_title($sale[0]['name'],'dash', TRUE),$formEditSale); ?>
<?php echo form_fieldset(); ?>
<label><?php echo form_label('Name:','name'); ?> <span class="small">Required Field</span></label>
<?php echo form_input($formEditSaleName, $sale[0]['name']); ?>
<label><?php echo form_label('Location:','location');?> <span class="small">Required Field</span></label>
<?php echo form_input($formEditSaleLocation, $sale[0]['location']);?>
<label><?php echo form_label('Bedrooms: ','bedrooms');?> <span class="small">Required Field</span></label>
<?php echo form_input($formEditSaleBedrooms, $sale[0]['bedrooms']);?>
<label><?php echo form_label('Bathrooms: ','bathrooms');?> <span class="small">Required Field</span></label>
<?php echo form_input($formSaleBathrooms, $sale[0]['bathrooms']);?>
<label><?php echo form_label('Condition: ','condition');?> <span class="small">Required Field</span></label>
<?php echo form_input($formCondition, $sale[0]['condition']);?>
<label><?php echo form_label('Price: ','price');?> <span class="small">Required Field</span></label>
<?php echo form_input($formEditSalePrice, $sale[0]['price']);?>
<label><?php echo form_label('Image: ','userfile');?> <span class="small">Required Field</span></label>
<?php echo form_upload($formEditSaleImage);?>
<label><?php echo form_label('Description: ','description');?> <span class="small">Required Field</span></label>
<?php echo form_textarea($$formEditSaleDescription, $sale[0]['description']);?>
<?php echo form_submit('submit','Add Sale');?>
<?php echo form_fieldset_close(); ?>
<?php echo form_close(); ?>
</div>