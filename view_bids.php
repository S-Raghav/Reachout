<?php include 'header.php' ;
include 'dbcon.php'?>
<div class="col-md-8 col-md-offset-2 table-bordered" >
<?php 
extract($_GET);
$query="select * from bids where post_id=".$pid;
$rows=0;
$post_id='';
if($res=mysqli_query($con,$query))
 {
  $rows = mysqli_num_rows($res);
  }
?>
<p class="lead text-primary"><strong ><?php echo $rows ?></strong> Bid(s)</p>
<table class="table table-bordered">

<tr>
	<th>Bidder</th>
	<th >Bid</th>
	</tr>
<?php 
$res=mysqli_query($con,$query);
if($res)
while($detail=mysqli_fetch_array($res))
{	
	?>
	<form role="form" action='accept_bid.php' method='POST'>
<input type="hidden" name='post_id' value='<?php echo $detail['post_id']; ?>' />
<input type="hidden" name='poster_id' value='<?php echo $detail['bidder_id']; ?>' />
<input type="hidden" name='bid_value' value='<?php echo $detail['bid_value']; ?>' />
	<tr>
	<td >
		<?php echo $detail['bidder_id'] ?>
	</td>
	<td >
		<?php echo $detail['bid_value'] ?>
	
	<?php 
	if($detail['poster_id']!=$_SESSION['id'] and $detail['status']==0){
		?>
	<button class="btn btn-success pull-right">
	<span class=" glyphicon glyphicon-ok "></span>
	<?php }
		if($detail['status']==1)
		{ ?>
	<span class="text-success pull-right glyphicon glyphicon-ok "></span>
	</button>
	</tr>
	</form>
<?php
	}
  } ?>

</table>
</div>
<?php include 'footer.php' ?>