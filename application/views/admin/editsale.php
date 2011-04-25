<?php
//Setting form attributes
$formEditSale = array('id' => 'addSale', 'name' => 'addSale');
$formEditSaleName = array('id' => 'name', 'name' => 'name', 'placeholder' => 'Name*');
$formEditSaleLocation = array('id' => 'location', 'name' => 'location', 'placeholder' => 'Location*');
$formEditSaleBedrooms = array('id' => 'bedrooms','name' => 'bedrooms', 'placeholder' => 'Number of Bedrooms*');
$formEditSaleBathrooms = array('id' => 'bathrooms','name' => 'bathrooms', 'placeholder' => 'Number of Bathrooms*');
$formEditSaleCondition = array('id' => 'condition','name' => 'condition', 'placeholder' => 'Condition*');
$formEditSaleImage = array('id' => 'userfile', 'name'=> 'userfile', 'placeholder' => 'File Location*');
$formEditSalePrice = array('id' => 'price','name' => 'price', 'placeholder' => 'Price*');
$formEditSaleDescription = array('id' => 'description','name' => 'description', 'placeholder' => 'Sale Description*');


if($success == TRUE) {
echo '<section id = "validation">Sale Updated</section>';	
}

echo '<section id = "validation">'.$message['imageError'].'</section>';
?>

<section id = "validation"><?php echo validation_errors();?></section>

<?php
echo form_open_multipart('admin/editsale/index/'.$sale[0]['id'].'/'.url_title($sale[0]['name'],'dash', TRUE),$formEditSale);
echo form_fieldset();
echo form_input($formEditSaleName, $sale[0]['name']);
echo form_input($formEditSaleLocation, $sale[0]['location']);
echo form_input($formEditSaleBedrooms, $sale[0]['bedrooms']);
echo form_input($formSaleBathrooms, $sale[0]['bathrooms']);
echo form_input($formCondition, $sale[0]['condition']);
echo form_input($formEditSalePrice, $sale[0]['price']);
echo form_upload($formEditSaleImage);
echo form_textarea($formEditSaleDescription, $sale[0]['description']);
echo form_submit('submit','Edit Sale');
echo form_fieldset_close();
echo form_close();