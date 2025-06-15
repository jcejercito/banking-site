<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Winden: Business Banking for Entrepreneurs</title>

	<!--Dashboard Styles-->
	<link href="styles/dashboardstyles.css" rel="stylesheet">

	<!--Bootstrap CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
	<?php
		session_start();
		if(!isset($_SESSION['email'])){
			header('Location: userlogin.php');
		}
		$firstName = $_SESSION['firstName'];
		$fullName = $_SESSION['firstName'] . " " . $_SESSION['lastName'];
	?>
	<nav class="navbar bg-body-tertiary p-2">
		<div class="container-fluid">
			<span class="navbar-brand mb-0 me-5">	
				<img id="logo" src="img/logosvg.svg">
				<img src="img/logotitle.svg">
			</span>
			
			<div class="nav " id="nav-tab" role="tablist">
				<ul class="nav nav-underline">
					<li class="nav-item">
						<a class="nav-link active" data-bs-toggle="tab" data-bs-target="#overview-tab" aria-current="page" href="#">Overview</a>
					</li>
					<li class="ms-4 nav-item">
						<a class="nav-link" data-bs-toggle="tab" data-bs-target="#history-tab" href="#">Transaction History</a>
					</li>
					<li class="ms-4 nav-item">
						<a class="nav-link" data-bs-toggle="tab" data-bs-target="#new-transaction-tab" href="#">New Transaction</a>
					</li>
				</ul>
			</div>

			<div class="nav d-flex ms-auto my-0 align-items-center" id="nav-tab">
				<p class="mx-2 my-0"><?= $fullName?></p>
				<a class="mx-2" href="backend/logout.php">Log out</a>
			</div>
		</div>
	</nav>

	<div class="tab-content">
		<div class="tab-pane fade show active" id="overview-tab" role="tabpanel" aria-labelledby="nav-overview-tab" tabindex="0">
			<?php include "template/overview.php";?>
		</div>
		<div class="tab-pane fade" id="history-tab" role="tabpanel" aria-labelledby="nav-history-tab" tabindex="0">
			<?php include "template/billing.php";?>
		</div>
		<div class="tab-pane fade" id="new-transaction-tab" role="tabpanel" aria-labelledby="nav-history-tab" tabindex="0">
			<?php include "template/newtransaction.php";?>
		</div>
	</div>

	<!--Bootstrap JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	<!--JQuery-->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

	<!--FontAwesome-->
	<script src="https://kit.fontawesome.com/6af8a38aa6.js" crossorigin="anonymous"></script>
</body>
</html>