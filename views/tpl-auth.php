<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - login-signup</title>
  <link rel="stylesheet" href="<?= BASE_URL;?>/assets/css/auth.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="background">
	<div id="panel-box">
		<div class="panel">
			<div class="auth-form on" id="login">
				<div id="form-title">Log In</div>
				<form action="<?=baseUrl("auth.php?action=login")?>" method="POST">
					<input name="email" type="email" required="required" placeholder="email"/>
					<input name="password" type="password" required="required" placeholder="password"/>
					<input name="submit" type="submit" value="Log In">
				</form>
			</div>
			<div class="auth-form" id="signup" >
				<div id="form-title">Register</div>
				<form action="<?=baseUrl("auth.php?action=register")?>" method="POST">
					<input name="username" type="text" required="required" placeholder="username"/>
					<input type="email" name="email" id="emailSignup" placeholder="email">
					<input name="password" type="password" required="required" placeholder="password"/>
					<input name="submit" type="submit" value="Sign Up">
				</form>
			</div>
		</div>
		<div class="panel">
			<div id="switch">Sign Up</div>
			<div id="image-overlay"></div>
			<div id="image-side"></div>
		</div>
	</div>
</div>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
  <script defer src="<?= BASE_URL;?>/assets/js/auth.js"></script>
</body>
</html>
