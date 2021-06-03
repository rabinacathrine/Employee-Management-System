<?php
require_once 'Master/config.php';

//$sel_new_usr=mysqli_query($conn,"select count(id) as cou_usr from users ");
	//	$fet_new_usr=mysqli_fetch_array($sel_new_usr);	//count  user
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="style.css">
    <title>Feenix</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
        <a class="navbar-brand" href="#">Feenix</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Master
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="Master/customer.php">Customer Registeration</a>
                  <a class="dropdown-item" href="Master/executive.php">Executive Registeration</a>
                  <a class="dropdown-item" href="Master/communication.php">Mode of Communication</a>
                </div>
              </li>
            <li class="nav-item active">
              <a class="nav-link" href="Master/feedback.php">FeedBack <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Master/dailyreport.php">Daily Report</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Master/alert.php">Alert <span class="badge badge-info">5</span>
</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Master/report.php">Overall Report</a>
              </li>
          </ul>
        </div>
      </nav>
		 <h2>Welcome to Feenix Technology</h2>
    <script src = "assets/bootstrap/jquery.min.js"></script>
    <script src = "assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>