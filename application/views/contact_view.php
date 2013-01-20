<!--  ==========  ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="contactForm">			
				<h3>Contact Us!</h3>
				<?=form_open('email/', array('class' => 'con'));?>
					<p><label>Name:</label> <input class="contact" type="text" value="" name="name" id="name" autocomplete="off"/></p>
					
					<p><label>Email:</label> <input type="text" class="contact" name="email" id="email" autocomplete="off"/></p>
					Message:<div class="messageCon">
						<p><label></label><textarea name="message" ></textarea></p>
					</div>	
					<input type="submit" class="submit contactSub" value="Email" />
				</form>
			</div>
			
<script src="<?php echo base_url();?>inc/js/contactVal.js" type="text/javascript"></script>