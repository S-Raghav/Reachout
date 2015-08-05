<?php
session_start();
include 'dbcon.php';
extract($_GET);
$query = "delete from posts where post_id='".$post_id."'";
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