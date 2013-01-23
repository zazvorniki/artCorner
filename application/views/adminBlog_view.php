<!--  ==========	Body ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="blogContainer">
				<ul class="item">
				<?foreach ($query->result() as $row):?> 
					<li>
						
						<p class="bTitle"><?=anchor('blog/comments/'.$row->id, $row->title);?></p>
						
						
						<span class="adminControls">
						
						<span class="editCon"><?=anchor('admin/edit/'.$row->id, 'edit', array('class' => 'edit'));?></span>
						
						<span class="deleteCon"><?=anchor('admin/deleteWarning/'.$row->id, 'delete', array('class' => 'delete'));?></span>
						
						</span>
						
						<p class="bDate">Posted by, <?=$row->posted_by?> on <?=date("F j, Y", $row->date)?></p>
						
						<div class="bBody">
						<?=$row->body?>
						</div>

						<p class="readMore"><?=anchor('blog/comments/'.$row->id, ' More->', array('class' => 'readMore'));?></p>
					</li>
				<?endforeach;?>
				</ul><!--  end item  -->
			</div><!--  end blog container  -->	