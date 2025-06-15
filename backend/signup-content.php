<?php
	if($_POST["page"] == 1){
		header("Content-type: text/html");
		
		$string = '
			<div class="form-text mt-1 my-4">
		  		<label for="formGroupExampleInput" class="form-label">First Name</label>
	  			<input type="text" class="form-control py-2 px-3" name="fname" id="first-name" placeholder="Juan" required>
			</div>
			<div class="form-text mt-1 my-4">
		  		<label for="formGroupExampleInput" class="form-label">Last Name</label>
		  		<input type="text" class="form-control py-2 px-3" name="lname" id="last-name" placeholder="Dela Cruz" required>
			</div>
			<div class="form-text mt-1 my-4">
		  		<label for="formGroupExampleInput" class="form-label">Email</label>
		  		<input type="email" class="form-control py-2 px-3" maxlength="30" name="email" id="email" placeholder="jdelacruz@gmail.com" required>
			</div>

			<!--TODO: DO JAVASCRIPT NA DISABLED YUNG BUTTON IF EVERYTHING ISNT FILLED UP
				ALSO, AFTER CLICKING CONTINUE, DAPAT IT WILL DYNAMICALLY UPDATE THE FORM
				AND ASK FOR THE NEXT USER DATA:
				- BIRTHDATE
				- USERNAME
				- PASSWORD
				- CONFIRMPASSWORD
			-->
			<button type="button" id="continue-button" class="btn w-100 my-3 p-2 btn-primary">Continue</button>
		';

		echo $string;
	}

	else if($_POST["page"] == 2){
		header("Content-type: text/html");

		$string = '
			<div class="form-text mt-1 my-4">
				<label for="birthdate" class="form-label">Date of Birth</label>
				<input id="birthdate" name="birthdate" class="form-control" type="date" required>
			</div>
			<div class="form-text mt-1 my-4">
		  		<label for="username" class="form-label">Username</label>
	  			<input type="text" name="username" maxlength="15" class="form-control py-2 px-3" id="username" placeholder="jdcruz" required>
			</div>
			<div class="row">
				<div class="col form-text mt-1 my-4">
			  		<label for="password" class="form-label">Password</label>
		  			<input type="password" class="form-control py-2 px-3" maxlength="30" name="password" id="password" placeholder="Enter password" required>
				</div>
				<div class="col form-text mt-1 my-4">
			  		<label for="conf-password" class="form-label">Confirm Password</label>
		  			<input type="password" class="form-control py-2 px-3" name="confpassword" id="confpassword" placeholder="Enter password" required>
				</div>
			</div>
			<button type="button" id="continue-button" class="btn w-100 my-3 p-2 btn-primary">Submit</button>
		';

		echo $string;
	}

	else{
		header("HTTP/1.1 401 Invalid Request");
		die("Invalid Request");
	}	

?>