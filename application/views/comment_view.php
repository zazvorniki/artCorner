<!--  ==========	Comments ==========  -->
<div class="commentPage">
			<h2>Comments</h2>
			<div class="comments">	
				<?php if($query->num_rows > 0): ?>
				<ul class="commentList">
					<?php foreach ($query->result() as $row): ?> 
							<li><p class="name"><?=$row->author?><?php if($row->showEmail == "show"){echo ' ('.$row->email.') ' ;}?> said on <?=date("F j, Y", $row->date)?></p>
							
							<span class="body"><?=$row->body?></span><br>
	
							<img class="line" src="<?php echo base_url();?>inc/img/line.png" alt="line" /></li>
					<?php endforeach;?>
				</ul>	
				<?php endif; ?>	
			</div>
				
	<p class="commentJava">Turn on your javascript and you can post your own comments!</p>
	
	<div class="postingCom">
		<h3>Post a comment</h3>
		<?=form_open('blog/writeComment', array('class' => 'comForm'));?>
		<?=form_hidden('entry_id', $this->uri->segment(3));?>
		<?=form_hidden('data-key', 'newComment')?>
		<p><label>Name:</label><input class="comInput" id="cAuthor" type="text" name="author" autocomplete="off"/></p>
		<p><label>Email:</label><input class="comInput" id="cEmail" type="text" name="email" autocomplete="off"/></p>
		<p style="padding-bottom: 1em;"><span>Show your email</span><input name="showEmail" checked="checked" value="show" type="checkbox"></p>
		<label>Comment:</label><textarea class="cBox" id="cBox" name="body" rows="4"></textarea>
		<p style="padding-top: 1em;">*note: to create a new paragraph press the return twice</p>
		<input type="hidden" name="robot" value="yes" autocomplete="off"/>
		<p class="subPos"><input type="submit" class="submit" value="Submit Comment" /></p>
		</form>
	</div>
</div>

</div>
<script src="<?php echo base_url();?>inc/js/comment.js" type="text/javascript"></script>


