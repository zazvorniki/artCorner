<!--  ==========  ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<p class="emailJava">Were sorry, but you need javascript to use our contact form. If you believe you are seeing this message in error please contact the creator of this site catlyndesigns@gmail.com </p>
			<p class="emailJava">If you still need to contact the art teacher please email marcia.sears@keysschools.com</p>
			<div class="contactForm">			
				<h3>Contact Us!</h3>
				<?=form_open('email/emailForm/', array('class' => 'con'));?>
					<?=form_hidden('data-key', 'contactF')?>
					<p><label>Name:</label> <input class="contact" type="text" value="" name="name" id="name" autocomplete="off"/></p>
					
					<p><label>Email:</label> <input type="text" class="contact" name="email" id="email" autocomplete="off"/></p>
					Message:<div class="messageCon">
						<p><label></label><textarea name="message" ></textarea></p>
					</div>	
					<input type="submit" class="submit contactSub" value="Email" />
				</form>
			</div>
			
<script src="<?php echo base_url();?>inc/js/contactVal.js" type="text/javascript"></script>