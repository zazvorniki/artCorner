<!--  ========== blog post form ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="writeBlog">
				
				<?=form_open('admin/insertPost', array('class' => 'postForm'));?>
				<?=form_hidden('data-key', 'newPost')?>
				<h3>Write a new post!</h3>
				
				<p><label>Poster:</label> <input class="postInput" id="poster" type="text" value="Ms. Sears" name="posted_by" readonly autocomplete="off"/></p>
				
				<p><label>Title:</label> <input type="text" id="title" class="postInput" name="title" autocomplete="off"/></p>
				
				<p class="cat">
					<label>Category:</label>
					<span>Project<input type="radio" name="category" value="project"></span>
					
					<span>Event<input type="radio" name="category" value="event"></span>
				</p>
				<div class="textPos">
					<p><textarea name="body" id="body" ></textarea></p>
				</div>
				
				
				<p class="subPos"><input type="submit" class="submit" value="Post" /></p>
				</form>
			</div>
		</div>
	</div>
</div>	
<script src="<?php echo base_url();?>inc/js/blogVal.js" type="text/javascript"></script>
		