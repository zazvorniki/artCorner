<!--  ==========	Comments ==========  -->
<div class="commentPage">
			<p class="bold">Comments</p>
			<div class="comments">
				<ul class="commentList">
					<? if(isset($query)) : foreach($query as $row) :?>	
						<li><p class="name"><?=$row->author?><?if($row->showEmail == "show"){echo ' ('.$row->email.') ' ;}?></p>
						<p class="name"><?=date("F j, Y", $row->date)?></p>
						<span class="body"><?=$row->body?></span><br>
						<img class="line" src="<?=base_url();?>inc/img/line.png" alt="line" /></li>	
					<? endforeach;?>
				</ul>
					<? endif;?>	
			</div><!--  end comments  -->
	<p class="commentJava">Turn on your javascript and you can post your own comments!</p>
	<div class="postingCom">
		<p class="bold">Post a comment</p>
		<?=form_open('blog/writeComment', array('class' => 'comForm'));?>
			<?=form_hidden('entry_id', $this->uri->segment(3));?>
			<?=form_hidden('data-key', 'newComment')?>
			<p><label>Name:</label><input class="comInput" id="cAuthor" type="text" name="author" autocomplete="off"/></p>
			<p><label>Email:</label><input class="comInput" id="cEmail" type="text" name="email" autocomplete="off"/></p>
			<div class="checkbox">
				<span style="padding-right: 1em;">Show your email</span>
				<div class="square">
					<input type="checkbox" value="show" id="square" name="showEmail"  checked="checked" />
					<label for="square"></label>
				</div>
			</div>
			<label class="com">Comment:</label><textarea class="cBox" id="cBox" name="body" rows="4"></textarea>
			<p class="textValid"><span id="tooLong" class="LV_validation_message LV_invalid" style="display: none;">Too Long!</span><span id="notThere" class="LV_validation_message LV_invalid" style="display: none;">Can't be empty!</span></p>
			<p style="padding-top: .5em;"><input type="submit" class="submit" value="Submit Comment" /></p>
		</form><!--  end comForm  -->		
	</div><!--  end postingComment  -->
</div><!--  end commentPage  -->
<script src="<?=base_url();?>inc/js/comment.min.js" type="text/javascript"></script>