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
					Message:
					<div class="messageCon">
						<p><textarea name="message" ></textarea></p>
					</div><!--  end messageContent  -->	
						
					<p class="textValid"><span id="notThere" class="LV_validation_message LV_invalid" style="display: none;">Can't be empty!</span></p>	
						
					<input type="submit" class="submit contactSub" value="Email" />
				</form><!--  end con  -->
		</div><!--  end contactForm  -->
			<div class="reasons">
				<h4>Have a question you want to ask Ms. Sears the art teacher behind this blog? Then go right ahead!</h4>
				<p>You can ask her about:</p>
				<ul>
					<li><img src="<?=base_url();?>inc/img/check.png" alt="check mark" />any artiest new or old</li>
					<li><img src="<?=base_url();?>inc/img/check.png" alt="check mark" />anything about her assignments</li>
					<li><img src="<?= base_url();?>inc/img/check.png" alt="check mark" />or if you have a question about your grade</li>
				</ul>
			</div><!--  end reasons  -->
			<div class="clear"></div>
			
<script src="<?=base_url();?>inc/js/contactVal.js" type="text/javascript"></script>