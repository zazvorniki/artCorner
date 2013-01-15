<!--  ==========	Body ==========  -->

<div class="container">
	<div class="content">
	<a class="backBtn" onclick="history.go(-1);"> ≤- back</a>
		
		<div class="innerBlog">
			<?php foreach ($query->result() as $row): ?> 
					<h3 class="bTitle"><?=$row->title?></h3>
					<p class="bDate"><?=$row->date?></p>
					<p class="bPosted">Posted by: <?=$row->posted_by?></p>
					<p class="bBody"><?=$row->body?>
					<hr>
			<?php endforeach;?>
		</div>	