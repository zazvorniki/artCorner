<!--  ========== blog post form ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="writeBlog">
				<?php foreach ($query->result() as $row): ?> 
					<?=form_open('admin/', array('class' => 'edit'));?>
					<h3>Write a new post!</h3>
					
					<p><label>Poster:</label> <input class="postInput" id="poster" type="text" value="Mrs. Sears" name="posted_by" readonly/></p>
					
					<p><label>Date:</label> <input class="postInput" id="date" type="text" class="date" name="date" value="<?=$row->date?>" readonly/></p>
					
					<p><label>Title:</label> <input type="text" id="title" class="postInput" value="<?=$row->title?>" name="title"/></p>
					
					<p><label>Body:</label><textarea name="body" id="body" > <?=$row->body?></textarea></p>
					
					<p class="subPos"><input type="submit" class="submit" value="Post" /></p>
					</form>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</div>	


<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>

<script src="<?php echo base_url();?>inc/js/blogVal.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>inc/js/livevalidation_standalone.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>inc/js/tiny_mce.js" type="text/javascript"></script>
		