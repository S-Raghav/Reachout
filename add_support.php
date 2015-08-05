<?php
session_start();
include 'dbcon.php';
extract($_POST);
$query = "select * from supporters where post_id='".$post_id."' and supporter='".$_SESSION['id']."'";
$res = mysqli_query($con,$query);
if(mysqli_num_rows($res)==0){
$query = "update grievance set current=current+1 where post_id='".$post_id."'";
$res = mysqli_query($con,$query);
mysqli_commit($con);
$query="insert into supporters values('".$post_id."','".$_SESSION['id']."')";
$res = mysqli_query($con,$query);
mysqli_commit($con);
}
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