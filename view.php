<?php 
    require_once "pdo.php";
    $stmt = $pdo->prepare('SELECT firstname, lastname, gender, dob, edu, describ
                        FROM project  
                        WHERE id = :id');
    $stmt->execute(array(':id' => $_GET['id']));
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row == false) {
        header("Location: index.php");
        return ;
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Registry</title>
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
  <div class="container">

      <!-- start breadcrumb -->
      <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="view.php">View</a></li>
      </ol>
      <!-- / breadcrumb -->

    </div>
  <div class = "container text-center">
      <h1>Details</h1>
    </div>
    <div class="container">
            <h4>
                <strong><u>First Name</u> :&ensp;&emsp;&emsp;&emsp; </strong><?php echo $row['firstname'] ?>
            </h4>
            <br/>
            <h4>
                <strong><u>Last Name</u> :&emsp;&emsp;&ensp;&emsp;</strong> <?php echo $row['lastname'] ?>
            </h4>
            <br/>
            <h4>
                <strong><u>Gender</u> :</strong> &ensp;&emsp;&emsp;&emsp;&emsp;&ensp;<?php echo $row['gender'] ?>
            </h4>
            <br/>
            <h4>
                <strong><u>Date of Birth</u> :</strong>&ensp;&emsp;&emsp; <?php echo $row['dob'] ?>
            </h4>
            <br/>
            <h4>
                <strong><u>Highest Education</u> :</strong> <?php echo $row['edu'] ?>
            </h4>
            <br/>
            <h4>
                <strong><u>About Me</u> :</strong><br/><br/>
                <div class="container">
                <?php echo $row['describ'] ?>
            </div>
            </h4>
            <br/>
            <br/>
            <a href="index.php"><input type="button" name="ok" value="OK"></a>
        </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>