<!DOCTYPE html>		

<html>		

<head>		

<style>		

.error {color: #FF0001;}		

</style>		

</head>		

<body>	

<?php		

// define variables to empty values		

$nameErr = $emailErr = $phonenoErr = $genderErr = $websiteErr = $hobbyErr = "";		

$name = $email = $phoneno = $gender = $website = $hobby = "";		

//Input fields validation		

if ($_SERVER["REQUEST_METHOD"] == "POST") {		

	//String Validation		

	if (empty($_POST["name"])){		
	    $nameErr = "Name is required";		
	} else {		
	    $name = input_data($_POST["name"]);		

		 	 // check if name only contains letters and whitespace		

		 	 if (!preg_match("/^[a-zA-Z ]*$/",$name)) { 
	        $nameErr = "Only alphabets and white space are allowed";		
	    }		
	}		
	//Email Validation	 	
	if (empty($_POST["email"])) {		
	   $emailErr = "Email is required";		
	} else {
	   $email = input_data($_POST["email"]);		

		 	 // check that the e-mail address is well-formed		

		 	 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
	        $emailErr = "Invalid email format";		
	    }	

	}		

	//Number Validation		
	if (empty($_POST["phoneno"])) {
	   	$phonenoErr = "Phone no is required";		
	} else {
	    $phoneno = input_data($_POST["phoneno"]);	
		   // check if phone no is well-formed		
	    if (!preg_match ("/^[0-9]*$/", $phoneno) ) { 
	        $phonenoErr = "Only numeric value is allowed.";		
	    }	

	    //check phone no length should not be less and greater than 10		

		 		if (strlen ($phoneno) != 10) {		

		 		    $phonenoErr = "Mobile no must contain 10 digits.";		

		 	 }
	}		


	//Empty Field Validation		

	if (empty ($_POST["gender"])){

		$genderErr = "Gender is required";		

	}else{

		$gender = input_data($_POST["gender"]);		

	}

	//Checkbox Validation		

	if (!isset($_POST['hobbies'])){		

		$hobbyErr = "You must select hobby.";		

	}else{

		$hobby = input_data($_POST["hobbies"]);	

	}		

}		

function input_data($data){

	$data = trim($data);		

	$data = stripslashes($data);		

	$data = htmlspecialchars($data);		

	return $data;

}		

?>		

<h2>Registration Form</h2>		

<span class = "error">* required field </span>		

<br><br>		

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >	 		

	Name:		

	<input type="text" name="name">		

	<span class="error">* <?php echo $nameErr; ?> </span>	

	<br><br>		

	E-mail:

	<input type="text" name="email">		

	<span class="error">* <?php echo $emailErr; ?> </span>	

	<br><br>		

	Phone No:		

	<input type="text" name="phoneno">		

	<span class="error">* <?php echo $phonenoErr; ?> </span>	

	<br><br>		
	

	Gender:	

	<input type="radio" name="gender" value="male"> Male		

	<input type="radio" name="gender" value="female"> Female		

	<input type="radio" name="gender" value="other"> Other		

	<span class="error">* <?php echo $genderErr; ?> </span>	

	<br><br>		

	Hobbies:	

	<input type="checkbox" name="hobbies" value="Reading"> Reading	

	<input type="checkbox" name="hobbies" value="Traveling"> Traveling	

	<input type="checkbox" name="hobbies" value="Listening to music"> Listening to music	

	<span class="error">* <?php echo $hobbyErr; ?> </span>	

	<br><br>

	<input type="submit" name="submit" value="Submit">

	<br><br>	 	 	 	 	 	 	 	 	 	 	 	 	 	 	

</form>		

<?php		

	if(isset($_POST['submit']))	{

		if($nameErr == "" && $emailErr == "" && $phonenoErr == "" && $genderErr == "" && $websiteErr == "" && $hobbyErr == ""){

			echo "<h3 color = #FF0001> <b>You have sucessfully registered.</b> </h3>";		

			echo "<h2>Your Input:</h2>";		

			echo "Name: " .$name;		

			echo "<br>";		

			echo "Email: " .$email;		

			echo "<br>";		

			echo "Phone No: " .$phoneno;		

			echo "<br>";				

			echo "Gender: " .$gender;		

			echo "<br>";	

			echo "Hobby: " .$hobby;
		} else {		

			echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";		

		}

	}		

?>		

</body>		

</html>