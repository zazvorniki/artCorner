<!--  ========== blog post form ==========  -->

<div class="container">
	<div class="content">
		<div class="writeBlog">
			
			<?=form_open('admin/insertPost', array('class' => 'postForm'));?>
			<h3>Write a new post!</h3>
			
			<p><label>Poster:</label> <input class="postInput" type="text" value="Mrs. Sears" name="posted_by" readonly/></p>
			
			<p><label>Date:</label> <input class="postInput" type="text" class="date" name="date" value="<?print date("m/d/Y".' '.' '." g:i:s");?>" readonly/></p>
			
			<p><label>Title:</label> <input type="text" class="postInput" name="title"/></p>
			
			<p><label>Body:</label><textarea name="body" ></textarea></p>
			
			<p><label>Resources:</label><textarea name="resources"></textarea></p>
			
			<span>Project<input type="radio" name="catagory" value="project"></span>
			
			<span>Event<input type="radio" name="catagory" value="event"></span>
			
			<p class="subPos"><input type="submit" class="submit" value="Post" /></p>
			</form>
		</div>
	</div>
</div>		