<!--  ==========	Body ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="blogContainer">
				<ul class="item">
				<?php foreach ($query->result() as $row): ?> 
					<li>					
						<p class="bTitle"><?=anchor('blog/comments/'.$row->id, $row->title);?></p>
					
						<p class="bDate">Posted by, <?=$row->posted_by?> on <?=date("F j, Y", $row->date)?></p>
						
						<div class="bBody">
						<?=$row->body?>
						</div>

						<p class="readMore"><?=anchor('blog/comments/'.$row->id, ' More->', array('class' => 'readMore'));?></p>
						
					</li>
				<?php endforeach;?>
				</ul>
			</div>			