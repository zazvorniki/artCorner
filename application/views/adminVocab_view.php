<!--  ==========	Admin Vocab ==========  -->
<ul>
	<? if(count($query) > 0): ?>
		<?foreach($query as $row) :?>
			<li><span class="deleteCon"><?=anchor('admin/deleteVocab/'.$row->id, 'delete', array('class' => 'delete'));?></span><p class="vocabBold"><?=$row->title?></p> <span> - <?=$row->body?></span></li>
		<? endforeach;?>
	<? else: ?>
		<li><span class="vocabError">Sorry, it looks like there are no words for this letter at this time.</span></li>
	<? endif; ?> 
</ul>
</div><!--  end vocabPage  -->