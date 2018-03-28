<?php
session_start();
if(!$_SESSION['id'])
{
  header("Location:relational.php");
}


?>




<html>
 <head>
  <title>Auto Load More Data on Page Scroll | lisenme.com </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
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


  </style>
 </head>
 <body>


<div id="nav_container">
  <div id="logo">
    <p class="navbar-brand lead" style="font-size: 20px;"><b>SECRET DIARY</b></p>
  </div>
<ul class="nav justify-content-end">
  
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



  <div id="shift">
  <div class="container">
   <h2 align="center" style="margin-top: 10px; margin-bottom: 10px;">QUESTION ASKED</a></h2>
   <br />
   <div id="load_data"></div>
   <div id="load_data_message"></div>
   <br />
   <br />
   <br />
   <br />
   <br />
   <br />
  </div>
</div>



 </body>
</html>
<script>

$(document).ready(function(){
 
 var limit = 8;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start)
 {
  $.ajax({
   url:"fatchdata.php",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    $('#load_data').append(data);
    if(data == '')
    {
     $('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html("<button type='button' class='btn btn-warning'>Please Wait....</button>");
     action = "inactive";
    }
   }
  });
 }

 if(action == 'inactive')
 {
  action = 'active';
  load_country_data(limit, start);
 }
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_country_data(limit, start);
   }, 1000);
  }
 });
 
});
</script>

