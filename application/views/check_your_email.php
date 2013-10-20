<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<base href="<?php echo base_url(); ?>" />
	<link rel="icon" href="http://localhost/base/assets/img/favicon.ico">
	<title>Check Your Email | LinkedIn</title>
	<?php echo link_css('check_your_email'); ?>
</head>
<body>
	<div id="big_wrapper">
		<header>
			<div id="logo_container">
				<a href="#"><img src="http://localhost/base/assets/img/black_logo.png"></a>
			</div>
		</header>
		<section id="main_section">
			<div id="heading">
				<h1>
					<strong>Please check your email</strong>
				</h1>
			</div>
			<div id="note">
				<p>
					We've sent you an email that will allow you to reset your password quickly and easily.
				</p>
			</div>
		</section>
		<footer id="the_footer">
			<p id="copywrite">LinkedIn Corporation &copy; 2013</p>
			<p id="terms">
				Commercial use of this site without express authorization is prohibited.
			</p>
		</footer>
	</div>
	<!-- To Load The Page Faster -->
	<?php echo link_js('jquery'); ?>
	<?php echo link_js('check_your_email'); ?>
</body>
</html>