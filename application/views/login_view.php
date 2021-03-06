<!--  ==========	Login Page ==========  -->
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
	<meta name="format-detection" content="telephone=no">
<!--	<meta name="viewport" content="initial-scale=.5; maximum-scale=.5">-->
	<meta name="keywords" content="art room, plantation key, plantation key school, school, florida school, the keys, florida keys, Mrs. Sears, Sears">
	
<!--  ==========	Style Sheets		==========	-->
	<link rel="stylesheet" href="<?=base_url();?>inc/css/screen.css"/>
	<link rel="stylesheet" href="<?=base_url();?>inc/css/phone.css"/>
	
<!--  ==========	Header and navigation ==========  -->

</head>
<body>

<!--  ==========	Login Form ==========  -->
<h3 class="sessionMess">Sorry, this site needs browser sessions in order to log you in. Please make sure you have private browsing turned off.</h3>
<p class="mobileMess">Sorry, the admin section of this site is not available through mobile phones at this time.</p>
<div class="loginForm">
		<?=form_open('users/checkLogin');?>
			<h2>Login</h2>
			<label>Email:</label><input  type="text" name="email" id="email" />
			<label>Password:</label><input  type="password" name="pass" id="pass" />
			<input type="hidden" name="robot" value="yes" />
			<p><input type="submit" value="Sign In" /></p>
		</form>
</div><!--  end loginForm  -->

<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="<?=base_url();?>inc/js/livevalidation_standalone.js" type="text/javascript"></script>
<script src="<?=base_url();?>inc/js/loginVal.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>inc/js/Modernizr.js" type="text/javascript"></script>
</body>
</html>