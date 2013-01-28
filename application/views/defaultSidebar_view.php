<!--  ==========	Default Sidebar ==========  -->
<div class="ref">
	<h3>Resources</h3>
	<ul>
		<?foreach($query as $row) :?>	
			<li><a href="<?=$row->resource?>"><?=$row->name?></a></li>
		<?endforeach;?>
	</ul>
</div><!--  end ref  -->
<div class="clear"></div>	
			