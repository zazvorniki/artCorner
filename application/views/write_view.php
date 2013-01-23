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
					<p>*note: to create a new paragraph press the return twice</p>
					<p class="textValid"><span id="radioVal" class="LV_validation_message LV_invalid" style="display: none;">Can't be empty!</span></p>
					
					<div class="textPos">
						<p><textarea name="body" id="body" ></textarea></p>
					</div>
					<p class="textValid"><span id="notThere" class="LV_validation_message LV_invalid" style="display: none;">Can't be empty!</span></p>
	
					<p class="subPos"><input type="submit" class="submit" value="Post" /></p>
					<span class="cancelPos"><?=anchor('blog/', 'cancel', array('class' => 'cancel'));?></span>
				</form><!--  end postForm  -->
			</div><!--  end writeBlog  -->
			<div class="sideIcons">
				<ul>
					<li><img src="<?=base_url();?>inc/img/tinymce/bold.png" alt="" /><span> - Bold your text</span></li>
					<li><img src="<?=base_url();?>inc/img/tinymce/italic.png" alt="" /><span> - Italicize your font</span></li>
					<li><img src="<?=base_url();?>inc/img/tinymce/underline.png" alt="" /><span> - Underline your font</span></li>
					<li><img src="<?=base_url();?>inc/img/tinymce/linethrough.png" alt="" /><span> - Put a line through your font</span></li>
					<li><img src="<?=base_url();?>inc/img/tinymce/leftalign.png" alt="" /><span> - Left align</span></li>
					<li><img src="<?=base_url();?>inc/img/tinymce/centered.png" alt="" /><span> - Center align</span></li>
					<li><img src="<?=base_url();?>inc/img/tinymce/justified.png" alt="" /><span> - Justified</span></li>
					<li><img src="<?=base_url();?>inc/img/tinymce/clean.png" alt="" /><span> - Clean up the code</span></li>
					<li><img src="<?=base_url();?>inc/img/tinymce/color.png" alt="" /><span> - Add color to your font</span></li>
					<li><img src="<?=base_url();?>inc/img/tinymce/spelling.png" alt="" /><span> - Check spelling</span></li>
					<li><img src="<?=base_url();?>inc/img/tinymce/undo.png" alt="" /><span> - Undo</span></li>
					<li><img src="<?=base_url();?>inc/img/tinymce/redo.png" alt="" /><span> - Redo</span></li>
					<li><img src="<?=base_url();?>inc/img/tinymce/link.png" alt="" /><span> - Create a link</span></li>
					<li><img src="<?=base_url();?>inc/img/tinymce/unlink.png" alt="" /><span> - Remove link</span></li>
					<li><img src="<?=base_url();?>inc/img/tinymce/picture.png" alt="" /><span> - Insert a picture</span></li>
				</ul>			
			</div><!--  end sideIcons  -->
			
			<div class="clear"></div>

<script src="<?php echo base_url();?>inc/js/blogVal.js" type="text/javascript"></script>
		