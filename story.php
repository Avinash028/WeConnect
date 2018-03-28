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
        <a href="try3.php" class="pull-xs-right"><button type="button" class="btn btn-success pull-xs-right" id="b">Write Story</button></a>

      </div>     
      
    </ul>
    
  </div>
</nav>

  
  <div class="container">
   <h2 align="center">READ THESE STORIES</a></h2>
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
   url:"fatchstory.php",
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