<?php
//Setting form attributes
$formAddSale = array('id' => 'addSale', 'name' => 'addSale');
$saleName = array('id' => 'name', 'name' => 'name', 'value' => set_value('name'));
$saleLocation = array('id' => 'location', 'name' => 'location', 'value' => set_value('location'));
$saleBedrooms = array('id' => 'bedrooms','name' => 'bedrooms', 'value' => set_value('bedrooms'));
$saleBathrooms = array('id' => 'bathrooms','name' => 'bathrooms', 'value' => set_value('bathrooms'));
$saleCondition = array('id' => 'condition','name' => 'condition', 'value' => set_value('condition'));
$saleImage = array('id' => 'userfile', 'name'=> 'userfile');
$salePrice = array('id' => 'price','name' => 'price','value' => set_value('price'));
$saleDescription = array('id' => 'description','name' => 'description', 'value' => set_value('description'));

if($success == TRUE) {
echo '<section id = "validation">Sale Added</section>';	
}
echo '<section id = "validation">'.$message['imageError'].'</section>';
?>

<section id = "validation"><?php echo validation_errors();?></section>

<div id ="formLayout" class="form">
<?php echo form_open_multipart('admin/addsale/', $formAddSale); ?>
<?php echo form_fieldset(); ?>
<label><?php echo form_label('Name:','name'); ?> <span class="small">Required Field</span></label>
<?php echo form_input($saleName); ?>
<label><?php echo form_label('Location:','location');?> <span class="small">Required Field</span></label>
<?php echo form_input($saleLocation);?>
<label><?php echo form_label('Bedrooms: ','bedrooms');?> <span class="small">Required Field</span></label>
<?php echo form_input($saleBedrooms);?>
<label><?php echo form_label('Bathrooms: ','bathrooms');?> <span class="small">Required Field</span></label>
<?php echo form_input($saleBathrooms);?>
<label><?php echo form_label('Condition: ','condition');?> <span class="small">Required Field</span></label>
<?php echo form_input($saleCondition);?>
<label><?php echo form_label('Price: ','price');?> <span class="small">Required Field</span></label>
<?php echo form_input($salePrice);?>
<label><?php echo form_label('Image: ','userfile');?> <span class="small">Required Field</span></label>
<?php echo form_upload($saleImage);?>
<label><?php echo form_label('Description: ','description');?> <span class="small">Required Field</span></label>
<?php echo form_textarea($saleDescription);?>
<?php echo form_submit('submit','Add Sale');?>
<?php echo form_fieldset_close(); ?>
<?php echo form_close(); ?>
</div>
