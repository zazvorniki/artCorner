<!--  ==========	Default Blog View ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
			<div class="blogContainer clearfix">
				<ul class="item">
     				 <?foreach($query as $row) :?>	
					<li>					
						<p class="bTitle"><?=anchor('blog/comments/'.$row->id, $row->title);?></p>
						<p class="bDate">Posted by, <?=$row->posted_by?> on <?=date("F j, Y", $row->date)?></p>
						<div class="bBody">
						<?=$row->body?>
						</div><!--  end bBody  -->
						<p class="readMore"><?=anchor('blog/comments/'.$row->id, ' More->', array('class' => 'readMore'));?></p>
					</li>
				<?endforeach;?>
				</ul><!--  end item  -->
			</div><!--  end blog container  -->			