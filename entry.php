<?php
// Demand a GET parameter
require_once "pdo.php";

if(!isset($_GET["name"]) || strlen($_GET["name"]) < 1)
	die("Please Log in  Go to home and login from there");

// If the user requested logout, go back to index.php
if(isset($_POST["logout"]))
{
	header("Location: index.php");
	return;
}

$failure = false;
$insertedRecord = false;

if(isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["dob"]) && isset($_POST["edu"]) && isset($_POST["describe"]) && isset($_POST["gender"]))
{
	$firstname = htmlentities($_POST["firstname"]);
	$lastname = htmlentities($_POST["lastname"]);
	$gender = htmlentities($_POST["gender"]);
	$dob = htmlentities($_POST["dob"]);
	$edu = htmlentities($_POST["edu"]);
	$describe = htmlentities($_POST["describe"]);
	$insertedRecord = false;

	if(strlen($firstname) < 1 && strlen($lastname)<1)
		$failure = "Enter first and last name correctly";
	elseif ($gender=="not") {
		$failure="Select appropriate gender";
		# code...
	}
	elseif ($edu=="not") {
		$failure="Select appropriate Eduaction";
		# code...
	}
	elseif(strlen($describe)<1)
		$failure = "Describe something about yourself";
	else
	{
		//*
		$sql = "INSERT INTO project (firstname,lastname,gender,dob,edu,describ) values ( :fn, :ln, :gn, :db, :ed, :ds)";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(":fn" => $firstname, ":ln" => $lastname, ":gn" => $gender, ":db" => $dob, ":ed" => $edu, ":ds" => $describe));
		//*/
		$insertedRecord = true;
	}
}

?>

<!DOCTYPE html>

<html lang = "en">

	<head>
		<meta charset = "utf-8">
		<title>Prajwal Jain</title>
		<?php require_once "pdo.php" ?>
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
          <li class="active"><a href="entry.php">Entry</a></li>
          <li><a href="about.html">About Us</a></li>
          <li><a href="contact.html">Contact Us</a></li>
        </ul>
      </div><!-- / un-collapsed navbar-->

    </div> <!-- /container -->
  </nav>
  <div class="container">
  <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="entry.php">Entry</a></li>
      </ol>
  </div>
		<div class = "container">
			<?php  
				$checkName = $_REQUEST["name"];
				if(isset($checkName))
					echo "<h1>Welcome " . htmlentities($checkName) . "</h1>\n";
				if($failure !== false)
					echo ('<p style = "color : red;">' . htmlentities($failure) . "</p>\n");
				elseif($insertedRecord)
					echo ('<p style = "color : green;">Record inserted' . "</p>\n");
			?>
			<br/>
			<form method = "post">
				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-12">
						First Name :
						<input type = "text" name = "firstname" placeholder="Enter your First name">
						</div></div><br><br>
						<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12">
						Last Name :
						<input type = "text" name = "lastname" placeholder="Enter your Last name">
						</div></div><br><br>
						<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-12">
						Date Of Birth :
						<input type = "date" name = "dob">
						</div></div><br><br>
						<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-12">
						Gender :
						<select name="gender">
						<option value="not">SELECT</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Prefer not to say">Prefer not to say</option>
						</select>
						</div></div><br><br>
						<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-12">
						Highest Eduaction Achieved :
						<select name="edu">
							<option value="not">SELECT</option>
							<option value="M.Tech">M.Tech</option>
							<option value="B.Tech">B.tech</option>
							<option value="Secondary School">Secondary School</option>
							<option value="Primary School">Primary School</option>
						</select>
						</div></div><br><br>
						<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-12">
						Desribe yourself (max 500) :
						<textarea name="describe" maxlength="500" rows='10' cols='100' placeholder="Enter characters not more than 500 including spaces"></textarea>
						</div></div>
						

				<input type = "submit" value = "Add">
				<input type = "submit" name = "logout" value = "Logout">
			</form>

		</div>
		<script src="js/jquery.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>
	</body>

</html>