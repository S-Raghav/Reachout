<?php
session_start();
include 'dbcon.php';
extract($_POST);
$query = "insert into bids values('".$bidder_id."','".$post_id."',".$bid_value.",0)";
$res = mysqli_query($con,$query);
if($res==TRUE)
{
	?>
			<script>
			window.open("jobfeed.php","_self");
			</script>
			<?php
}
else
echo "ERROR!".$query;
?>