<!--  ==========	Body ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="vocabPage">
				<h2>Vocabulary <?if($this->uri->segment(3)){echo ' - '.$this->uri->segment(3);};?> </h2>
					<ul id="apl">
						<li><?=anchor('blog/vocab/A', 'A', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/B', 'B', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/C', 'C', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/D', 'D', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/E', 'E', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/F', 'F', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/G', 'G', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/H', 'H', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/I', 'I', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/J', 'J', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/K', 'K', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/L', 'L', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/M', 'M', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/N', 'N', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/O', 'O', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/P', 'P', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/Q', 'Q', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/R', 'R', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/S', 'S', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/T', 'T', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/U', 'U', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/V', 'V', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/W', 'W', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/X', 'X', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/Y', 'Y', array('class' => 'letters'));?></li>
						<li><?=anchor('blog/vocab/Z', 'Z', array('class' => 'letters'));?></li>
					</ul>
				<ul>
     					 <? if(count($query) > 0): ?>
     						<?foreach($query as $row) :?>
     							<li><h3><?=$row->title?></h3> <span> - <?=$row->body?></span></li>
     						<? endforeach;?>
     					 <? else: ?>
     						<li><span class="vocabError">Sorry, it looks like there are no words for this letter at this time.</span></li>
     					 <? endif; ?> 							
				</ul>
			</div><!--  end vocabPage  -->
