<!--  ==========  ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="contactForm">			
				<h3>Contact Us!</h3>
				<?=form_open('email/sendEmail', array('class' => 'con'));?>
				<p><label>Name:</label> <input class="contact" type="text" value="" name="name" autocomplete="off"/></p>
				
				<p><label>Email:</label> <input type="text" class="contact" name="email" autocomplete="off"/></p>
				
				<p><label>Message:</label><textarea name="message" ></textarea></p>
				<input type="submit" class="submit contactSub" value="Post" />
				</form>
			</div>
			
<script src="<?php echo base_url();?>inc/js/contact.js" type="text/javascript"></script>