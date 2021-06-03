<?php
if (isset($_POST['submit']))
  {
  include ("config.php");
 
$execcode =$_POST['ec'];
$execname =$_POST['execname'];
$clientcode=$_POST['cc'];
$clientname=$_POST['cname'];
$comdate=$_POST['comdate'];
$mcomm=$_POST['mocom'];
$stscomm=$_POST['sc'];
$aptdt=$_POST['appdt'];
$alert=$_POST['alrt'];
$feedback=$_POST['fb'];
$clntreq=$_POST['clreq'];
$remarks=$_POST['rmrks'];
  $response = array();                      
  $query = mysqli_query($con, "INSERT INTO `feedback`(`executive_code`, `executive_name`, `client_code`, `client_name`, `communication_date`, `mocom`, `status_of_com`, `appointment_date`, `alert_date`, `feedback`, `client_req`, `remarks`)  
VALUES ('$execcode','$execname','$clientcode','$clientname','$comdate','$mcomm','$stscomm','$aptdt','$alert','$feedback','$clntreq','$remarks')"); 
  
/*if($query){
  $response['success'] = 'true';
  $response['message'] = 'Data Inserted Successfully';
}else{
  $response['unsuccess'] = 'false';
  $response['message'] = 'Data Insertion Failed';
}

echo json_encode($response);
}*/



if (mysqli_query($link, $query)) {
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>

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
                  <a class="dropdown-item" href="customer.htm">Customer Registeration</a>
                  <a class="dropdown-item" href="executive.php">Executive Registeration</a>
                  <a class="dropdown-item" href="communication.php">Mode of Communication</a>
                </div>
              </li>
            <li class="nav-item active">
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

    <!-- feedback -->
    <div class = "container">
        <div class = "executive">
          <div class = "executive-form">
                        <form name="feedbackform" action="" method="post">
                <h3>FeedBack</h3>
                <!-- feedback -->
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
                      <input type="text" class="form-control" name="cc" placeholder="clientcode*" required>
                  </div>
                  <div class="col">
                      <input type="number" class="form-control" name="cname" placeholder="clientname*" required>
                  </div>
                </div>
                <!-- Phone 2 and Password -->
                <br />
                <div class="row">
                  <div class="col">
                      <input type="date" class="form-control" name="comdate" placeholder="Phone-2">
                  </div>
                  <div class="col">
                      <input type="password" class="form-control" name="mocom" placeholder="mocom" required>
                  </div>
                </div>
                 <!-- Address 1-->
                 <br />
                 <div class="row">
                   <div class="col">
                       <textarea type="text" row = "4" class="form-control" name="stscom" placeholder="status of communication" required></textarea>
                   </div>
                 </div>
                 <!-- Address 2-->
                 <br />
                 <div class="row">
                   <div class="col">
                    <textarea type="date"  class="form-control" name="aptdt" placeholder="Appointment date" required></textarea>
                  </div>
                 </div>
                 <!-- Address 3-->
                 <br />
                 <div class="row">
                   <div class="col">
                    <textarea type="date" class="form-control" name="alert" placeholder="Alert" required></textarea>
                  </div>
                 </div>
                  <!-- State and Country -->
                <br />
                <div class="row">
                  <div class="col">
                      <input type="text" class="form-control" name="clntreq" placeholder="clientrequirements" required>
                  </div>
                  <div class="col">
                      <input type="text" class="form-control" name="remarks" placeholder="remarks" required>
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
                                                echo '<td><button type="button" class="btn btn-outline btn-primary data-toggle="modal" data-target="#myedit" ><b><font color="#fff">EDIT</a></b></button>';
                                                                                                                                                                           
                               echo '<button type="butoon" class="btn btn-outline btn-danger ><b><font color="#fff">Delete</a></font></b></button></td>';
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