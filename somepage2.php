<?php

session_start();
if(!$_SESSION['id'])
{
  header("Location:relational.php");
}

$link= mysqli_connect("localhost","root","","project");

$r=$_SESSION['id'];
$q="Insert INTO table2 (id,code,content) VALUES($r,0,'".mysqli_real_escape_string($link,$_POST['textarea'])."')";
    $result=mysqli_query($link,$q);

    //echo $_POST['textarea'];
    

    
header("location:story.php");


?>    