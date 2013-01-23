<!--  ==========	Body ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
		<a class="backBtn" onclick="history.go(-1);"> ≤- back</a>
			
			<div class="innerBlog">
				<?foreach ($query->result() as $row): ?> 
						<span class="adminControls">
						
						<span class="editCon"><?=anchor('admin/edit/'.$row->id, 'edit', array('class' => 'edit'));?></span>
						
						<span class="deleteCon"><?=anchor('admin/deleteWarning/'.$row->id, 'delete', array('class' => 'delete'));?></span>
						
						</span>
						
						<p class="bTitle"><?=$row->title?></p>
						<p class="bDate">Posted by, <?=$row->posted_by?> on <?=date("F j, Y", $row->date)?></p>						<p class="bBody"><?=$row->body?></p>
				<?endforeach;?>
			</div><!--  end innerBlog  -->
				