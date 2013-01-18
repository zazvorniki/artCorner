<!--  ==========	Body ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="blogContainer">
				<ul class="item">
				<?php foreach ($query->result() as $row): ?> 
					<li>
						<h3 class="bTitle"><?=$row->title?></h3>
						<p class="bDate"><?=date("F j, Y", $row->date)?></p>
						<p class="bPosted">Posted by: <?=$row->posted_by?></p>
						
						<div class="bBody">
						<?=$row->body?>
						</div>

						<p class="readMore"><?=anchor('blog/comments/'.$row->id, ' More->', array('class' => 'readMore'));?></p>
						
					</li>
				<?php endforeach;?>
				</ul>
			</div>			