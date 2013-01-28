<!--  ==========	Admin Sidebar ==========  -->
<div class="ref">
	<h3>Resources</h3>
	<?foreach($query as $row) :?>	
		<ul>
			<li><span class="deleteCon"><?=anchor('admin/deleteLink/'.$row->id, 'delete', array('class' => 'delete'));?></span><a href="<?=$row->resource?>"><?=$row->name?></a></li>
		</ul>
	<?endforeach;?>
</div><!--  end ref  -->
<div class="clear"></div>
