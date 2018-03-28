<?php

session_start();

$link= mysqli_connect("localhost","root","","project");

//$t=$_SESSION['id'];
//echo $t;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

<style type="text/css">
	#box {
		margin-top: 6%;
}

</style>
	

</head>
<body>

	<?php
	   $t=$_SESSION['id'];
	   $q="SELECT * FROM table1 where id=$t";
		$result=mysqli_query($link,$q);
		$row=mysqli_fetch_array($result);
	?>
   
   <div id="box">
	<h3 class="text-primary text-center" style="margin-bottom: 8px;">UPADATE YOUR PROFILE</h3>


	<form method="post" class="container" action="insertcontact.php">
		
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="emailaddress" value="<?php 

    	echo $row['email'];

     ?>">
    <small id="emailHelp" class="form-text text-muted">This will be visible to the one who visited your profile.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Facebook Username</label>
    <input type="text" class="form-control" id="exampleInputPassword1"  name="facebook" value="<?php 

    	echo $row['facebook'];

     ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">LinkedIn Username</label>
    <input type="text" class="form-control" id="exampleInputPassword1"  name="linkedin" value="<?php 

    	echo $row['linkedin'];

     ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Your Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1"  name="name" value="<?php 

    	echo $row['name'];

     ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Describe Your Self</label>
    <textarea type="text" class="form-control" id="exampleInputPassword1"  name="about" rows="8">
       <?php
       		echo $row['about'];
       ?>
    </textarea>
  </div>

  
  <button type="submit" class="btn btn-primary">UPDATE</button>
</form>
</div>

	

</body>
</html>
