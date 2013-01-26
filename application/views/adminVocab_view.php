<!--  ==========	Body ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="vocabPage">
				<h2>Vocabulary</h2>
				<ul id="apl">
					<li><?=anchor('blog/vocab/a', 'A', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/b', 'B', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/c', 'C', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/d', 'D', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/e', 'E', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/f', 'F', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/g', 'G', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/h', 'H', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/i', 'I', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/j', 'J', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/k', 'K', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/l', 'L', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/m', 'M', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/n', 'N', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/o', 'O', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/p', 'P', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/q', 'Q', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/r', 'R', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/s', 'S', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/t', 'T', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/u', 'U', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/v', 'V', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/W', 'W', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/X', 'X', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/y', 'Y', array('class' => 'letters'));?></li>
					<li><?=anchor('blog/vocab/z', 'Z', array('class' => 'letters'));?></li>
				</ul>
					<ul>
						<? if(count($query) > 0): ?>
							<?foreach($query as $row) :?>
								<li><span class="deleteCon"><?=anchor('admin/deleteVocab/'.$row->id, 'delete', array('class' => 'delete'));?></span><h3><?=$row->title?></h3> <span> - <?=$row->body?></span></li>
							<? endforeach;?>
						<? else: ?>
							<li><span class="vocabError">Sorry, it looks like there are no words for this letter at this time.</span></li>
						<? endif; ?> 
					</ul>
			</div><!--  end vocabPage  -->