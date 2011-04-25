<?php
//Setting form attributes
$formEditSale = array('id' => 'addSale', 'name' => 'addSale');
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

<?php
echo form_open_multipart('admin/editsale/index/'.$sale[0]['id'].'/'.url_title($sale[0]['name'],'dash', TRUE),$formEditSale);
echo form_fieldset();
echo form_label('Name*:','name'); 
echo form_input($formEditSaleName, $sale[0]['name']);
echo form_label('Location*:','location');
echo form_input($formEditSaleLocation, $sale[0]['location']);
echo form_label('Bedrooms*: ','bedrooms');
echo form_input($formEditSaleBedrooms, $sale[0]['bedrooms']);
echo form_label('Bathrooms*: ','bathrooms');
echo form_input($formSaleBathrooms, $sale[0]['bathrooms']);
echo form_label('Condition*: ','condition');
echo form_input($formCondition, $sale[0]['condition']);
echo form_label('Price*: ','price');
echo form_input($formEditSalePrice, $sale[0]['price']);
echo form_label('Image*: ','userfile');
echo form_upload($formEditSaleImage);
echo form_label('Description*: ','description');
echo form_textarea($formEditSaleDescription, $sale[0]['description']);
echo form_submit('submit','Edit Sale');
echo form_fieldset_close();
echo form_close();