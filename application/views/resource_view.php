<!--  ========== blog post form ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="writeBlog">
				
				<?=form_open('admin/insertResource', array('class' => 'postForm'));?>
					<?=form_hidden('data-key', 'newRe')?>
					<h3>Add a Resource!</h3>
					<input class="postInput" id="date" type="hidden" class="date" name="date" value="<?print date("m/d/Y".' '.' '." g:i:s");?>" autocomplete="off"/>
					
					<p><label>Resource:</label> <input type="text" id="resource" value="" name="resource" class="resInput" autocomplete="off"/></p>
					
								
					<p><label>Title:</label> <input type="text" id="name" name="name" class="resInput" autocomplete="off"/></p>
					
					<p>
						<label>Category:</label>
						<span>Project<input type="radio" name="category" value="project"></span>
						
						<span>Event<input type="radio" name="category" value="event"></span>
					</p>
				
					<p class="subPos"><input type="submit" class="submit" value="Post" /></p>
					<span class="cancelPos"><?=anchor('blog/', 'cancel', array('class' => 'cancel'));?></span>
				</form>
			</div>
			<div class="clear"></div>

<script src="<?php echo base_url();?>inc/js/reVal.js" type="text/javascript"></script>