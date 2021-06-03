<?php
include("config.php");
if (isset($_REQUEST['ec'])){
$execcode = stripslashes($_REQUEST['ec']);
$execname = stripslashes($_REQUEST['execname']);
$email = stripslashes($_REQUEST['email']);
$phone1 = stripslashes($_REQUEST['ph1']);
$phone2 = stripslashes($_REQUEST['ph2']);
$pass = stripslashes($_REQUEST['pass']);
$addr1 = stripslashes($_REQUEST['addr1']);
$addr2 = stripslashes($_REQUEST['addr2']);
$addr3 = stripslashes($_REQUEST['addr3']);
$state = stripslashes($_REQUEST['state']);
$country = stripslashes($_REQUEST['country']);
$pincode = stripslashes($_REQUEST['pin']);
$sql="select * from executive";
$s=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($s,MYSQL_ASSOC))
{
	//ECHO"HI";
	if($execcode==$row['executive_code'])
	{
	echo"
		<script>
		alert('sorry customer with this already exists...');
        window.location.href='executive.php';
        </script>";
	}
}	

$sql="INSERT INTO `executive`(`executive_code`, `executive_name`, `email_id`, `password`, `phone1`, `phone2`, `address1`, `address2`, `address3`, `state`, `country`, `pincode`)  
VALUES ('$execcode','$execname','$email','$pass','$phone1','$phone2','$addr1','$addr2','$addr3','$state','$country','$pincode')";


if (mysqli_query($link, $sql)) {
    echo "<script>
      alert('Registered successfully');
      window.location.href='executive.php?success';

                   </script>";
      
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" type="text/css">
	<!-- Data Table -->
    <link rel="stylesheet" href="../assets/DataTable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../style.css">
    <title>Feenix</title>
</head>
<body>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-primary">
        <a class="navbar-brand" href="#">Feenix</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Master
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="customer.php">Customer Registeration</a>
                  <a class="dropdown-item" href="executive.php">Executive Registeration</a>
                  <a class="dropdown-item" href="communication.php">Mode of Communication</a>
                </div>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="feedback.php">FeedBack <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dailyreport.php">Daily Report</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="alert.php">Alert</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="report.php">Overall Report</a>
              </li>
          </ul>
        </div>
      </nav>

    <!-- Executive  Registraion -->
    <div class = "container">
        <div class = "executive">
          <div class = "executive-form">
                        <form name="executiveregistration" action="" method="post">
                <h3>Executive Registeration</h3>
                <!-- Executive Code and Executive Name -->
                <div class="row">
                  <div class="col">
                      <input type="text" class="form-control" name="ec" placeholder="Executive Code*" required>
                  </div>
                  <div class="col">
                      <input type="text" class="form-control" name="execname" placeholder="Executive Name*" required>
                  </div>
                </div>
                <br />
                <!-- Email and Phone -->
                <div class="row">
                  <div class="col">
                      <input type="text" class="form-control" name="email" placeholder="Email ID*" required>
                  </div>
                  <div class="col">
                      <input type="number" class="form-control" name="ph1" placeholder="Phone*" required>
                  </div>
                </div>
                <!-- Phone 2 and Password -->
                <br />
                <div class="row">
                  <div class="col">
                      <input type="number" class="form-control" name="ph2" placeholder="Phone-2">
                  </div>
                  <div class="col">
                      <input type="password" class="form-control" name="pass" placeholder="Password*" required>
                  </div>
                </div>
                 <!-- Address 1-->
                 <br />
                 <div class="row">
                   <div class="col">
                       <textarea type="text" row = "4" class="form-control" name="addr1" placeholder="Address 1*" required></textarea>
                   </div>
                 </div>
                 <!-- Address 2-->
                 <br />
                 <div class="row">
                   <div class="col">
                    <textarea type="text" row = "4" class="form-control" name="addr2" placeholder="Address 2*" required></textarea>
                  </div>
                 </div>
                 <!-- Address 3-->
                 <br />
                 <div class="row">
                   <div class="col">
                    <textarea type="text" row = "4" class="form-control" name="addr3" placeholder="Address 3" required></textarea>
                  </div>
                 </div>
                  <!-- State and Country -->
                <br />
                <div class="row">
                  <div class="col">
                      <input type="text" class="form-control" name="state" placeholder="State*" required>
                  </div>
                  <div class="col">
                      <input type="text" class="form-control" name="country" placeholder="Country*" required>
                  </div>
                  <div class="col">
                    <input type="number" class="form-control" name="pin" placeholder="Pincode*" required>
                </div>
                </div>
                   <!-- Submit button-->
                   <br />
                    <button type="submit" class="btn btn-primary submit">Submit</button>
            </form>
          </div>
		  <br />
          <br />
           <!-- Tables -->
         <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Executive Code</th>
                  <th>Executive Name</th>
                  <th>Contact Number</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <?php
                         
                            $conn = mysqli_connect("localhost","root","","fenix");
                            if($conn-> connect_error) {
                                die("connection failed:" .$conn-> connect_error);
                            }
                            $sql = "SELECT * from executive";
                            $result =  $conn ->query($sql);
                             if( $result->num_rows > 0 ){
                                while ($row = $result ->fetch_assoc()) {
                        
                                   echo "<tr><td>".$row["id"]."</td>"."<td>".$row["executive_code"]."</td>"."<td>".$row["executive_name"]."</td>"."<td>".$row["phone1"]."</td>"."</td>";
								   
                                                echo '<td><button type="button" class="btn btn-outline btn-primary data-toggle="modal" data-target="#myedit" ><b><font color="#fff"><a href="exced.php?id=' . $row['id'] . '" style="color:white;">EDIT</a></b></button>';
                                                                                                                                                                           
                               
                                   echo '</tr>';
                                   

                                    
                                }
                                 echo "</table>";
                             }
                             else{
                                echo "0 result";
                        
                             }
                             $conn ->close();
                            ?>
              </tbody>
              </table>
              <br />
              <br />
        <!-- tables end -->
        </div>
    </div>

      <script src = "../assets/bootstrap/jquery.min.js"></script>
      <script src = "../assets/bootstrap/js/bootstrap.min.js"></script>
       <!-- DataTables -->
       <script type="text/javascript" src="../assets/DataTable/jquery.dataTables.min.js"></script>
       <script type="text/javascript" src="../assets/DataTable/dataTables.bootstrap4.min.js"></script>
       <!-- Custom Data table function -->
       <script>
         $(document).ready(function() {
             $('#example').DataTable();
         } );
       </script>
	</body>
</html>