<?php
	session_start();
	include 'dbcon.php';
	extract($_POST);
	$query = "insert into posts values ('".$type."','".$_SESSION['id']."','".$content."','".$highest_bid."','".$domain."','".$post_id."',0)";
	try{
		$res=mysqli_query($con,$query);
		mysqli_commit($con);
		if($required!=0){
		$query = "insert into grievance values('".$post_id."',".$required.",0)";
		$res=mysqli_query($con,$query);
		mysqli_commit($con);
		}
		if($res)
		{	
			?>
			<script>
			window.open("jobfeed.php","_self");
			</script>
			<?php
		}
		else
			echo "Uh oh!!!Something went wrong";
	}
	catch(Exception $e)
	{
		return 'There was some error!';
	}
?>