<!doctype>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<base href="<?php echo base_url(); ?>" />
	<link rel="icon" href="http://localhost/base/assets/img/favicon.ico"/>
	<title>You've successfully reset your password. | LinkedIn</title>
	<?php echo link_css('successfully_changed'); ?>
</head>
<body>
       <div id="logo">
       		<a href="#"><img id="Logo" src="http://localhost/base/assets/img/black_logo.png" /></a>
       </div>
	<div id="body-div">
		<div id="heading">
			<h1>You've successfully reset your password.</h1>
		</div>
		<form name="MyForm" action="<?php echo site_url('site/sign_in') ?>">
			<div id="button">
				<input type="submit" value="Continue" class="button" id="submit">
	  		</div>
	  	</form>
	</div>
	<footer>
		<div id="cor"><p>Linkedin corporation &copy; 2013</p></div>
		<div id="com"><p>Commercial use of this site without express authorization is prohibited.</p></div>
	</footer>
</body>
</html>