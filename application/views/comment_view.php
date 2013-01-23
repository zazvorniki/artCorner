<!--  ==========	Comments ==========  -->
<div class="commentPage">
			<h2>Comments</h2>
			<div class="comments">	
				<?if($query->num_rows > 0):?>
				<ul class="commentList">
					<?foreach ($query->result() as $row):?> 
							<li><p class="name"><?=$row->author?><?if($row->showEmail == "show"){echo ' ('.$row->email.') ' ;}?></p>
							
							<p class="name"><?=date("F j, Y", $row->date)?></p>
							
							<span class="body"><?=$row->body?></span><br>
	
							<img class="line" src="<?=base_url();?>inc/img/line.png" alt="line" /></li>
					<?endforeach;?>
				</ul>	<!--  end commentList  -->
				<?endif;?>	
			</div><!--  end comments  -->
				
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
			<p class="textValid"><span id="tooLong" class="LV_validation_message LV_invalid" style="display: none;">Too Long!</span><span id="notThere" class="LV_validation_message LV_invalid" style="display: none;">Can't be empty!</span></p>
			<p style="padding-top: 1em;">*note: to create a new paragraph press the return twice</p>
			<input type="hidden" name="robot" value="yes"/>
			<p style="padding-top: 1em;"><input type="submit" class="submit" value="Submit Comment" /></p>
		</form><!--  end comForm  -->
	</div><!--  end postingComment  -->
</div><!--  end commentPage  -->

<script src="<?=base_url();?>inc/js/comment.js" type="text/javascript"></script>


