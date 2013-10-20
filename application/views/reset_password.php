<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<base href="<?php echo base_url(); ?>" />
	<link rel="icon" href="http://localhost/base/assets/img/favicon.ico">
	<title>Build Your Profile | LinkedIn</title>
	<?php echo link_css('reset_password'); ?>
</head>
<body>
	<div id="big_wrapper">
		<header id="the_header">
			<div id="logo_container">
				<a href="#"><img src="http://localhost/base/assets/img/black_logo.png"></a>
			</div>
		</header>
		<section id="main_section">
			<div>
				<h1> Reset your Password </h1>
				<p class="description">To verify your new password, please enter it once in each field below.</p>
				<p class="description">Passwords are case-sensitive and must be atleast 6 characters long. A good password should contain a mix of capital and lower-case letters, numbers and symbols.</p>
			</div>
			<div id="form_wrapper">
				<form name="reset" id="reset" method="POST" action="<?php echo site_url('site/update_password') ?>" >
					<ul>
						<li>
							<label>Enter new password:</label>
							<div id="form_element">
								<span id="password1_error" class="error"></span>
								<input type="password" name="password1" id="password1">
							</div>
						</li>
						<li>
							<label>Re-enter new password:</label>
							<div id="form_element">
								<span id="password2_error" class="error"></span>
								<input type="password" name="password2" id="password2">
							</div>
						</li>
						<li>
							<input type="submit" id="submit" name="submit" value="Reset Password">
						</li>
					</ul>
				</form>
			</div>
			<div id="clear"></div>
		</section>
		<footer id="the_footer">
			<p id="copywrite">LinkedIn Corporation &copy; 2013</p>
			<p id="terms">
				Commercial use of this site without express authorization is prohibited.
			</p>
		</footer>
	</div>
	<?php echo link_js('jquery'); ?>
	<?php echo link_js('reset_password'); ?>
</body>
</html>