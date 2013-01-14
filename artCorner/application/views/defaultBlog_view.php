<!--  ==========	Body ==========  -->

<div class="container">
	<div class="content">
		<div class="blogContainer">
			<ul class="item">
			<?php foreach ($query->result() as $row): ?> 
				<li>
					<h3 class="bTitle"><?=$row->title?></h3>
					<p class="bDate"><?=$row->date?></p>
					<p class="bPosted">Posted by: <?=$row->posted_by?></p>
					<span class="bBody"><?=$row->body?></span>
					<p class="readMore"><?=anchor('blog/comments/'.$row->id, ' More->', array('class' => 'readMore'));?></p>
					<hr>
				</li>
			<?php endforeach;?>
			</ul>
		</div>	