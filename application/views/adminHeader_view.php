<!--  ==========	Admin Header ==========  -->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Plantation Key Art Corner</title>
<!--  ==========	Meta Tags ==========  -->
	<meta charset="utf-8">
	<meta name="description" content="Mrs. Sears, the art teacher at Plantation key school created this blog to keep her students and their parents informed on the projects and events going on in the art room.">
	<meta name="robots" content="all">
<!--	<meta name="googlebot" content="all">-->
	<meta name="author" content="Jessica Sears">
	<meta name="format-detection" content="telephone=no">
<!--	<meta name="viewport" content="initial-scale=.5; maximum-scale=.5">-->
	<meta name="keywords" content="art room, plantation key, plantation key school, school, florida school, the keys, florida keys, Mrs. Sears, Sears">
	
<!--  ==========	Style Sheets		==========	-->
	<link rel="stylesheet" href="<?=base_url();?>inc/css/screen.css"/>
	<link rel="stylesheet" href="<?=base_url();?>inc/css/flexipage.css" />
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
	
<!--  ==========	Header and navigation ==========  -->

</head>
<body>
	<div id="header">
		<ul class="adminInfo">
			<li><?foreach ($query->result() as $row): ?> <label>Hello,  <?=$row->firstName?></label><?php endforeach;?></li>
			<li><?=anchor('admin/writeBlog/', 'Write a Blog');?></li>
			<li><?=anchor('admin/writeResource/', 'Enter a Resource');?></li>
			<li><?=anchor('admin/writeVocab/', 'New Vocab Word');?></li>
			<li><?=anchor('admin/logout', 'Logout');?></li>
		</ul><!--  end adminInfo  -->
		<noscript class="noJava">
		<link rel="stylesheet" href="<?=base_url();?>inc/css/noJava.css" type="text/css" media="screen"/>
		<h3>Please turn your javascript on to take advantage of all the features of this site!</h3></noscript>		
		<div class="headerCon" style="padding: 1em 1.5em 6em 1.5em">
			<div id="nav">
				<ul>
					<li><h1 class="logo"><?=anchor('blog/', 'Plantation Key Art Corner');?></h1></li>
					<li class="link"><?=anchor('https://gradebook.keysschools.com/pinnacle/piv/Logon.aspx', 'Pinnacle')?></li>
					<li class="link"><?=anchor('blog/vocab', 'Vocab');?></li>
					<li class="link"><?=anchor('blog/events', 'Events');?></li>
					<li class="link"><?=anchor('blog/projects', 'Projects');?></li>
				</ul>
			</div><!--  end nav  -->
		</div><!--  end headerCon  -->	
	</div><!--  end header  -->