<!--  ==========	Body ==========  -->
<div class="binder">
	<div class="container">
		<div class="content">
		<a class="backBtn" onclick="history.go(-1);"> ≤- back</a>
			
			<div class="innerBlog">
				<?php foreach ($query->result() as $row): ?> 
						<p class="bTitle"><?=$row->title?></p>
						
						
						
						<!--<fb:like href="http://plantationkeyartcorner.com" send="false" layout="button_count" width="450" show_faces="true" font="arial"></fb:like>-->
									
						<p class="bDate">Posted by, <?=$row->posted_by?> on <?=date("F j, Y", $row->date)?></p>
							
						<p class="bBody"><?=$row->body?></p>
						
				<?php endforeach;?>
			</div>
				
<!--				<?php $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; echo $url;?>-->