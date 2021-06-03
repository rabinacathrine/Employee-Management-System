<?php
// Range.php
if(isset($_POST["From"], $_POST["to"]))
{
	$conn = mysqli_connect("localhost", "root", "", "fenix");
	$result = '';
	$query = "SELECT * FROM feedback WHERE communication_date BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
	$sql = mysqli_query($conn, $query);
	$result .='
	<table class="table table-bordered">
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

	</tr>';
	if(mysqli_num_rows($sql) > 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
			$result .='
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
	<td><?php echo $row["remarks"]; ?></td></tr>';
		}
	}
	else
	{
		$result .='
		<tr>
		<td colspan="5">No record Found</td>
		</tr>';
	}
	$result .='</table>';
	echo $result;
}
?>