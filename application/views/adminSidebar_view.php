<!--  ==========	Admin Sidebar ==========  -->
<div class="ref">
	<h3>Resources</h3>
	<ul>
		<?foreach($query as $row) :?>	
			<li><span class="deleteCon"><?=anchor('admin/deleteLink/'.$row->id, 'delete', array('class' => 'delete'));?></span><a href="<?=$row->resource?>"><?=$row->name?></a></li>
		<?endforeach;?>
	</ul>
</div><!--  end ref  -->
<div class="clear"></div>
