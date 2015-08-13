<?php include 'header.php' ;
include 'dbcon.php';
$query = "SELECT * from user_auth WHERE id = '" . $_SESSION['id'] . "'";
$res = mysqli_query($con, $query);
if($res == TRUE){
        $res = mysqli_fetch_array($res);
?>
<div class="col-md-8 col-md-offset-2 table-bordered clearfix" >
<p class="lead"><em>Hey <?php echo $_SESSION['id'] ?><em>, Here's What you told us </p>
<p><strong>Your Name:</strong><?php echo $res['name'] ?></p>
<p><strong>Your Primary Email:</strong><?php echo $res['email'] ?></p>
<p><strong>Where you're from:</strong><?php echo $res['locality'] ?></p>
</div>

<?php
}
else
  echo "An ERROR occured!";?>
<?php include 'footer.php' ?>