<!--  ==========	Body ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
		<a class="backBtn" onclick="history.go(-1);"> ≤- back</a>
			
			<div class="innerBlog">
				<?php foreach ($query->result() as $row): ?> 
						<span class="adminControls">
						
						<span class="editCon"><?=anchor('admin/edit/'.$row->id, 'edit', array('class' => 'edit'));?></span>
						
						<span class="deleteCon"><?=anchor('blog/delete/'.$row->id, 'delete', array('class' => 'delete'));?></span>
						
						</span>
						
						<h3 class="bTitle"><?=$row->title?></h3>
						<p class="bDate"><?=$row->date?></p>
						<p class="bPosted">Posted by: <?=$row->posted_by?></p>
						<p class="bBody"><?=$row->body?></p>
						<hr>
				<?php endforeach;?>
			</div>
				