<?php
	session_start();
	include 'dbcon.php';
	extract($_POST);
	$query = "select * from user_auth where id='".$id."' and password='".$pwd."'";
	try{
		$res=mysqli_fetch_array(mysqli_query($con,$query));
		if($res)
		{	
			$_SESSION['id'] = $res['id'];
			$_SESSION['reliability'] = $res['reliability'];
			?>
			<script>
			window.open("jobfeed.php","_self");
			</script>
			<?php
		}
		else
			echo "wrong username/password";
	}
	catch(Exception $e)
	{
		return 'There was some error!';
	}
?>