<!--  ==========	Body ==========  -->

<div class="container">
	<div class="content">
		<div class="blogContainer">
			<?php foreach ($query->result() as $row): ?> 
				<h3 class="bTitle"><?=$row->title?></h3>
				<p class="bDate"><?=$row->date?></p>
				<p class="bPosted">Posted by: <?=$row->posted_by?></p>
				<p class="bBody"><?=$row->body?></p>
				<p><?=anchor('blog/comments/'.$row->id, 'read more', array('class' => 'readMore'));?></p>
				<hr>
			<?php endforeach;?>
		</div>	