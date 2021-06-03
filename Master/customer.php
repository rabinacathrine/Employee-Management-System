<?php
include("config.php");
if (isset($_REQUEST['email'])){
$clientcode = stripslashes($_REQUEST['cc']);
$compname = stripslashes($_REQUEST['compname']);
$clientname = stripslashes($_REQUEST['cn']);
$email = stripslashes($_REQUEST['email']);
$phone = stripslashes($_REQUEST['ph']);
$altcname= stripslashes($_REQUEST['altcname']);
$altcmail= stripslashes($_REQUEST['altcmail']);
$altcnum= stripslashes($_REQUEST['altcnum']);
$addr1 = stripslashes($_REQUEST['addr1']);
$addr2 = stripslashes($_REQUEST['addr2']);
$addr3 = stripslashes($_REQUEST['addr3']);
$state = stripslashes($_REQUEST['state']);
$country = stripslashes($_REQUEST['country']);
$pincode = stripslashes($_REQUEST['pin']);
$fax = stripslashes($_REQUEST['fax']);
$website = stripslashes($_REQUEST['website']);
$sql="select * from customer";
$s=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($s,MYSQL_ASSOC))
{
	//ECHO"HI";
	if($email==$row['email_id'])
	{
	echo"
		<script>
		alert('sorry customer with this already exists...');
        window.location.href='customer.php';
        </script>";
	}
}	

//$sql="INSERT INTO customer VALUES (''$clientcode,'$compname','$clientname','$email','$phone','$addr1','$addr2','$addr3','$altcname','$altcnum',$state','$country','$pincode','$fax','$website')";
$sql="INSERT INTO customer(`client_code`, `company_name`, `client_name`, `email_id`, `phone`, `address1`, `address2`, `address3`,`alt_cname`, `alt_cnum`, `alt_cmail`, `state`, `country`, `pincode`, `fax`, `website`) 
VALUES ('$clientcode','$compname','$clientname','$email','$phone','$addr1','$addr2','$addr3','$altcname','$altcnum','$altcmail','$state','$country','$pincode','$fax','$website')";


if (mysqli_query($link, $sql)) {
    echo "<script>
      alert('Registered successfully');
      window.location.href='customer.php?success';

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
        <a class="navbar-brand" href="#" >Feenix</a>
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
			  <li class="nav-item">
			  <a class="nav-link" href="login.php">loggoff
			  <span class="glyphicon glyphicon-off"></span> </a>
			  </li>
          </ul>
        </div>
      </nav>

    <!-- Customer Registraion -->
    <div class = "container">
        <div class = "customer">
          <div class = "customer-form">
            <form name="customeregistration" action="" method="post">
                <h3>Customer Registeration</h3>
                <!-- Client Code and Client Name -->
                <div class="row">
                  <div class="col">
                      <input type="text" class="form-control" name="cc" placeholder="Client Code*" required>
                  </div>
                  <div class="col">
                      <input type="text" class="form-control" name="cn" placeholder="Client Name*"  required>
                  </div>
                </div>
                <br />
                <!-- Email and Phone -->
                <div class="row">
                  <div class="col">
                      <input type="text" class="form-control" name="email" placeholder="Email ID*" required>
                  </div>
                  <div class="col">
                      <input type="number" class="form-control" name="ph" placeholder="Phone*" required>
                  </div>
                </div>
                <!-- Company Name and Alternate Person -->
                <br />
                <div class="row">
                  <div class="col">
                      <input type="text" class="form-control" name="compname" placeholder="Company Name*" required>
                  </div>
                  <div class="col">
                      <input type="text" class="form-control" name="altcname" placeholder="Alternate Contact Person">
                  </div>
                </div>
                <!-- Alternate Email and Alternate Number -->
                <br />
                <div class="row">
                  <div class="col">
                      <input type="text" class="form-control" name="altcmail" placeholder="Alternate Contact Email">
                  </div>
                  <div class="col">
                      <input type="number" class="form-control" name="altcnum" placeholder="Alternate Contact Number">
                  </div>
                </div>
                 <!-- Address 1-->
                 <br />
                 <div class="row">
                   <div class="col">
                       <textarea type="text" row = "4" class="form-control" name="addr1" required placeholder="Address 1*"></textarea>
                   </div>
                 </div>
                 <!-- Address 2-->
                 <br />
                 <div class="row">
                   <div class="col">
                    <textarea type="text" row = "4" class="form-control" name="addr2" required placeholder="Address 2*"></textarea>
                  </div>
                 </div>
                 <!-- Address 3-->
                 <br />
                 <div class="row">
                   <div class="col">
                    <textarea type="text" row = "4" class="form-control" name="addr3" placeholder="Address 3"></textarea>
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
                </div>
                 <!-- Pincode and Fax -->
                 <br />
                 <div class="row">
                   <div class="col">
                       <input type="number" class="form-control" name="pin" placeholder="Pincode*" required>
                   </div>
                   <div class="col">
                       <input type="text" class="form-control" name="fax" placeholder="Fax">
                   </div>
                 </div>
                  <!-- Website-->
                  <br />
                  <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="website" placeholder="Website">
                    </div>
                  </div>
                   <!-- Submit button-->
                   <br />
                   <!-- <div class="row">
                     <div class="col"> -->
                      <button type="submit" class="btn btn-primary submit">Submit</button>                     </div>
                   <!-- </div> -->
            </form>
          </div>
		  <br />
          <br />
		  <!-- Tables -->
         <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Client Code</th>
                  <th>Client Name</th>
                  <th>Company Name</th>
                  <th>Contact Number</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
		  <?php
                           // require_once 'connection.php';
                            
                            $conn = mysqli_connect("localhost","root","","fenix");
                            if($conn-> connect_error) {
                                die("connection failed:" .$conn-> connect_error);
                            }
                            $sql = "SELECT * from customer";
                            $result =  $conn ->query($sql);
                             if( $result->num_rows > 0 ){
                                while ($row = $result ->fetch_assoc()) {
                        
                                   echo "<tr><td>".$row["id"]."</td>"."<td>".$row["client_code"]."</td>"."<td>".$row["client_name"]."</td>"."<td>".$row["company_name"]."</td>"."<td>".$row["phone"]."</td>"."</td>";
                                                
 echo '<td><button type="button" class="btn btn-outline btn-primary data-toggle="modal" data-target="#myedit" ><b><font color="#fff"><a href="cuse.php?id=' . $row['id'] . '" style="color:white;">EDIT</a></b></button>';											  
                     
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