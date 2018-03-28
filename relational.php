<?php


session_start();


//echo $_SESSION['a']="abc";

$link= mysqli_connect("localhost","root","avinash","project");
$error="";

if(array_key_exists('email', $_POST) || array_key_exists('password', $_POST))
{
   if($_POST['email']=="")
     $error="Email is requird";

   if($_POST['password']=="")
   	 $error="Password is requird";


}

/*if($_POST['email']!="" and $_POST['password']!="") {
   
}*/

if(array_key_exists('login', $_POST) and $_POST['email']!="" and $_POST['password']!=""){

    if($_POST['login']=='0') {

$q="SELECT id FROM table1 where email='".$_POST['email']."' ";
$result=mysqli_query($link,$q);

if(mysqli_num_rows($result)==0)
{

  $error="User does not exits";
}

else  {
	$q="SELECT * FROM table1 where email='".$_POST['email']."' ";	
	//$error= password;
  //$q2="SELECT password FROM user where id=$q LIMIT 1";	

	$result=mysqli_query($link,$q);
	$row=mysqli_fetch_array($result);
	if(array_key_exists("email", $row)){
	  //$error="User logged In";
		if($row['password']==MD5($_POST['password'])) {
			$error="User logged In";
			//$_SESSION['id']=$row['id'];
			//$_SESSION['id']=mysqli_insert_id();
			$_SESSION['id']=$row['id'];
			$_SESSION['visited']=1;
			header('Location:load.php');
		}
		else
		
			$error="password not correct";
	}
	
	 // $error="password not correct";


}
}

else {

	$q="SELECT id FROM table1 where email='".$_POST['email']."' ";
$result=mysqli_query($link,$q);

if(mysqli_num_rows($result)>0)
{

  $error="User exits";
}
else {

	/*$q="SELECT id FROM table1 where email='".$_POST['email']."' ";
$result=mysqli_query($link,$q);*/

//$p=md5(md5($result['id'],$_POST['password']));
  $q="Insert INTO table1 (email,password,emailaddress,facebook,linkedin,name,about) VALUES('".$_POST['email']."','".$_POST['password']."','','','','','')";

     	if(mysqli_query($link,$q)) {
     		echo "successful";
     		$t="UPDATE table1 SET password='".md5(md5(mysqli_insert_id()).).$_POST['password']."' WHERE id=".mysqli_insert_id()." LIMIT 1";
     		
     		$_SESSION['email']=$_POST['email'];
     		$_SESSION['id']=mysqli_insert_id($link);
     		$_SESSION['visited']=1;
         header('Location:load.php');

     	}
     	else
     		echo "error";
     }

}

}

//}





?>










<!DOCTYPE html>
<html>
<head>
	<title>Diary</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


	<style type="text/css">
		
		.container {
			text-align: center;
			width: 450px;
			margin-top: 150px;
		}

		body {
 			background:none;
 		}

		html { 
		  background: url(nature.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
}

#signup {
	display: none;
}

.colour {
	color: #fff;
	font-size: 22px;
}

	</style>

</head>
<body>

	<div class="container">
      <h2 class="display-3">Secret Diary.</h2>
      <h5>Your's Thought Our Responsibility</h5>

<form method="post" id="login">
	<p class="lead colour">LogIn</p>
	<p>
		<div class="alert alert-danger" role="alert">
  			<?php  echo $error; ?>
  		</div>	
  	</p>
	<div class="form-group">
		<input type="text" name="email" class="form-control" placeholder="email" autofocus="autofocus">
	</div>
	<div class="form-group">
		<input type="hidden" class="form-control" name="login" value="0">
	</div>
	<div class="form-group">	
		<input type="password" class="form-control" name="password" placeholder="password">
	</div>	

	<button type="submit" class="btn btn-primary">LogIn</button><br><br>

	
	<p class="lead  h3 colour"><a onclick="fun1()" >Sign Up</a></p>
</form>	


<form method="post" id="signup">
	<p class="lead colour">SignUp</p>
	<p>
		<div class="alert alert-danger" role="alert">
  			<?php  echo $error; ?>
  		</div>	
  	</p>
		


		
	<div class="form-group">
		<input type="text" class="form-control" name="email" placeholder="email" autofocus="autofocus">
	</div>
	<div class="form-group">
		<input type="hidden" class="form-control" name="login" value="1">
    </div>
    <div class="form-group">
		<input type="password" class="form-control" name="password" placeholder="password">
    </div>

	<button type="submit" class="btn btn-primary">SignUp</button>
	
	<p class="lead  h3 colour"> <a onclick="fun2()">Log In</a></p>
</form>	
</div>

<script type="text/javascript">
	function fun2(){
		var x=document.getElementById('signup');
		x.style.display="none";
		var y=document.getElementById('login');
		y.style.display="block";
	}

	function fun1(){
		var x=document.getElementById('signup');
		x.style.display="block";
		var y=document.getElementById('login');
		y.style.display="none";
	}

</script>

</body>
</html>