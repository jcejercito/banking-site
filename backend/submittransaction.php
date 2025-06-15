<?php
	session_start();
	$db = new PDO("mysql:dbname=127_digital_bank; host=localhost", "root", "malayko1");

	$transactionType = $db->quote($_POST['transactionType']);
	$amount = $db->quote($_POST['amount']);
	$amountFloat = $_POST['amount'];
	$email = $_SESSION['email'];
	$date = $db->quote(date("Y-m-d"));

	//Get customer ID
	$query = $db->query("
		SELECT customer.ID, useraccount.email FROM customer
		JOIN useraccount ON (customer.userID = useraccount.ID)
		WHERE (useraccount.email = $email)
		");

	$customerID = $query->fetchColumn();

	//Get customer balance
	$query = $db->query("
		SELECT customer.balance, useraccount.email FROM customer
		JOIN useraccount ON (customer.userID = useraccount.ID)
		WHERE (useraccount.email = $email)
		");

	$balance = $query->fetchColumn(0);
	$balance = (float)$balance + (float)$amountFloat;

	//Transaction: Update transaction history and update user balance
	//Start transaction
	$db->beginTransaction();

	//Update transaction history
	$query = $db->exec("
		INSERT INTO transactions(
		    customerID, 
		    transaction_type, 
		    transaction_date, 
		    amount
		) VALUES (
		    $customerID,
		    $transactionType,
		    $date,
		    $amount
		)"
	);

	//Update user balance
	$query = $db->exec("
		UPDATE customer SET balance = $balance
		WHERE ID = $customerID;
		");

	//Commit the changes
	$db->commit();

	//Close connection
	$db = null;

	header("Location: ../dashboard.php");
?>