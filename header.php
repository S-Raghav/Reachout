<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<body>
<nav class="navbar navbar-inverse">
<a class="navbar-brand">Reach Out</a>
<?php
if (isset($_SESSION['id'])){
?>
<ul class="nav navbar-nav pull-right">
<li>
<a href="jobfeed.php" ><strong style="color:white">Job Feed</strong></a></li>
<li>
<a href="#">Hi,<?php echo $_SESSION['id'] ?> <span class="glyphicon glyphicon-user"></span>
</a>
</li>
<li>
<a class="navbar-nav">
<span class="glyphicon glyphicon-hand-right" style="color:yellow"> <?php echo $_SESSION['reliability'] ?></span>
</a>
</li>
<li>
<a class="navbar-nav" href="logout.php" data-toggle="tooltip" title="signout">
<span class="glyphicon glyphicon-log-out " style="color:white;"></span> </a>
</li>
</ul>
<?php }
else { ?>
<form role="form" class="navbar-form navbar-right" action ='login.php' method='POST'>
<div class="form-group">

<input id="id" name='id' class="form-control" placeholder="username"/>
</div>
<div class="form-group">

<input id="pwd" name='pwd' type="password" class="form-control" placeholder="password"/>
</div>
<button class="btn btn-primary ">Let's Go</button>
</form>
<?php } ?>
</nav>