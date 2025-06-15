<?php
	session_start();
	if($_POST["type"] == "register"){
		$db = new PDO("mysql:dbname=127_digital_bank; host=localhost", "root", "malayko1");

		$firstName = $db->quote($_POST['fname']);
		$lastName = $db->quote($_POST['lname']);
		$email = $db->quote($_POST['email']);
		$birthDate = $db->quote($_POST['dob']);
		$username = $db->quote($_POST['username']);
		$password = $db->quote($_POST['password']);

		//Start transaction
		$db->beginTransaction();

		//Create user account
		$query = $db->exec("
			INSERT INTO useraccount( 
				email, 
				username, 
				password
				) VALUES (
				$email,
				$username,
				$password
				)
			");

		//Create customer account
		$query = $db->exec("
			INSERT INTO customer( 
				first_name, 
				last_name, 
				userID,
				balance,
				birth_date
				) VALUES (
				$firstName,
				$lastName,
				(
					SELECT id FROM useraccount WHERE email = $email
				),
				'0',
				$birthDate
				)
			");

		//Commit the changes
		$db->commit();

		//Close connection
		$db = null;

		//Initialize session variables
		$_SESSION['email'] = $email;
		$_SESSION['firstName'] = $firstName;
		$_SESSION['lastName'] = $lastName;

		header('text/plain');
		echo $query;
	}
	else if($_POST['type'] == "userlogin"){
		$db = new PDO("mysql:dbname=127_digital_bank; host=localhost", "root", "malayko1");

		$email = $db->quote($_POST['email']);
		$password = $db->quote($_POST['password']);

		//Create user account
		$query = $db->query("
			SELECT useraccount.username, customer.first_name, customer.last_name FROM useraccount
			JOIN customer ON (customer.userID = useraccount.id)
			WHERE useraccount.email = $email AND
			useraccount.password = $password
			");

		$row = $query->fetch(PDO::FETCH_BOTH);

		if($row == 0){
			header("Location: ../userlogin.php?invalid=true");
		}
		else{
			$_SESSION['email'] = $email;
			$_SESSION['firstName'] = $row["first_name"];
			$_SESSION['lastName'] = $row["last_name"];

			header("Location: ../dashboard.php");
		}

	}
	else if($_POST['type'] == "stafflogin"){
		$db = new PDO("mysql:dbname=127_digital_bank; host=localhost", "root", "malayko1");

		$employeeID = $db->quote($_POST['employee_id']);
		$lastName = $db->quote($_POST['last_name']);

		//Create user account
		$query = $db->query("
			SELECT useraccount.username, customer.first_name, customer.last_name FROM useraccount
			JOIN customer ON (customer.userID = useraccount.id)
			WHERE useraccount.email = $email AND
			useraccount.password = $password
			");

		$row = $query->fetch(PDO::FETCH_BOTH);
	}
	else{
		header("HTTP/1.1 401 Invalid Request");
		die("Invalid Request");
	}

?>