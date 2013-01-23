<!--  ==========	Body ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="vocabPage">
				<h2>Vocabulary</h2>
				<?foreach ($query->result() as $row): ?> 
					<ul>
						<li><h3><?=$row->title?></h3> - <?=$row->body?></li>
					</ul>
				<?endforeach;?>
			</div><!--  end vocabPage  -->
