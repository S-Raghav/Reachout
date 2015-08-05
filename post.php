<?php include 'header.php' ;
include 'dbcon.php'?>
<div class="col-md-8 col-md-offset-2 table-bordered" style="border:1px solid #337ab7;">

<p class="lead text-primary col-md-offset-3">Need something Done?We are ready to help :)</p>
<div class="col-md-8 col-md-offset-2 " >

<form role="form" action='post_to_server.php' method='POST'>
<label for="domain" >Domain
<input id="domain" name='domain' class="form-control" placeholder="eg. plumbing,babysitting,CS etc."/>
<label for="type" >Type
<select id="type" name='type' class="form-control">
<option default>type</option>
<option >grievance</option>
<option>Job</option>
</select>
<br/>
<label for="domain" >How many people do you require?<small>(for grievances)</small>
<input id="ppl" name='required' class="form-control" value=0 />
<br/>
<input class="hidden" name='post_id' value='<?php echo date('y-m-d H:m:s'); ?>' />
<label for="highest_bid" >Quote a price<small> (if applicable)</small>
<div class="input-group">

<span class="input-group-addon">Rs.</span>
<input id="highest_bid" name='highest_bid' class="form-control"/><br/>
</div><br/>
<label for="content" >Description<small> (not more than 40 characters)</small>
<textarea maxlength="40" id="content" name='content' class="form-control" ></textarea>
<br/>
<button class="btn btn-primary ">Post it!</button>
</form>
</div>
</div>
</div>
<?php include 'footer.php' ?>