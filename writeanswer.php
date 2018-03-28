<?php

session_start();
if(!$_SESSION['id'])
{
  header("Location:relational.php");
}

$link= mysqli_connect("localhost","root","","project");


?>

<!DOCTYPE html>
<html>
<head>
	<title>Write answer</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<style type="text/css">

		#nav_container {
      font-size: 20px;
      margin-bottom: 15px;
      position: sticky;
      top: 0px;
      height: 60px;
      z-index: 10;
      background-color: white;
      border-bottom: 1px solid #eee;
      line-height: 30px;
      margin-top: 5px;
      padding-left: 15px;
    }

    #navshift {
    	position: relative;
    	top: -60px;
    }



    

	</style>

</head>
<body>

	<div id="nav_container">
  <div id="logo">
    <p class="navbar-brand lead" style="font-size: 20px;"><b>SECRET DIARY</b></p>
  </div>
<ul class="nav justify-content-end" id="navshift">
  
  <li class="nav-item" >
        <a class="nav-link active" href="try2.php">Ask</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="story.php">Story</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="profile.php">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="logout.php">Logout</a>
  </li>
  
</ul>
</div>

 <div class="container">

 	<?php
 	$t=$_GET['q_id'];
 	$_SESSION['q_id']=$t;
 	//echo $t;
 		$q="SELECT content FROM table2 where q_id=$t";
 		   $result = mysqli_query($link, $q);
 		   $row=mysqli_fetch_array($result);
 		   //echo $row[content];

 	?>

<?php
 	

echo '<div class="card">
        <div class="card-header">
            WRITE ANSWER FOR THIS QUESTION
         </div>
       <div class="card-block">

       

    <p class="card-text text-primary">'.$row['content'].'</p>
     
     

  </div>



</div>  ';

echo "<br>";

?>

  

	<form action="somepage3.php" method="post">		
		<textarea class="form-control" id="diary" rows="19" name="textarea">
             
        </textarea>
        
        <br><br>
        	<button type="submit" class="btn btn-lg btn-primary">Post</button>
           
			
       
        
	</form>
 </div>	

</body>
</html>