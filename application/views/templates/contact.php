<section id="validation">
	<?php echo validation_errors();?>
</section>

<br />

<div id ="formLayout" class="contactForm">
	
	<?php echo form_open('process/contact-us')?>
		<fieldset>
			<label for="name">Name:<span class="small">Required Field</span></label>
			<input type="text" name="name" value="<?php echo set_value('name'); ?>" id="name"  />
			
			<label for="email">Email:<span class="small">Required Field</span></label>
			<input type="text" name="email" value="<?php echo set_value('email'); ?>" id="email"  />
			
			<label for="phone">Phone:<span class="small">Required Field</span></label>
			<input type="text" name="phone" value="<?php echo set_value('phone'); ?>" id="phone"  />
			
			<label for="message">Message:<span class="small">Required Field</span></label>
			<textarea name="message" cols="90" rows="12" id="message" ><?php echo set_value('message'); ?></textarea>
			
			<p><input type="submit" name="submit" value="Submit"  /></p>
			
		</fieldset>
	</form>

</div>	
