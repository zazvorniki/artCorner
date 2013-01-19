<!--  ==========	Comments ==========  -->
<div class="commentPage">
			<h2>Comments</h2>
			<div class="comments">	
				<?php if($query->num_rows > 0): ?>
				<ul class="commentList">
					<?php foreach ($query->result() as $row): ?> 
							<li><span class="name"><?=$row->author?> said on <?=date("F j, Y", $row->date)?></span><br><span class="body"><?=$row->body?></span><br><img class="line" src="<?php echo base_url();?>inc/img/line.png" alt="line" /></li>
					<?php endforeach;?>
				</ul>	
				<?php endif; ?>	
			</div>
				
	<p class="commentJava">Turn on your javascript and you can post your own comments!</p>
	
	<div class="postingCom">
		<h3>Post a comment</h3>
		<?=form_open('blog/writeComment', array('class' => 'comForm'));?>
		<?=form_hidden('entry_id', $this->uri->segment(3));?>
		<p><label>Name:</label><input class="comInput" id="cAuthor" type="text" name="author" autocomplete="off"/></p>
		<p><label>Email:</label><input class="comInput" id="cEmail" type="text" name="email" autocomplete="off"/></p>
		<label>Comment:</label><textarea class="cBox" id="cBox" name="body" rows="4"></textarea>
		<input type="hidden" name="robot" value="yes" autocomplete="off"/>
		<p><input type="submit" class="submit" value="Submit Comment" /></p>
		</form>
	</div>
</div>

</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>

<script src="<?php echo base_url();?>inc/js/comment.js" type="text/javascript"></script>


