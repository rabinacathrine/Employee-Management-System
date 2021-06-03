<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../style.css">
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>-->
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
              <a class="nav-link" href="feedback.php">FeedBack</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dailyreport.php">Daily Report<span class="sr-only">(current)</span></a>
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
    

	
	<!------------------------------------------------------------------------------------------------------------->
	<?php
	if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $conn = mysqli_connect("localhost","root","","fenix");
	$ccode = $_POST['client_code'];
    $cname = $_POST['client_name'];
    $company = $_POST['company_name'];
    $email = $_POST['email_id'];
    $phone = $_POST['phone'];
    $address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$address3 = $_POST['address3'];
    $alt_cname = $_POST['alt_cname'];
    $alt_cmail = $_POST['alt_cmail'];
	$alt_cnum= $_POST['alt_cnum'];
	$state = $_POST['state'];
    $country = $_POST['country'];
	$pincode = $_POST['pincode'];
	$fax = $_POST['fax'];
	$website = $_POST['website'];


    if(empty($ccode) || empty($cname) || empty($company) || empty($email) || empty($phone) || empty($address1) || empty($address2) || empty($address3) || empty($alt_cname)) {    
      echo "<font color='red'> field is empty.</font><br/>";   
           
    } else {    
        //updating the table
       // $sql = "UPDATE products SET pname=:pname, company=:company, category=:category, price=:price, dosage=:dosage, prescriptionrequired=:prescrib, SKU=:SKU, expirydate=:expirydate, stock=:stock WHERE id=:productid";
$sql="UPDATE customer SET client_code=:ccode, client_name=:cname, company_name=:company, email_id=:email, phone=:phone, address1=:address1, alt_cname=:alt_cname, alt_cmail=:alt_cmail, alt_cnum=:alt_cnum, state=:state, country=:country, pincode=:pincode, fax=:fax, website=:website WHERE id=:id";       
	   $query = $dbConn->prepare($sql);
	   
	   $query->bindparam(':id', $id);
        $query->bindparam(':client_code', $ccode);
        $query->bindparam(':client_name', $cname);
        $query->bindparam(':company', $company);
        $query->bindparam(':email_id', $email);
        $query->bindparam(':phone', $phone);
        $query->bindparam(':address1', $address1);
		$query->bindparam(':address2', $address2);
		$query->bindparam(':address3', $address3);
        $query->bindparam(':alt_cname', $alt_cname);
        $query->bindparam(':alt_cmail', $alt_cmail);
		$query->bindparam(':alt_cnum', $alt_cnum);
		$query->bindparam(':state', $state);
		$query->bindparam(':country', $country);
		$query->bindparam(':pincode', $pincode);
		$query->bindparam(':fax', $fax);
        $query->bindparam(':website', $website);
        $query->execute();
        
                
                
        //redirectig to the display page. In our case, it is index.php
        header("Location: customer.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
$conn = mysqli_connect("localhost","root","","fenix");
$sql = "SELECT * from customer where id='$id'";
$result =  $conn ->query($sql);
                            
 
//$conn = mysqli_connect("localhost","root","","harihara_medicals");
//$query=mysqli_query($conn,"select * from `products` where productid='$id'");
//$row=mysqli_fetch_array($query);
//selecting data associated with this particular id
/*$sql = "SELECT * FROM products WHERE id=:id";
$result =  $con->query($sql);
//$query = $conn->prepare($sql);
$result->execute(array(':id' => $id));*/
                               // while ($row = $result ->fetch_assoc()) {
                        

 while ($row = $result ->fetch_assoc()) 
 {
    $ccode = $row['client_code'];
    $cname = $row['client_name'];
    $company = $row['company_name'];
    $email = $row['email_id'];
    $phone = $row['phone'];
    $address1 = $row['address1'];
	$address2 = $row['address2'];
	$address3 = $row['address3'];
    $alt_cname = $row['alt_cname'];
    $alt_cmail = $row['alt_cmail'];
	$alt_cnum= $row['alt_cnum'];
	$state = $row['state'];
    $country = $row['country'];
	$pincode = $row['pincode'];
	$fax = $row['fax'];
	$website = $row['website'];

}
?>
                
 <div class = "container">
        <div class = "customer">
          <div class = "customer-form">
		  <form name="form1" method="POST" action="cusup.php?id=<?php echo $id; ?>">
                <h3>Edit Customer</h3>
                <!-- Client Code and Client Name -->
                <div class="row">
                  <div class="col">
                      <input type="text" class="form-control" name="ccode" value="<?php echo $ccode?>">
                  </div>
                  <div class="col">
                      <input type="text" class="form-control" name="cname" value="<?php echo $cname?>">
                  </div>
                </div>
                <br />
                <!-- Email and Phone -->
                <div class="row">
                  <div class="col">
                      <input type="text" class="form-control" name="email" value="<?php echo $email?>">
                  </div>
                  <div class="col">
                      <input type="number" class="form-control" name="phone" value="<?php echo $phone?>">
                  </div>
                </div>
                <!-- Company Name and Alternate Person -->
                <br />
                <div class="row">
                  <div class="col">
                      <input type="text" class="form-control" name="company" value="<?php echo $company?>">
                  </div>
                  <div class="col">
                      <input type="text" class="form-control" name="alt_cname" value="<?php echo $alt_cname?>">
                  </div>
                </div>
                <!-- Alternate Email and Alternate Number -->
                <br />
                <div class="row">
                  <div class="col">
                      <input type="text" class="form-control" name="alt_cmail" value="<?php echo $alt_cmail?>">
                  </div>
                  <div class="col">
                      <input type="number" class="form-control" name="altcnum" value="Alternate Contact Number" value="<?php echo $alt_cnum?>">
                  </div>
                </div>
                 <!-- Address 1-->
                 <br />
                 <div class="row">
                   <div class="col">
                       <textarea type="text" row = "4" class="form-control" name="address1" value="<?php echo $address1?>"></textarea>
                   </div>
                 </div>
                 <!-- Address 2-->
                 <br />
                 <div class="row">
                   <div class="col">
                    <textarea type="text" row = "4" class="form-control" name="address2"  placeholder="Address 2*" value="<?php echo $address2?>"></textarea>
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
                </div>
                 <!-- Pincode and Fax -->
                 <br />
                 <div class="row">
                   <div class="col">
                       <input type="number" class="form-control" name="pin" placeholder="Pincode*" value="<?php echo $pincode?>">
                   </div>
                   <div class="col">
                       <input type="text" class="form-control" name="fax" placeholder="Fax" value="<?php echo $fax?>">
                   </div>
                 </div>
                  <!-- Website-->
                  <br />
                  <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="website" placeholder="<?php echo $website?>">
                    </div>
                  </div>
                   <!-- Submit button-->
                   <br />
                   <!-- <div class="row">
                     <div class="col"> -->
					 <input type="hidden" name="id" value="<?php echo $id=$_GET['id'] ?>">
					<!-- <input type="submit" name="submit" >-->
                      <button type="submit" name="submit" class="btn btn-primary submit">Update</button> 
					                 
					  </div>
                   <!-- </div> -->
            </form>
          </div>
		  <br />
          <br />
	                
                      
<!--<center><a href="addadmin.php"><i class="fa fa-edit fa-fw"></i> ADD</a>-->
    
               
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























