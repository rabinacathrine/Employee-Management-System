<?php
	include('config.php');
	$id=$_GET['id'];
	//$firstname=$_POST['productname'];
    //$lastname=$_POST['company'];
    $conn = mysqli_connect("localhost","root","","fenix");
    //$roomid = $_POST['roomid'];
	
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

    $query= "UPDATE executive SET executive_code='$execcode', executive_name='$execname', email_id='$email', phone1='$phone1', phone2='$phone2', password='$pass',address1='$address1',address2='$address2', address3='$address3', state='$state', country='$country', pincode='$pincode' where id='$id'";
	$result = mysqli_query($conn,$query);
    if($result)
    {
        ?>
      <script>
      alert('Registered successfully');
      window.location.href='executive.php?success';

                   </script>
        <?php
    
    }
     else{
         ?>
        <script>
        alert('SORRYY !!!! Unsuccessfull Attempt');
                       </script>
      
    <?php
        }
    
    ?>

	