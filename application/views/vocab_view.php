<!--  ========== blog post form ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="writeVocab">
				
				<?=form_open('admin/insertVocab', array('class' => 'postForm'));?>
					<?=form_hidden('data-key', 'newVocab')?>
					<h3>Add a Vocab Word!</h3>
										
					<p><label>Vocab Word:</label> <input type="text" id="title" name="title" class="resInput" autocomplete="off"/></p>
					<label>Definition:</label> 
					<div class="vocabText">
						<textarea type="text" id="body" name="body" class="resInput"></textarea>	
					</div>
								
					<p class="textValid"><span id="notThere" class="LV_validation_message LV_invalid" style="display: none;">Can't be empty!</span></p>
										
					<p class="subPos"><input type="submit" class="submit" value="Post Vocab" /></p>					
					<span class="cancelPos"><?=anchor('blog/', 'cancel', array('class' => 'cancel'));?></span>
				</form>
			</div>
			<div class="clear"></div>

<script src="<?=base_url();?>inc/js/vocabVal.js" type="text/javascript"></script>			
