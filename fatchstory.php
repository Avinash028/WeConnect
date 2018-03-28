<?php
session_start();
if(!$_SESSION['id'])
{
  header("Location:relational.php");
}


?>



<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


  <style type="text/css">
    .card-header {
      font-size: 20px;
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

    

  </style>
</head>
<body>

<?php

if(isset($_POST["limit"], $_POST["start"]))
{
 $link = mysqli_connect("localhost", "root", "", "project");
 $t=0;
 $query ="SELECT * FROM table2 WHERE code=0 ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result = mysqli_query($link,$query);
 while($row=mysqli_fetch_array($result))
{
  $t=$row['id'];
  $q2="SELECT email FROM table1 WHERE id=$t";
    $result2=mysqli_query($link,$q2);
    $row2=mysqli_fetch_array($result2);

  //if($row['story']!='') {
    
    $row['content']=trim($row['content']);

    if(strcmp($row['content'],"")!=0) {
   echo '<div class="card">
        <div class="card-header">
            Story
         </div>
       <div class="card-block">

       <a href="email.php?email='.$row2['email'].'"><h2 class="card-title">'.$row2['email'].'</h2></a>

    <p class="card-text" id="text">'.$row['content'].'</p>
     <a class="btn btn-primary"  onclick="more1()">View Story</a>
     
     

  </div>



</div>  ';


  
  echo "<br>";
  }
}
}

      ?>

      

</body>
</html>      