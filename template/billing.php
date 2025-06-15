<?php
	$db = new PDO("mysql:dbname=127_digital_bank; host=localhost", "root", "malayko1");
	$email = $_SESSION['email'];

	//Get the transaction history of the user
	
	$query = $db->query("
		SELECT transactions.ref_no, transactions.transaction_date, transactions.amount, transaction_types.type FROM transactions
		JOIN transaction_types ON (transactions.transaction_type = transaction_types.ID)
		JOIN (
			SELECT useraccount.email AS email, customer.ID as id FROM useraccount JOIN customer ON (customer.userID=useraccount.ID)
		)
		AS account ON (transactions.customerID = account.ID)
		WHERE account.email = $email;
		");
?>

<div class="container mt-5">
	<table class="table table-striped">
		<thead>
			<tr class="table-light">
				<th>Reference Number</th>
				<th>Transaction Type</th>
				<th>Amount</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($query as $row){
			?>
			<tr class="table-light">
				<td><?=$row["ref_no"]?></td>
				<td><?=$row["type"]?></td>
				<td><?=$row["amount"]?></td>
				<td><?=$row["transaction_date"]?></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>