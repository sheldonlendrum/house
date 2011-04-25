<?php
//Setting form attributes
$formAddSale = array('id' => 'addSale', 'name' => 'addSale');
$saleName = array('id' => 'name', 'name' => 'name', 'placeholder' => 'Name*', 'value' => set_value('name'));
$saleLocation = array('id' => 'location', 'name' => 'location', 'placeholder' => 'Location*', 'value' => set_value('location'));
$saleBedrooms = array('id' => 'bedrooms','name' => 'bedrooms', 'placeholder' => 'Number of Bedrooms*', 'value' => set_value('bedrooms'));
$saleBathrooms = array('id' => 'bathrooms','name' => 'bathrooms', 'placeholder' => 'Number of Bathrooms*', 'value' => set_value('bathrooms'));
$saleCondition = array('id' => 'condition','name' => 'condition', 'placeholder' => 'Condition*', 'value' => set_value('condition'));
$saleImage = array('id' => 'userfile', 'name'=> 'userfile', 'placeholder' => 'File Location*');
$salePrice = array('id' => 'price','name' => 'price', 'placeholder' => 'Price*', 'value' => set_value('price'));
$saleDescription = array('id' => 'description','name' => 'description', 'placeholder' => 'Sale Description*', 'value' => set_value('description'));

if($success == TRUE) {
echo '<section id = "validation">Sale Added</section>';	
}
echo '<section id = "validation">'.$message['imageError'].'</section>';
?>

<section id = "validation"><?php echo validation_errors();?></section>


<?php 
echo form_open_multipart('admin/addsale/', $formAddSale);
echo form_fieldset(); 
echo form_input($saleName);
echo form_input($saleLocation);
echo form_input($saleBedrooms);
echo form_input($saleBathrooms);
echo form_input($saleCondition);
echo form_input($salePrice);
echo form_upload($saleImage);
echo form_textarea($saleDescription);
echo form_submit('submit','Submit');
echo form_fieldset_close();
echo form_close();
?>