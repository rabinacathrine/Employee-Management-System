<?php
include("config.php");

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
                  <a class="dropdown-item" href="customer.php">Customer Registeration</a>
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

	  <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                                   </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <!-- Welcome -->



                <?php
// including the database connection file
//include_once("connection.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $execcode = $_POST['ec'];
    $execname = $_POST['execname'];
    $email = $_POST['email'];
    $phone1 = $_POST['ph1'];
    $phone2 = $_POST['ph2'];
    $pass = $_POST['pass'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $address3 = $_POST['address3'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$pincode = $_POST['pin'];
    /*$name=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email'];  */  
    
    // checking empty fields
if(empty($execcode) || empty($execname) || empty($email) || empty($phone1) || empty($phone2) || empty($pass) || empty($address1) || empty($address2) || empty($address3) || empty($state) || empty($country) || empty($pincode)) {    
      echo "<font color='red'> field is empty.</font><br/>";   
             
    } else {    
        //updating the table
        $sql = "UPDATE executive SET executive_code=:execcode, executive_name=:execname, email_id=:email, password=:pass, phone1=:phone1, phone2=:phone2, address1=:address1, address2=:address2, address3=:address3, state=:state, country=:country, pincode=:pincode WHERE id=:id";
        $query = $dbConn->prepare($sql);
                
        $query->bindparam(':id', $id);
        $query->bindparam(':executive_code', $execcode);
        $query->bindparam(':executive_name', $execname);
        $query->bindparam(':password', $pass);
        $query->bindparam(':phone1', $ph1);
        $query->bindparam(':phone2', $ph2);
        $query->bindparam(':address1', $address1);
        $query->bindparam(':address2', $address2);
        $query->bindparam(':address3', $address3);
        $query->bindparam(':state', $state);
		$query->bindparam(':country', $country);
		$query->bindparam(':pincode', $pincode);
        $query->execute();
        
        header("Location: executive.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
$conn = mysqli_connect("localhost","root","","fenix");
$sql = "SELECT * from executive where id='$id'";
$result =  $conn ->query($sql);
                                                    

 while ($row = $result ->fetch_assoc()) 
 {
    $execcode = $row['executive_code'];
    $execname = $row['executive_name'];
    $email = $row['email_id'];
    $phone1 = $row['phone1'];
    $phone2 = $row['phone2'];
    $pass = $row['password'];
    $address1 = $row['address1'];
    $address2 = $row['address2'];
    $address3 = $row['address3'];
	$state = $row['state'];
    $country = $row['country'];
    $pincode = $row['pincode'];

}
?>
	  
	  
	  
	  
	  
    <!-- Executive  Registraion -->
    <div class = "container">
        <div class = "executive">
          <div class = "form-group">
<form name="form1" method="POST" action="exup.php?id=<?php echo $id; ?>">
                <h3>Edit Executive</h3>
                <!-- Executive Code and Executive Name -->
                <div class="row">
                  <div class="col">
                      <input type="text" class="form-control" name="ec" placeholder="Executive Code*" value="<?php echo $execcode?>">
                  </div>
                  <div class="col">
                      <input type="text" class="form-control" name="execname" placeholder="Executive Name*" value="<?php echo $execname?>">
                  </div>
                </div>
                <br />
                <!-- Email and Phone -->
                <div class="row">
                  <div class="col">
                      <input type="text" class="form-control" name="email" placeholder="Email ID*" value="<?php echo $email?>">
                  </div>
                  <div class="col">
                      <input type="number" class="form-control" name="ph1" placeholder="Phone*" value="<?php echo $phone1?>">
                  </div>
                </div>
                <!-- Phone 2 and Password -->
                <br />
                <div class="row">
                  <div class="col">
                      <input type="number" class="form-control" name="ph2" placeholder="Phone-2" value="<?php echo $phone2?>">
                  </div>
                  <div class="col">
                      <input type="password" class="form-control" name="pass" placeholder="Password*" value="<?php echo $pass?>">
                  </div>
                </div>
                 <!-- Address 1-->
                 <br />
                 <div class="row">
                   <div class="col">
                       <textarea type="text" row = "4" class="form-control" name="address1" placeholder="Address 1" value="<?php echo $address1?>"></textarea>
                   </div>
                 </div>
                 <!-- Address 2-->
                 <br />
                 <div class="row">
                   <div class="col">
                    <textarea type="text" row = "4" class="form-control" name="address2" placeholder="Address 2*" value="<?php echo $address2?>"></textarea>
                  </div>
                 </div>
                 <!-- Address 3-->
                 <br />
                 <div class="row">
                   <div class="col">
                    <textarea type="text" row = "4" class="form-control" name="address3" placeholder="Address 3" value="<?php echo $address3?>"></textarea>
                  </div>
                 </div>
                  <!-- State and Country -->
                <br />
                <div class="row">
                  <div class="col">
                      <input type="text" class="form-control" name="state" placeholder="State*" value="<?php echo $state?>">
                  </div>
                  <div class="col">
                      <input type="text" class="form-control" name="country" placeholder="Country*" value="<?php echo $country?>">
                  </div>
                  <div class="col">
                    <input type="number" class="form-control" name="pin" placeholder="Pincode*" value="<?php echo $pincode?>">
                </div>
                </div>
                   <!-- Submit button-->
                   <br />
				    <input type="hidden" name="id" value="<?php echo $id=$_GET['id'] ?>">
                <input type="submit" name="submit" >
                    <!--<button type="submit" class="btn btn-primary submit">Submit</button>-->
            </form>
          </div>
		  <br />
          <br />
        
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











        
               