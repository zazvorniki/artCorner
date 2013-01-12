<!DOCTYPE html>
<html lang="en">
<head>
<title>Plantation Key Art Corner</title>
<!--  ==========	Meta Tags ==========  -->
	<meta charset="utf-8">
	<meta name="description" content="Mrs. Sears, the art teacher at Plantation key school created this blog to keep her students and their parents informed on the projects and events going on in the art room.">
	<meta name="application-name" content="">
	<meta name="robots" content="all">
<!--	<meta name="googlebot" content="all">-->
	<meta name="author" content="Jessica Sears">
    <meta name="copyright" content="Jessica Sears">
	<meta name="format-detection" content="telephone=no">
    <meta name="handheldfriendly">
<!--	<meta name="viewport" content="initial-scale=.5; maximum-scale=.5">-->
	<meta name="keywords" content="art room, plantation key, plantation key school, school, florida school, the keys, florida keys, Mrs. Sears, Sears">
	
<!--  ==========	Style Sheets		==========	-->
	<link rel="stylesheet" href="<?php echo base_url();?>inc/css/screen.css"/>
	
<!--  ==========	Header and navigation ==========  -->

</head>

<body>
	<header>
	
		<ul class="adminInfo">
			<li><?php foreach ($query->result() as $row): ?> 
				<label>Hello,  <?=$row->firstName?></label>
				<?php endforeach;?>
			</li>
			<li><?=anchor('admin/writeBlog/', 'Write a Blog');?></li>
			<li><?=anchor('admin/logout', 'Logout');?></li>
		</ul>	
		
		<div class="headerCon" style="padding: 0 0 1em 0;">
		
			<nav>
				<ul>
					<li><h1 class="logo"><?=anchor('blog/', 'Plantation Key Art Corner');?></h1></li>
					</li>
					<li class="link"><?=anchor('blog/', 'Events');?></li>
					<li class="link"><?=anchor('blog/', 'Projects');?>
				</ul>

			</nav>
		</div>	
	</header>
		

