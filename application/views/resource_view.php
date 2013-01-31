<!--  ========== Resource Write view ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="clearfix">
				<div class="writeBlog resourses">				
					<?=form_open('admin/insertResource', array('class' => 'postForm'));?>
						<?=form_hidden('data-key', 'newRe')?>
						<h3>Add a Resource!</h3>
						<p><label>Resource:</label> <input type="text" id="resource" value="" name="resource" class="resInput" autocomplete="off"/></p>
						<p><label>Title:</label> <input type="text" id="name" name="name" class="resInput" autocomplete="off"/></p>
						<p>
							<label>Category:</label>
							<span>Project<input type="radio" name="category" value="project"></span>
							<span>Event<input type="radio" name="category" value="event"></span>
						</p>
						<p class="textValid"><span id="radioVal" class="LV_validation_message LV_invalid">Can't be empty!</span></p>
						<p class="subPos"><input type="submit" class="submit" value="Post" /></p>
						<span class="cancelPos"><?=anchor('blog/', 'cancel', array('class' => 'cancel'));?></span>
					</form><!--  end postForm  -->
				</div><!--  end writeBlog  -->
				<div class="reasons">
					<h4>Have a cool link that you want to share with your students? Well, this is the place to put it!</h4>
					<ul>
						<li><img src="<?=base_url();?>inc/img/check.png" alt="check mark" />make sure you enter a valid web address, including the http://</li>
						<li><img src="<?=base_url();?>inc/img/check.png" alt="check mark" />tell us what you want to title it</li>
						<li><img src="<?=base_url();?>inc/img/check.png" alt="check mark" />be sure to select if it belogs to a project or event</li>
					</ul>
				</div>
			</div><!-- clearfix -->	
		<div class="clear"></div>			
<script src="<?php echo base_url();?>inc/js/reVal.min.js" type="text/javascript"></script>