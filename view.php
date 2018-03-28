<?php

//echo $_GET['q_id'];


?>

<!DOCTYPE html>
<html>
<head>
	<title>All answers</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
		
	  #logo {
	  	display: inline-flex;
	  }

	  #ul {
	  	display: inline-flex;
	  	justify-content: flex-start;
	  }

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
    }

    .one {
      margin-right: 15px;
    }
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
    }

    #navshift {
    	position: relative;
    	top: -70px;
    }

    #borderline {
    	color: #1E90FF!important;
    	border-bottom: 1px solid #6495ED!important;
    	
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



<?php

$link = mysqli_connect("localhost", "root", "", "project");
$y=$_GET['q_id'];
 $query = "SELECT * FROM table3 WHERE q_id=$y";
 $result = mysqli_query($link, $query);
 while($row=mysqli_fetch_array($result))
{
 // $t=$row['id'];
 // $q2="SELECT email FROM table1 WHERE id=$t";
    //$result2=mysqli_query($link,$q2);
    //$row2=mysqli_fetch_array($result2);  card-info
  
  echo '<div class="card container mb-3" id="borderline">
        
       <div class="card-block">

       <p class="lead">'.$row['answer'].'</p>

  </div>



</div>  ';
echo "<br>";
}

?>


</body>
</html>