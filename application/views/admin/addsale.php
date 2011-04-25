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



<?php echo form_open_multipart('admin/addsale/', $formAddSale); ?>
<?php echo form_fieldset(); ?>
<div id="leftFormCol"><?php echo form_label('Name*:','name'); ?> </div>
<div id ="rightFormCol"><?php echo form_input($saleName); ?> </div>
<div id ="leftFormCol"><?php echo form_label('Location*:','location');?> </div>
<div id ="rightFormCol"><?php echo form_input($saleLocation);?> </div>
<div id ="leftFormCol"><?php echo form_label('Bedrooms*: ','bedrooms');?> </div>
<div id ="rightFormCol"><?php echo form_input($saleBedrooms);?> </div>
<div id ="leftFormCol"><?php echo form_label('Bathrooms*: ','bathrooms');?> </div>
<div id ="rightFormCol"><?php echo form_input($saleBathrooms);?> </div>
<div id ="leftFormCol"><?php echo form_label('Condition*: ','condition');?> </div>
<div id ="rightFormCol"><?php echo form_input($saleCondition);?> </div>
<div id ="leftFormCol"><?php echo form_label('Price*: ','price');?> </div>
<div id ="rightFormCol"><?php echo form_input($salePrice);?> </div>
<div id ="leftFormCol"><?php echo form_label('Image*: ','userfile');?> </div>
<div id ="rightFormCol"><?php echo form_upload($saleImage);?> </div>
<div id ="leftFormCol"><?php echo form_label('Description*: ','description');?> </div>
<div id ="rightFormCol"><?php echo form_textarea($saleDescription);?> </div>
<div id ="leftFormCol"><?php echo form_submit('submit','Add Sale');?> </div>
<?php echo form_fieldset_close(); ?>
<?php echo form_close(); ?>
