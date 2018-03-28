<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


	<style type="text/css">
		.card-header {
			font-size: 20px;
			background-color: #DCDCDC!important;
		}

		.card-block {
			font-size: 22px;
		}

		.card-text {
			font-size: 18px;
		}

		.card-block a {
			font-size: 20px;
		}

		#badge {
			position: relative;
			top: -24%;
		}



	</style>
</head>
<body>

<?php

if(isset($_POST["limit"], $_POST["start"]))
{

 $link = mysqli_connect("localhost", "root", "", "project");
 $query = "SELECT * FROM table2 WHERE code=1 ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result = mysqli_query($link, $query);
 while($row=mysqli_fetch_array($result))
{
  $t=$row['id'];
  $q2="SELECT email FROM table1 WHERE id=$t";
    $result2=mysqli_query($link,$q2);
    $row2=mysqli_fetch_array($result2);

  //if($row['story']!='') {
    
        $y=$row['q_id'];
    $r="SELECT q_id FROM table3 WHERE q_id=$y";
    $resultq = mysqli_query($link, $r);

  		$count=0;

    while($rowq=mysqli_fetch_array($resultq))
    {
    	$u=$row['q_id'];
    	if($u==$rowq['q_id'])
    		$count=$count+1;
    }

    $row['content']=trim($row['content']);

    if(strcmp($row['content'],"")!=0) {


   echo '<div class="card">
        <div class="card-header">
           ANSWER THIS QUARY.
         </div>
       <div class="card-block">

       <a href="email.php?email='.$row2['email'].'"><h2 class="card-title ">'.$row2['email'].'</h2></a>
     
     
      <p class="card-text" id="p">'.$row['content'].'</p>
      <span class="badge badge-pill badge-info pull-right" id="badge">'.$count.'</span>

     
     <a class="btn btn-primary" href="view.php?q_id='.$row['q_id'].'">View Answer</a>
     <a class="btn btn-primary" href="writeanswer.php?q_id='.$row['q_id'].'">Write Answer</a>
     

  </div>



</div>  ';


  
  echo "<br>";
}
 // }
}
}

      ?>

</body>
</html>      