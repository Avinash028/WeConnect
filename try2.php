<?php

session_start();
if(!$_SESSION['id'])
{
  header("Location:relational.php");
}

//$_SESSION['id']=mysqli_insert_id();
//if($_SESSION['email'])
  //echo("arg1");

 //echo $_SESSION['email'];

$diarycontent="";

$link= mysqli_connect("localhost","root","","project");

$_SESSION['visited']=2;

$r=$_SESSION['id'];
/*$q2="Insert INTO table2 (id,code,content) VALUES($r,'')";
    $result=mysqli_query($link,$q2);*/


//$_SESSION['id']=mysqli_insert_id($link);
//if(array_key_exists('id', $_SESSION))
//echo $_SESSION['id'];

/*if(array_key_exists('textarea', $_POST)) {

//$i=$_SESSION['id'];
  if(array_key_exists('id', $_SESSION))
          $i=$_SESSION['id'];
$q="Insert INTO table2 (id,story) VALUES($i,'".$_POST['textarea']."')";
$result=mysqli_query($link,$q);
}*/





?>



<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <style type="text/css">

    html { 
      background: url(nature.jpg) no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }

    body {
      background:none;
    }

    #diary {
      margin-top: 30px;
    }

    

    #b {
      cursor: pointer;
    }

    #d2 {
      margin-right: 10px;
    }



  </style>


</head>
<body>
  <nav class="navbar navbar-toggleable-xl navbar-light bg-faded navbar-fixed-top">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand">SECRET DIARY</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <!--<li class="nav-item active">
        <a class="nav-link" href="diary.php">Log Out <span class="sr-only">(current)</span></a>
      </li> !-->

       <div class="float-right" id="d2">
        <a href="changepassword.php" class="pull-xs-right"><button type="button" class="btn btn-success pull-xs-right" id="b">Change Password.</button></a>

      </div>

      <div class="pull-right" id="d1">
        <a href="logout.php" class="pull-xs-right"><button type="button" class="btn btn-success pull-xs-right" id="b">Log Out</button></a>

      </div>

     
      
    </ul>
    
  </div>
</nav>


    <div class="container-fluid">

      
      
      <form action="somepage.php" method="post">
        <textarea class="form-control" id="diary" rows="27" name="textarea">
        
        </textarea>
        <br>
        <button type="submit" class="btn btn-lg btn-primary">Post</button>

      </form>
        

      

      
      
    </div>

    
</body>
</html>