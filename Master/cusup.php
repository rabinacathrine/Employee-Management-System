<?php
	include('config.php');
	$id=$_GET['id'];
	//$firstname=$_POST['productname'];
    //$lastname=$_POST['company'];
    $conn = mysqli_connect("localhost","root","","fenix");
    //$roomid = $_POST['roomid'];
	
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

    $query= "UPDATE customer SET client_code='$ccode', client_name='$cname', email_id='$email', phone='$phone', address1='$address1',address2='$address2', address3='$address3', alt_cname='$alt_cname', alt_cmail='$alt_cmail', alt_cnum='$alt_cnum',state='$state', country='$country', pincode='$pincode', fax='$fax', website='$website' where id='$id'";
	$result = mysqli_query($conn,$query);
    if($result)
    {
        ?>
      <script>
      alert('Updated successfully');
      window.location.href='customer.php?success';

                   </script>
        <?php
    
    }
     else{
         ?>
        <script>
        alert('SORRYY !!!! Unsuccessfull');
                       </script>
      
    <?php
        }
    
    ?>

	