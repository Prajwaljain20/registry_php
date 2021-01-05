<?php

if(isset($_POST["cancel"]))
{
	// Redirect the browser to index.php
	header("Location: index.php");
	return;
}

$alt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // Pw is php123

$failure = false; // If we have no POST data

// Check to see if we have some POST data, if we do process it
if(isset($_POST["who"]) && isset($_POST["pass"]))
{
	$username = $_POST["who"];
	$password = $_POST["pass"];

	if(strlen($username) < 1 || strlen($password) < 1)
		$failure = "Email and password are required";
	elseif (strpos($username, '@') === false) 
		$failure = "Email must have a @";
	else
	{
		$check = hash("md5", $alt.$password);
		if ($check == $stored_hash) 
		{
			// Redirect the browser to autos.php
			header("Location: entry.php?name=".urldecode($username));
			error_log("Login success " . $username);
			return;
		}
		else
		{
			$failure = "Incorrect password";
			error_log("Login fail " . $username . "$check");
		}
	}
}

?>

<!DOCTYPE html>

<html lang = "en">

	<head>
		<meta charset = "utf-8">
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.css" rel="stylesheet">
    	<link href="css/styles.css" rel="stylesheet">
	</head>

	<body>
		<nav class="navbar navbar-default">
    <div class="container-fluid">
  
      <!-- start collapsed navbar-->
      <div class="navbar-header">
        <button 
        type="button" 
        class="navbar-toggle collapsed" 
        data-toggle="collapse" 
        data-target="#main_navbar" 
        aria-expanded="false">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      </div><!-- / collapsed navbar-->

      <!-- start un-collapsed navbar-->
      <div 
         class="collapse navbar-collapse" 
         id="main_navbar">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="entry.php">Entry</a></li>
          <li><a href="about.html">About Us</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </div><!-- / un-collapsed navbar-->

    </div> <!-- /container -->
  </nav>
		<div class = "container">
			<h1>Please Log In</h1>
			<ol class="breadcrumb">
        		<li><a href="index.php">Home</a></li>
        		<li><a href="login.php">Login</a></li>
      		</ol>
			<?php
				if($failure !== false)
					echo ('<p style = "color : red;">' . htmlentities($failure) . "</p>\n");
			?>
			<form method = "post">
				<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-12 text-center">
				<label for = "nam">User Name</label>
				<input type = "text" name = "who" id = "nam" onblur="validate()"/><span id="hell"></span><br/><br/></div></div>
				<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-12 text-center">
				<label for = "id_1723">Password</label>
				<input type = "password" name = "pass" id = "id_1723"><br/><br/></div></div>
				<div class="col-lg-4 col-md-6 col-sm-12 text-center">
				<input type = "submit" value = "Log In">
				<input type = "submit" name = "cancel" value = "Cancel"></div>
			</form>
		</div>
		</div>
		<script src="js/jquery.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	<script src="js/form.js"></script>
	</body>

</html>