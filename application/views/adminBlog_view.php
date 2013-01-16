<!--  ==========	Body ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="blogContainer">
				<ul class="item">
				<?php foreach ($query->result() as $row): ?> 
					<li>
						
						<h3 class="bTitle"><?=$row->title?></h3>
						
						
						<span class="adminControls">
						
						<span class="editCon"><?=anchor('admin/edit/'.$row->id, 'edit', array('class' => 'edit'));?></span>
						
						<span class="deleteCon"><?=anchor('blog/delete/'.$row->id, 'delete', array('class' => 'delete'));?></span>
						
						</span>
						
						<p class="bDate"><?=$row->date?></p>
						<p class="bPosted">Posted by: <?=$row->posted_by?></p>
						
						<div class="bBody">
						<?=$row->body?>
						</div>

						<p class="readMore"><?=anchor('blog/comments/'.$row->id, ' More->', array('class' => 'readMore'));?></p>
						<hr>
					</li>
				<?php endforeach;?>
				</ul>
			</div>	
		</div>