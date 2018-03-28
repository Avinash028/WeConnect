<?php

session_start();

if(!$_SESSION['id'])
{
  header("Location:relational.php");
}

$link= mysqli_connect("localhost","root","","project");

$t=$_SESSION['id'];
echo $t;
//$q="INSERT INTO table1 WHERE id=$t LIMIT=1 (emailaddress,facebook,linkedin) VALUES('".$_POST['emailaddress']."','".$_POST['facebook']."','".$_POST['linkedin']."')";

$q="UPDATE table1 set emailaddress='".mysqli_real_escape_string($link,$_POST['emailaddress'])."',
facebook='".mysqli_real_escape_string($link,$_POST['facebook'])."',
linkedin='".mysqli_real_escape_string($link,$_POST['linkedin'])."',
name='".mysqli_real_escape_string($link,$_POST['name'])."',
about='".mysqli_real_escape_string($link,$_POST['about'])."'
 WHERE id=$t ";



$result=mysqli_query($link,$q);

header("location:load.php");

?>