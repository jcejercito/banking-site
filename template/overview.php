<?php
	$db = new PDO("mysql:dbname=127_digital_bank; host=localhost", "root", "malayko1");

	$email = $_SESSION['email'];

	//Getting current loans of the user
	$loanQuery = $db->query("
		SELECT loan.loan_no, loan.customerID, loan.amount, loan.interest, loan.date_applied, loan.term, loan_status.active, employee.first_name, employee.last_name, loan_categories.category
		FROM `loan` 
		JOIN loan_status ON (loan.loan_no = loan_status.loan_no)
		JOIN (
			SELECT useraccount.email AS email, customer.ID as id FROM useraccount JOIN customer ON (customer.userID=useraccount.ID)
		) AS account ON (loan.customerID = account.ID)
		JOIN employee ON (loan.employeeID = employee.ID)
		JOIN loan_categories ON (loan.category = loan_categories.ID)
		WHERE (loan_status.active=1) AND (account.email=$email);
		");

	$loanItemNo = 0;

	//Getting the current loan applications of user
	$loanAppQuery = $db->query("
		SELECT loan.loan_no, loan.customerID, loan.amount, loan.interest, loan.date_applied, loan.term, loan_status.active, employee.first_name, employee.last_name, loan_categories.category
		FROM `loan` 
		JOIN loan_status ON (loan.loan_no = loan_status.loan_no)
		JOIN (
			SELECT useraccount.email AS email, customer.ID as id FROM useraccount JOIN customer ON (customer.userID=useraccount.ID)
		) AS account ON (loan.customerID = account.ID)
		JOIN employee ON (loan.employeeID = employee.ID)
		JOIN loan_categories ON (loan.category = loan_categories.ID)
		WHERE (loan_status.active=0) AND (account.email=$email);
		");

	$loanAppCount = $loanAppQuery->fetchColumn();
?>


<div class="container m-0 p-5" id="card-container">
	<h3 id="welcome-head" class="ms-5">Welcome <span id="welcome-bold"><?=$firstName?></span>!</h3>

	<div id="carouselExample" class="carousel slide mt-4">
		<div class="carousel-inner">
			<?php foreach($loanQuery as $row) {
				$loanItemNo++;
			?>
			<div class="carousel-item <?php if($loanItemNo == 1) echo "active"?>">
				<div class="card mb-3">
					<div class="row g-0">
						<div class="col-md-4">
							<img src="img/loans.gif" class="img-fluid rounded-start" alt="...">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h4 class="card-title"><?=$row["category"]?></h4>
								<p class="card-text mb-0"><b>Under Name:</b> <?=$fullName?></p>
								<p class="card-text mb-0"><b>Current Associate:</b> <?= $row["first_name"] . " " . $row["last_name"] ?></p>
								<p class="card-text mb-0"><b>Loan Amount:</b> P<?=$row["amount"]?></p>
								<hr>
								<div class="d-flex">
									<p class="card-text mb-0 flex-fill"><b>Interest:</b> <?=$row["interest"]?></p>
									<p class="card-text mb-0 flex-fill"><b>Date Applied:</b> <?=$row["date_applied"]?></p>
									<p class="card-text mb-0 flex-fill"><b>Term: </b> <?=$row["term"]?> months</p>
								</div>
								
								<br>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 
			} 
			?>
		</div>


		<?php if($loanItemNo != 1){ ?>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
				<i class="fa-solid fa-circle-chevron-left"></i>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
				<i class="fa-solid fa-circle-chevron-right"></i>
				<span class="visually-hidden">Next</span>
			</button>
		<?php } ?>
	</div>

</div>

<div class="container m-0 p-5" id="application-panel">
	<h4 class="ms-5">Current applications</h4>

	<?php if($loanAppCount == 0) {?>
		<h4 id="no-applications">You currently have no ongoing loan applications.</h4>
	<?php } ?>

	<div class="row row-cols-3 row-cols-md-3 g-4" id="card-group">
		<?php foreach ($loanAppQuery as $row){ ?>
			<div class="col">
				<div class="card">
					<div class="card-header"></div>
					<div class="card-body">
						<div class="alert alert-warning p-1 d-flex w-50" role="alert">
							<small><i class="fa-solid fa-circle" id="bullet"></i>  Inactive</small>
						</div>
						<h5 class="card-title"><?=$row["category"]?></h5>
						<p class="card-text mb-0"><b>Under Name:</b> <?=$fullName?></p>
						<p class="card-text mb-0"><b>Current Associate:</b> <?=$row["first_name"] . " " . $row["last_name"] ?></p>
						<p class="card-text"><b>Loan Amount:</b> P<?=$row["amount"]?></p>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>