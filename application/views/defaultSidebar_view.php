		<div class="ref">
			<h3>Resources</h3>
			<?foreach ($query->result() as $row): ?> 
				<ul>
					<li><a href="<?=$row->resource?>"><?=$row->name?></a></li>
				</ul>
			<?endforeach;?>
		</div><!--  end ref  -->
			