<?php
	include 'dbcon.php';
	extract($_POST);
	$query = "INSERT INTO user_auth VALUES('".$name."','".$id."','".$pwd."','".$email."','".$locality."',0)";
	try{
		mysqli_query($con,$query);
		?>
		<script>
		window.open("index.php","_self");
		</script>
			<?php
	}
	catch(Exception $e)
	{
		return 'There was some error!';
	}
?>