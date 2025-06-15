<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Winden: Business Banking for Entrepreneurs</title>

		<!--Login Styles-->
		<link href="styles/loginstyles.css" rel="stylesheet">

		<!--Bootstrap CSS-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	</head>

	<body>
		<nav class="navbar bg-body-tertiary p-4">
	  		<div class="container-fluid">
	    		<span class="navbar-brand mb-0">	
	    			<img id="logo" src="img/logosvg.svg">
					<img src="img/logotitle.svg">
				</span>

				<div class="d-flex align-items-centers">
					<p class="mx-2">Need help? </p><i class="fa-solid fa-comments"></i>
					<p class="mx-2">Contact Support</p>
				</div>
	  		</div>
		</nav>

		<div class="container align-items-center">
			<h1 class="text-center mt-5 mb-4">
				Welcome Back!
			</h1>
			<form action="backend/form-submit.php" method="post" data-type="userlogin" enctype="multipart/form-data">	
				<div id="form-container" class="container d-flex flex-column justify-content-center">
					<div class="form-text mt-1 mb-4">
					  	<label for="formGroupExampleInput" class="form-label">Email</label>
					  	<input type="text" class="form-control" id="formGroupExampleInput" name="email" placeholder="Enter your email address">
					</div>
					<div class="form-text mt-1 mb-4">
					  	<label for="formGroupExampleInput" class="form-label">Password</label>
					  	<input type="password" class="form-control" id="formGroupExampleInput" name="password" placeholder="Enter your password">
					</div>
					<button type="submit" class="btn btn-primary">Sign in</button>
					<div class="row mt-3 flex-row justify-content-between">
						<p>Don't have an account? <a href="user-signup.php">Sign up</a></p>
						<a href="#">Forgot password?</a>
						<a href="stafflogin.php">Staff login</a>
					</div>
				</div>
				<input type="hidden" id="type" name="type" value="userlogin">
			</form>

		</div>

		<!--Bootstrap JS-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

		<!--FontAwesome-->
		<script src="https://kit.fontawesome.com/6af8a38aa6.js" crossorigin="anonymous"></script>
	</body>
</html>