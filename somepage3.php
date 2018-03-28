<?php

session_start();
if(!$_SESSION['id'])
{
  header("Location:relational.php");
}

$link= mysqli_connect("localhost","root","","project");
$t=$_SESSION['q_id'];
//echo $_POST['textarea'];
$q="Insert INTO table3 (q_id,answer) VALUES($t,'".$_POST['textarea']."')";
$result=mysqli_query($link,$q);


header('location:load.php');


?>