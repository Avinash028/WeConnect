<?php
session_start();
if(!$_SESSION['id'])
{
  header("Location:relational.php");
}


$link= mysqli_connect("localhost","root","","project");
$t=$_GET['email'];


$q="SELECT * FROM table1 WHERE email='".$_GET['email']."'";
$result=mysqli_query($link,$q);
//$result = mysqli_query($link,$q) or die("MySQL error: " . mysqli_error($dbc) . "<hr>\nQuery: $query"); 

$row=mysqli_fetch_array($result);
/*echo $row['emailaddress']; echo "<br>";
echo $row['facebook']; echo "<br>";
echo $row['linkedin']; echo "<br>";
echo $row['name']; echo "<br>";
echo $row['about'];*/
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

	<style type="text/css">
		#card {
			border:2px solid #428bca;
			margin: 0 auto;
	        margin-top: 4%;
	        width: 390px;
		}

		#head {			
			
			margin: 0px;
			margin-bottom: 10px;
		}

		

		#name p {
			margin: 0px;
		}

		#about_p {
			margin-top: 20px;
			position: relative;
			left: -4%;
		}

		#icons {
			display: flex;
			justify-content: space-around;
			position: relative;
			top: 100%;
			color: #696969;
			position: relative;

		}

		#i1:hover {
			color: #428bca;
			color: #5bc0de;
		}
		#i2:hover {
			color: #428bca;
			color: #5bc0de;
		}

	</style>

</head>
<body>
  
    
	<div id="card" class="col-md-5 col-sm-8">
		<div id="head" class="col-sm-12">
			<div id="name">
				<p class="lead text-center" style="font-size: 28px; color:#428bca; ">
					<?php
						$t=$row['name'];
						echo $t;
					?>
				</p>

				<p class="lead text-center" style="font-size: 24px; color: #696969;">
					<?php
						$t=$row['email'];
						echo $t;
					?>
				</p>
			</div>

				<div id="about">
					<h5 id="about_p" style="color:#428bca; ">About Me</h5>
					 <p class="lead" style="font-size: 16px;">
					 	<?php
					 	   $t=$row['about'];
					 	   echo $t;

					 	   
					 	?>

					 </p>
				</div>

					<br>

				<?php

				  echo '

						<div id="icons" class="d-flex">
							<a href="http://facebook.com/'.$row['facebook'].'"><i class="fab fa-facebook-f fa-2x" id="i1"></i></a>

							<a href="http://linkedin.com/in/'.$row['linkedin'].'"><i class="fab fa-linkedin-in fa-2x" id="i2"></i></a>
						</div>


				  ';

				?>
				

			

		</div>


	</div>
	<br><br><br>

</body>
</html>