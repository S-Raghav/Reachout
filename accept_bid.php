<?php
session_start();
include 'dbcon.php';
extract($_POST);
$query = "update bids set status=1 where poster_id='".$bidder_id."' and post_id='".$post_id."' and bid_value=".$bid_value;
$res = mysqli_query($con,$query);
$query = "update user_auth set reliability=reliability+1 where id='".$bidder_id."'";
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