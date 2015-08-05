<?php include 'header.php' ;
include 'dbcon.php'?>
<div class="col-md-8 col-md-offset-2 table-bordered" >
<p class="lead">Please enter your details to join the ReachOut community</p>
<form role="form" action='register.php' method='POST'>
<label for="name" >Your First Name
<input id="name" name='name' class="form-control"/>
<label for="username" >Username
<input id="username" name='id' class="form-control"/>
<label for="pwd" >Password
<input id="pwd" name='pwd' class="form-control"type="password"/>
<label for="email" >Email
<input id="email" name='email' class="form-control" placeholder="abc@def.com"/>
<br/>
<label for="locale" >Locality
<textarea maxlength=100 id="locality" name='locality' class="form-control" 
placeholder="madurai,bypass etc."></textarea>
<br/>
<button class="btn btn-primary ">Create Account</button>
</form>
</div>
<?php include 'footer.php' ?>