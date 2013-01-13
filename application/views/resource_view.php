<!--  ========== blog post form ==========  -->

<div class="container">
	<div class="content">
		<div class="writeBlog">
			
			<?=form_open('admin/insertResource', array('class' => 'postForm'));?>
			<h3>Add a Resource!</h3>
			
			<p><label>Resource:</label> <input type="text" id="resource" value="" name="resource" class="resInput" /></p>
			
						
			<p><label>Title:</label> <input type="text" id="name" name="name" class="resInput"/></p>
			
			<p>
				<label>Category</label>
				<select id="category">
					<option value = "">Select one</option>
					<option value = "project">project</option>
					<option value = "event">event</option>
				</select>
			</p>
		
			<p class="subPos"><input type="submit" class="submit" value="Post" /></p>
			</form>
		</div>
	</div>
</div>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>

<script src="<?php echo base_url();?>inc/js/reVal.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>inc/js/livevalidation_standalone.js" type="text/javascript"></script>
		