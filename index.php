<?php
  require_once "pdo.php";
    $stmt = $pdo->query("SELECT id,firstname,lastname 
                         FROM project ORDER BY firstname");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
          <li class="active"><a href="index.php">Home</a></li>
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
      </ol>
      <!-- / breadcrumb -->

    </div>
    <div class = "container">
      <h1>Welcome!</h1>
      <p>
        <a href = "login.php"> Please Log In</a>
      </p>
      <p>
        Attempt to go to <a href = "entry.php">Entry</a> without logging in - it should fail with an error message.
      </p>
    </div>
    <div class="container text-center">
      <h1>
      Currently registered students
    </h1>
    </div>
    <div class="container">
      <p>
        <ul>
          <?php
           if ($rows == false) {
                }
           else {
               foreach ($rows as $row) {
                $full_profile_name = $row['firstname'] . " " . $row['lastname'];
                echo('<h3><li><a href="view.php?id=' . $row['id'] . '">' . htmlentities($full_profile_name) . '</a></li></h3>');
                      
                            
                        }
                        
              }
          ?>
        </ul>
      </p>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>