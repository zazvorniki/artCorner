<!--  ==========	Default Vocab ==========  -->
 <? if(count($query) > 0): ?>
	<?foreach($query as $row) :?>
		<li><p class="vocabBold"><?=$row->title?></p> <span> - <?=$row->body?></span></li>
	<? endforeach;?>
 <? else: ?>
	<li><span class="vocabError">Sorry, it looks like there are no words for this letter at this time.</span></li>
 <? endif; ?> 							
</ul>
</div><!--  end vocabPage  -->
