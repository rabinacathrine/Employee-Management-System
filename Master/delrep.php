<?php
//require_once 'Master/config.php';
$conn = mysqli_connect("localhost", "root", "", "fenix");
$query = "SELECT * FROM feedback ORDER BY order_number desc";
$sql = mysqli_query($conn, $query);
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
	
	<!----range--->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
<!-- range--->
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
	  
	  
	  <div class="container">
<br/>
<br/>
<div class="col-md-2">
<input type="text" name="From" id="From" class="form-control" placeholder="From Date"/>
</div>
<div class="col-md-2">
<input type="text" name="to" id="to" class="form-control" placeholder="To Date"/>
</div>
<div class="col-md-8">
<input type="button" name="range" id="range" value="Range" class="btn btn-success"/>
</div>
<div class="clearfix"></div>
<br/>
<div id="purchase_order">
 <table id="example" class="table table-striped table-bordered" style="width:100%">
<!-- <table class="table table-bordered">-->
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
<!--
<th width="10%">Order Number</th>
<th width="35%">Customer Name</th>
<th width="40%">Purchased Item</th>
<th width="10%">Purchased Date</th>
<th width="5%">Price</th>
</tr>
-->
<?php
while($row= mysqli_fetch_array($sql))
{
	?>
    <tr>
	<td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["executive_code"]; ?></td>
    <td><?php echo $row["executive_name"]; ?></td>
    <td><?php echo $row["client_code"]; ?></td>
    <td><?php echo $row["client_name"]; ?></td>
	<td><?php echo $row["communication_date"]; ?></td>
	<td><?php echo $row["mocom"]; ?></td>
	<td><?php echo $row["status_of_com"]; ?></td>
	<td><?php echo $row["appointment_date"]; ?></td>
	<td><?php echo $row["alert_date"]; ?></td>
	<td><?php echo $row["feedback"]; ?></td>
	<td><?php echo $row["client_req"]; ?></td>
	<td><?php echo $row["remarks"]; ?></td>
    </tr>
    <?php
}
?>
</table>
</div>
</div>

<script src = "../assets/bootstrap/jquery.min.js"></script>
      <script src = "../assets/bootstrap/js/bootstrap.min.js"></script>
      
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<!-- Script -->
<script>
$(document).ready(function(){
	$.datepicker.setDefaults({
		dateFormat: 'yy-mm-dd'
	});
	$(function(){
		$("#From").datepicker();
		$("#to").datepicker();
	});
	$('#range').click(function(){
		var From = $('#From').val();
		var to = $('#to').val();
		if(From != '' && to != '')
		{
			$.ajax({
				url:"ran.php",
				method:"POST",
				data:{From:From, to:to},
				success:function(data)
				{
					$('#purchase_order').html(data);
				}
			});
		}
		else
		{
			alert("Please Select the Date");
		}
	});
});
</script>

 <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
      </script>
		 
   
</body>
</html>