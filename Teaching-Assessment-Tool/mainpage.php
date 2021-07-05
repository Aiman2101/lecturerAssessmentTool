<?php
//index.php
session_start();
include "Config.php";

// Check user login or not
if (empty($_SESSION['auto_id'])){
  header("Location: login.php");
  return;
}

if(isset($_POST['reset'])){
  session_destroy();
  header('Location: login.php');
  return;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
  <title>Teaching Assessment Tool</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <style>
  html,body {
      padding: 0;
      background-image: url('https://michiganvirtual.org/wp-content/uploads/2020/02/survey-and-feedback.jpg');
      height: 100%;
      -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
  }

  .box{
    margin: auto;
    width: 50%;
    border: solid black;
    padding: 10px;
    text-align: center;
    background-color: white;
  }

.w3-button {
  width:300px;
  margin-bottom: 20px;
  background-color: #faf693;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color:  #9E5A63;
}


li {
  float: left;
}


li a {
  display: block;
  color: #F0E68C;
  text-align: center;
  padding-top: 10px;
  text-decoration: none;
}

li input {
  display: block;
  color: #F0E68C;
  text-align: center;
  padding-top: 5px;
  border: none;
  text-decoration: none;
  margin-top: 9px;
}

li input:hover {
  color: white;
}

li a:hover {
  color: white;
}

</style>
 </head>
 <body>
   <ul>
  <li><a href="#home"><?php  echo "<p>&nbsp<i class='fas fa-user-circle' style='font-size:24px; font-color:khaki'></i> Welcome! ";
  echo htmlentities($_SESSION['username']);
  echo "</p>\n";?></a></li>
  <form method = "post">
<li style="float:right"></i><input style="margin-right:20px;background-color:#9E5A63; " type = "submit" name = "reset" value = "Logout"/></li>

    </form>

</ul>

       <div class="box w3-round-xlarge" style="margin-top:70px; background-color: #F78888;">
         <h1 style="margin-bottom:20px;font-family: cursive;">Your Dashboard</h1>
           <p><button  class="w3-button  w3-border w3-round-xlarge" onclick="location.href='subject_reg.php';">Register Subject to Assess</button></p>

           <p><button class="w3-button w3-border w3-round-xlarge" onclick="location.href='information.php';">Information page</button></p>
       </div>


 </body>
</html>
