<!--  ==========	Comments ==========  -->

			<h2>Comments</h2>
			<div class="comments">	
				<?php if($query->num_rows > 0): ?>
				<ul class="commentList">
					<?php foreach ($query->result() as $row): ?> 
							<li><span class="name"><?=$row->author?> said on <?=$row->date?></span><br><span class="body"><?=$row->body?></span><br><img src="<?php echo base_url();?>inc/img/line.png" alt="line" /></li>
					<?php endforeach;?>
				</ul>	
				<?php endif; ?>	
			</div>
				
	<!--<p class="commentJava">Turn on your javascript and you can post your own comments!</p>-->
	
	<div class="postingCom">
		<h3>Post a comment</h3>
		<?=form_open('blog/', array('class' => 'comForm'));?>
		<?=form_hidden('entry_id', $this->uri->segment(3));?>
		<p><label>Name:</label><input class="comInput" id="cAuthor" type="text" name="author"/></p>
		<p><label>Email:</label><input class="comInput" id="cEmail" type="text" name="email"/></p>
		<p><label>Date:</label><input type="text" class="comInput" name="date" value="<?print date("m/d/Y".' '.' '." g:i:s");?>" readonly/></p>
		<label>Comment:</label><textarea class="cBox" id="cBox" name="body" rows="4"></textarea>
		<input type="hidden" name="robot" value="yes" />
		<p><input type="submit" class="submit" value="Submit Comment" /></p>
		</form>
	</div>
</div>


