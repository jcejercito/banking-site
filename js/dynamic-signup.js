$(window).on('load', function(){
	$.ajax({
		url: "backend/signup-content.php",
		data: 'page=1',
		type: "POST",
		success: function(data) { 
			$('#signup-forms').html(data); 
			//TODO: MAKE A LISTENER THAT WOULD LISTEN TO AN ENTER KEY
			$('#continue-button').on('click', showNext);
		}
	});

	
});

function showNext(){
	//Check if all forms are filled
	let flag = false;

	if($("#signup-forms").valid() === false){
		return;
	}

	//Store contents of current page
	let firstName = $('#first-name').val();
	let lastName = $('#last-name').val();
	let email = $('#email').val();

	//Show the contents of next page
	$.ajax({
		url: "backend/signup-content.php",
		data: 'page=2',
		type: "POST",
		success: function(data) { 
			$('#signup-forms').html(data); 
			$('#continue-button').off(); //Clear event handlers
			$('#continue-button').on('click', function(){
				submitForm(firstName, lastName, email);
			});
		}
	});
}

function submitForm(firstName, lastName, email){
	$("#confpassword").rules("add", {
		equalTo: "#password"
	});

	if($("#signup-forms").valid() === false){
		return;
	}

	let dob = $('#birthdate').val();
	let username = $('#username').val();
	let password = $('#password').val();

	//Submit forms via AJAX
	$.ajax({
		url: "backend/form-submit.php",
		data: {
			type: 'register', 
			fname: firstName,
			lname: lastName,
			email: email,
			dob: dob,
			username: username, 
			password: password
		},
		type: "POST",
		success: function(data){
			console.log("SUCCESS, inserted rows: " + data);
			window.location.href = "dashboard.php";
		},
		error: function(xhr, status, error) {
		  	var err = eval("(" + xhr.responseText + ")");
		  	console.log(err.Message);
		}
	});
}