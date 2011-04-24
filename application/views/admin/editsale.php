<?php
//Setting form attributes
$formEditSale = array('id' => 'editSale', 'name' => 'editSale');
$formName = array('id' => 'name', 'name' => 'name');
$formLocation = array('id' => 'location', 'name' => 'location');
$formBedrooms = array('id' => 'bedrooms','name' => 'bedrooms');
$formBathrooms = array('id' => 'bathrooms','name' => 'bathrooms');
$formCondition = array('id' => 'condition','name' => 'condition');
$formDescription = array('id' => 'description','name' => 'description');
$formPrice = array('id' => 'price','name' => 'price');

if($success == TRUE) {
echo '<section id = "validation">Sale Updated</section>';	
}
?>

?>

<section id = "validation"><?php echo validation_errors();?></section>

<?php
echo form_open_multipart('admin/editsale/index/'.$sale[0]['id'].'/'.url_title($sale[0]['name'],'dash', TRUE),$formEditSale);
echo form_fieldset();
echo form_label('Name:', 'name');
echo form_input($formName, $sale[0]['name']);
echo form_label ('Location', 'location');
echo form_input($formLocation, $sale[0]['location']);
echo form_label ('Bedrooms', 'bedrooms');
echo form_input($formBedrooms, $sale[0]['bedrooms']);
echo form_label ('Bathrooms', 'bathrooms');
echo form_input($formBathrooms, $sale[0]['bathrooms']);
echo form_label ('Condition', 'condition');
echo form_input($formCondition, $sale[0]['condition']);
echo form_label ('Price', 'price');
echo form_input($formPrice, $sale[0]['sale']);
echo form_label ('Description', 'description');
echo form_textarea($formDescription, $sale[0]['description']);
echo form_submit('submit','Submit');
echo form_fieldset_close();
echo form_close();