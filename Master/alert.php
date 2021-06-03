<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../style.css">
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
            <li class="nav-item dropdown">
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
              <a class="nav-link" href="feedback.php">FeedBack</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dailyreport.php">Daily Report<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="alert.php">Alert</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="report.php">Overall Report</a>
              </li>
          </ul>
        </div>
      </nav>
	  
	  
	  

             <!-- Tables -->
			 <center><h3>Alert</h3></center>
			 <div class=count>
			Total Number Of Clients    : <?php
$sel_new_usr=mysqli_query($link,"select count(id) as cou_usr from customer ");
		$fet_new_usr=mysqli_fetch_array($sel_new_usr);	//count  user
		echo $fet_new_usr['cou_usr'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
			
	Response Positive   :<?php $sel_pos=mysqli_query($link,"select count(status_of_com) as cou_sts from feedback ");
		$fet_pos=mysqli_fetch_array($sel_pos);	//count  user
		    echo $fet_pos['cou_sts'];
?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Response Negative   :<?php $sel_neg=mysqli_query($link,"select count(status_of_com) as cou_neg from feedback ");
		$fet_neg=mysqli_fetch_array($sel_neg);	//count  user
		    echo $fet_neg['cou_neg'];
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
No of Client Response    :<?php /*$sel_pos=mysqli_query($link,"select count(status_of_com) as cou_sts from feedback ");
		$fet_pos=mysqli_fetch_array($sel_pos);	//count  user
		    echo $fet_pos['cou_sts'];*/
?>
			</div>
         <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Executive Code</th>
                  <th>Executive Name</th>
				  <th>Client Code</th>
				  <th>Client Name</th>
				  <th>Communication Date</th>
				  <th>Mode of Communication</th>
					<th>Status of communication</th>
					<th>Appointment Date</th>
					<th>Alert Date</th>
					<th>FeedBack</th>
					<th>Client Requirements</th>
					<th>Remarks</th>
                 </tr>
          </thead>
          <tbody>
              <?php
                         
                            $conn = mysqli_connect("localhost","root","","fenix");
                            if($conn-> connect_error) {
                                die("connection failed:" .$conn-> connect_error);
                            }
                            $sql = "SELECT * from feedback";
                            $result =  $conn ->query($sql);
                             if( $result->num_rows > 0 ){
                                while ($row = $result ->fetch_assoc()) {
                        
                                   echo "<tr><td>".$row["id"]."</td>"."<td>".$row["executive_code"]."</td>"."<td>".$row["executive_name"]."</td>" ."<td>".$row["client_code"]."</td>"."<td>".$row["client_name"]."</td>"."<td>".$row["communication_date"]."</td>"."<td>".$row["mocom"]."</td>"."<td>".$row["status_of_com"]."</td>"."<td>".$row["appointment_date"]."</td>"."<td>".$row["alert_date"]."</td>"."<td>".$row["feedback"]."</td>"."<td>".$row["client_req"]."</td>"."<td>".$row["remarks"]."</td>"."</td>";
                                                /*echo '<td><button type="button" class="btn btn-outline btn-primary data-toggle="modal" data-target="#myedit" ><b><font color="#fff">EDIT</a></b></button>';
                                                                                                                                                                           
                               echo '<button type="butoon" class="btn btn-outline btn-danger ><b><font color="#fff">Delete</a></font></b></button></td>';
                                   echo '</tr>';*/
                                   

                                    
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
        <!-- tables end --><!-- tables end -->
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