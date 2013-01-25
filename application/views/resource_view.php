<!--  ========== blog post form ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="writeBlog">
				
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
					<p class="textValid"><span id="radioVal" class="LV_validation_message LV_invalid" style="display: none;">Can't be empty!</span></p>
				
					<p class="subPos"><input type="submit" class="submit" value="Post" /></p>
					<span class="cancelPos"><?=anchor('blog/', 'cancel', array('class' => 'cancel'));?></span>
				</form><!--  end postForm  -->
			</div><!--  end writeBlog  -->
			<div class="clear"></div>

<script src="<?php echo base_url();?>inc/js/reVal.js" type="text/javascript"></script>