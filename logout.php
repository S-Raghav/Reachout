<?php
	session_start();
	try{	
			session_destroy();
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