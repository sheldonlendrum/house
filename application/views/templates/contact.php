<?php
//Setting form attributes
$formContact = array('id' => 'contact', 'name' => 'contact');
$formContactName = array('id' => 'name', 'name' => 'name', 'value' => set_value('name'));
$formContactEmail = array('id' => 'email', 'name' => 'email', 'value' => set_value('email'));
$formContactPhone = array('id' => 'phone','name' => 'phone', 'value' => set_value('phone'));
$formContactMessage = array('id' => 'message','name' => 'message', 'value' => set_value('message'));
if($success == TRUE) {
echo '<section id = "validation">Thank You Your Email Has Been Sent</section>';	
}

echo '<section id = "validation">'.$message['emailError'].'</section>';
?>
<section id = "validation"><?php echo validation_errors();?></section>

<div id ="formLayout" class="contactForm">
<?php echo form_open('contact',$formContact); ?>
<?php echo form_fieldset(); ?>
<label><?php echo form_label ('Name:', 'name');?><span class="small">Required Field</span></label>
<?php echo form_input($formContactName);?>
<label><?php echo form_label ('Email:', 'email');?><span class="small">Required Field</span></label>
<?php echo form_input($formContactEmail);?>
<label><?php echo form_label ('Phone:', 'phone');?><span class="small">Required Field</span></label>
<?php echo form_input($formContactPhone);?>
<label><?php echo form_label ('Message:', 'message');?><span class="small">Required Field</span></label>
<?php echo form_textarea($formContactMessage); ?>
<?php echo form_submit('submit','Submit'); ?>
<?php echo form_fieldset_close();
	  echo form_close(); ?>
</div>	
