<?php include 'header.php'; 
include 'dbcon.php';?>
<script>

function get_bid(money)
{	
	var res = prompt('Enter bid value in Rs.' ,money);
	document.getElementById('bid').value=res;
	return false;
}
</script>

<div class="col-md-8 col-md-offset-2 table-bordered " >
<br/>
<p class="lead text-primary">Here is a list of things you may be interested in 
<a class="btn btn-info pull-right" href="post.php">Post something</a>
</p>
<br/>
<?php
$query = "select * from posts order by post_id desc";
$res=mysqli_query($con,$query);
$i = 0;//for id generation

if($res==TRUE)

while($detail=mysqli_fetch_array($res))
{   
   if($detail['poster_id']==$_SESSION['id']){
 ?>

 <a class="btn btn-sm pull-right" href="remove_post.php?post_id=<?php echo $detail['post_id'] ?>">
 <span class="glyphicon glyphicon-remove  text-danger"></span></a><br/><br/>
<?php } ?>
 <div class="clearfix">
 <?php 
	$query = "select * from bids where post_id='".$detail['post_id']."'" ;
    $r1=mysqli_query($con,$query);
	
	if($r1==TRUE){
		$r = mysqli_fetch_array($r1);
		if($r['status']==1){
?>
<span class=" glyphicon glyphicon-ok text-success"></span>
<?php }
else if($r['status']!='' and $r['status']==0){ ?>
<span class=" glyphicon glyphicon-ok text-danger"></span>
<?php }
    } ?>

 <img src="dp.jpg">
<strong class="col-md-offset-3"> <?php echo $detail['poster_id'] ?></strong> posted a 
<?php echo $detail['type'] ?> in <em><?php echo $detail['domain'] ?></em>
<?php if($detail['type']=='grievance') {
 $query = "select * from grievance where post_id='".$detail['post_id']."'";
$r1=mysqli_query($con,$query);
$required = 1;
$current=0;
if($r1==TRUE)
{
$ppl=mysqli_fetch_array($r1);
$required = $ppl['required'];
if($ppl['current']!=0)
$current = ($ppl['current']*100/$ppl['required']);
}
 ?>
 <form action="add_support.php" method='POST'>

<button class="btn btn-danger pull-right " onclick="alert('Thank you for your support!')">
<span class="glyphicon glyphicon-road"></span>
</button>
 <input type="hidden" name='post_id' value='<?php echo $detail['post_id'] ?>' />
<br/>
<div class="progress">
<div class="progress-bar progress-bar-info progress-bar-striped" 
    aria-valuenow='<?php echo $current ?>'
	aria-valuemin=0 
    aria-valuemax='<?php echo $required ?>'
	style="min-width:4em;width:<?php echo $current ?>%">
	<?php echo $current ?>%
</div>
</div>
</form>
<?php }else{ ?>
<div class="pull-right">
<form action="bid.php" method="POST" >
<input type="hidden" name='poster_id' value='<?php echo $_SESSION['id'] ?>' />
<input type="hidden" name='post_id' value='<?php echo $detail['post_id'] ?>' />
<input type="hidden" name='bid_value' id='bid' />
<button class="btn btn-success" onclick="get_bid('<?php echo $detail['highest_bid'] ?>')">
Rs.<?php echo $detail['highest_bid'] ?>
</button>
</form><br/>

<a class="btn btn-info" href="view_bids.php?pid='<?php echo $detail['post_id'] ?>'">
View Bids
</a>
</div>
<br/>
<?php } ?>
<button class="btn btn-primary" 
data-toggle='collapse' aria-expanded='true'
aria-controls='content' href='#<?php echo $i ?>'>View Description</button>
<div class="collapse" id='<?php echo $i ?>'>
<div class="well">
<?php echo $detail['content'] ?>
</div>
</div>

<?php 
$i++;
 ?>
<hr style="border-color:#5bc0de;width:100%;"/>
<?php 
      
 }
include 'footer.php' ?>
</div>