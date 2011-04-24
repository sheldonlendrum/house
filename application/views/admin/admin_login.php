<?php
//Setting the form attributes
$formDetails = array('id' => 'loginForm', 'name' => 'loginForm');
$formInputUsername = array('id' => 'username', 'name' => 'username');
$formInputPassword = array('id' => 'password', 'name' => 'password');
?>

<section id = "validation"><?php echo validation_errors();?></section>

<?php
echo form_open('admin/home/login', $formDetails);
echo form_fieldset();
echo form_label('Username:','username');
echo form_input($formInputUsername);
echo form_label('Password:','password');
echo form_password($formInputPassword);
echo form_submit('loginSubmit','Login');
echo form_fieldset_close();	
echo form_close();
?>