<!--  ==========	Body ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="vocabPage">
				<h2>Vocabulary</h2>
				<ul>
					<?foreach ($query->result() as $row): ?> 
						<li><h3><?=$row->title?></h3> <span> - <?=$row->body?></span></li>
					<?endforeach;?>
				</ul>
			</div><!--  end vocabPage  -->
