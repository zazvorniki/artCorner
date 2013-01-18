<!--  ========== blog post form ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="writeBlog">
				
				<?=form_open('admin/insertPost', array('class' => 'postForm'));?>
				<h3>Write a new post!</h3>
				
				<p><label>Poster:</label> <input class="postInput" id="poster" type="text" value="Mrs. Sears" name="posted_by" readonly/></p>
				
				<p><label>Title:</label> <input type="text" id="title" class="postInput" name="title"/></p>
				
				<p><label>Body:</label><textarea name="body" id="body" ></textarea></p>
				
				<p class="cat">
					<label>Category:</label>
					<span>Project<input type="radio" name="category" value="project"></span>
					
					<span>Event<input type="radio" name="category" value="event"></span>
				</p>
				
				<p class="subPos"><input type="submit" class="submit" value="Post" /></p>
				</form>
			</div>
		</div>
	</div>
</div>	


<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>

<script src="<?php echo base_url();?>inc/js/blogVal.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>inc/js/livevalidation_standalone.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>inc/js/tiny_mce.js" type="text/javascript"></script>
		