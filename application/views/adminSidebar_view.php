		<div class="ref">
			<h3>Resources</h3>
			<?foreach ($query->result() as $row):?> 
				<ul>
					<li>
					
					<span class="deleteCon"><?=anchor('admin/deleteLink/'.$row->id, 'delete', array('class' => 'delete'));?></span>
					
					
					<a href="<?=$row->resource?>"><?=$row->name?></a></li>
				</ul>
			<?endforeach;?>
		</div>
		<div class="clear"></div>
	</div>
</div>			