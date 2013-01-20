<!--  ========== blog post form ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="writeBlog">
				<?php foreach ($query->result() as $row): ?> 
					<?=form_open('admin/editBlogpost', array('class' => 'editForm'));?>
					<?=form_hidden('id', $this->uri->segment(3));?>
					
					<h3>Write a new post!</h3>
					
					<p><label>Poster:</label> <input class="postInput" id="poster" type="text" value="Mrs. Sears" name="posted_by" readonly autocomplete="off"/></p>

					<p><label>Title:</label> <input type="text" id="title" class="postInput" value="<?=$row->title?>" name="title" autocomplete="off"/></p>
					
					<div class="textPos">
					<p><textarea name="body" id="body" > <?=$row->body?></textarea></p>
					</div>
					
					<p class="subPos"><input type="submit" class="submit" value="Post" autocomplete="off"/></p>
					</form>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</div>	
<script src="<?php echo base_url();?>inc/js/blogVal.js" type="text/javascript"></script>

		