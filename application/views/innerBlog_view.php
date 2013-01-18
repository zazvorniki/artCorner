<!--  ==========	Body ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
		<a class="backBtn" onclick="history.go(-1);"> ≤- back</a>
			
			<div class="innerBlog">
				<?php foreach ($query->result() as $row): ?> 
						<h3 class="bTitle"><?=$row->title?></h3>
						
						<div class="fb-like" data-href="<?php $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; echo $url;?>" data-send="false" data-width="300" data-show-faces="true" data-layout="button_count" data-font="arial"></div>
												
						<p class="bDate">Posted by, <?=$row->posted_by?> on <?=date("F j, Y", $row->date)?></p>
							
						<p class="bBody"><?=$row->body?></p>
						
				<?php endforeach;?>
			</div>
				