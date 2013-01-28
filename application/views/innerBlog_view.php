<!--  ==========	Inner Blog View ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
		<a class="backBtn" onclick="history.go(-1);"> ≤- back</a>
			<div class="innerBlog">
				<?foreach($query as $row) :?>	
					<p class="bTitle"><?=$row->title?></p>
					<p class="bDate">Posted by, <?=$row->posted_by?> on <?=date("F j, Y", $row->date)?></p>		
					<div class="fb-like" style="margin-bottom: 1em;" data-href="<?php $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; echo $url;?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true" data-font="arial"></div>
					<?=$row->body?>
				<?endforeach;?>
			</div><!--  end innerBlog  -->
				