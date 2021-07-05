<?php
session_start();
require_once "Config.php";
if (empty($_SESSION['auto_id'])){
  header("Location: login.php");
  return;
}
if(isset($_POST['reset'])){
  header("Location: subject_reg.php");
  return;
}


?>
<html>
<head>
  <meta charset = "UTF-8">
  <meta name = "viewport" contents = "width=device-width,, initial-scale=1.0">
  <title> SUMMARY </title>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>

    body{
      background-image: url('https://michiganvirtual.org/wp-content/uploads/2020/02/survey-and-feedback.jpg');
      height: 100%;
      -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    a {
      text-decoration: none;
      display: inline-block;
      padding: 8px 16px;
    }
    .container {
      align: center;
        position: absolute;
        height: 500px;
        align: center;
        margin: 20px;
        max-width: 800px;
        padding: 13px;
        background-color: white;
        margin-left: 20%;



    }



    .previous {
      background-color: #f1f1f1;
      color: black;
    }

    .next {
      background-color: #04AA6D;
      color: white;
    }

    .round {
      border-radius: 50%;


    }
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  table-layout: fixed;
  width: 100%;
}

th, td {
  padding: 5px;
  text-align: center;
}
.w3-bar{
  background-color: #9E5A63;
}
.design-btn{
  background-color: #F78888;
  color: white;
  padding: 16px 20px;
  border: none;
  margin-left: 69%;
  margin-top: 1%;
  cursor: pointer;
  width: 30%;
  opacity: 0.9;
}

.design-btn:hover {
  opacity: 1;
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

  <li style="float:right"></i><a href = "mainpage.php">Home</a></li>

  </ul>
<div class = "container">
  <h1 align= center>RESULT SUMMARY</h1>

  <?php

  if(isset($_SESSION['section1']) && isset($_SESSION['section2']) && isset($_SESSION['section3'])){
    if(round(htmlentities($_SESSION['overallPercent']),2) == 100){
      echo '<table class="table-primary" text-align: center;> <tr class="table-warning"> <td colspan="3"> <h2>You have the most amazing lecturer!</h2> <p>You should consider buying your lecturer a present.</p> </td> </tr>';

    }

    else if(round(htmlentities($_SESSION['overallPercent']),2) >= 75){
      echo '<table class="table-primary" text-align: center;> <tr class="table-warning"> <td colspan="3"> <h2>Your lecturer is very good!</h2> <p>You should show your appreciation to your lecturer .</p> </td> </tr>';

    }

    else if(round(htmlentities($_SESSION['overallPercent']),2) >= 50){
      echo '<table class="table-primary" text-align: center;> <tr class="table-warning"> <td colspan="3"> <h2>Your lecturer performance is above average!</h2> <p>Your lecturer is doing their best.</p> </td> </tr>';

    }

    else if(round(htmlentities($_SESSION['overallPercent']),2) >= 25){
      echo '<table class="table-primary" text-align: center;> <tr class="table-warning"> <td colspan="3"> <h2>Your lecturer performance is average!</h2> <p> Your lecturer is doing just fine </p> </td> </tr>';

    }

    else {
      echo '<table class="table-primary" text-align: center;> <tr class="table-warning"> <td colspan="3"> <h2>Your lecturer is below average!</h2> <p>Are you sure it is not your problem?</p> </td> </tr>';

    }

    echo '<tr> <td> <p style="color: black;">Section 1 </p> </td>';
    echo '<td> <p style="color: black;">Section 2</p> </td>';
    echo '<td> <p style="color: black;">Section 3</p> <br> </td> </tr>';

    echo '<tr> <td> <p style="color: black;">' . htmlentities($_SESSION['section1']) . "/35</p> </td>";
    echo '<td> <p style="color: black;">' . htmlentities($_SESSION['section2']) . "/35</p> </td>";
    echo '<td> <p style="color: black;">' . htmlentities($_SESSION['section3']) . "/35</p> </td> </tr> </table>";

    echo '<h2>  </h2>';
    echo '<table> <tr> <td style = "background-color:#ffff75;"> <h3>Overall Value</h3> </td> <td>' . htmlentities($_SESSION['overallValue']) . '</td> </tr>';
    echo '<tr> <td style = "background-color:#ffabee;"> <h3>Average</h3> </td> <td>' . round(htmlentities($_SESSION['averageAll']),2 ) . '</td> </tr>';
    echo '<tr> <td style = "background-color:#b3ffc4;"> <h3>Overall Percent</h3> </td> <td>' . round(htmlentities($_SESSION['overallPercent']),2) . ' %</td> </tr> </table>';

  }
      ?>
      <form method = "post">
            <input class = "design-btn" type = "submit" name = "reset" value = "Evaluate more!"/>
      </div>
    </form>
  </body>
  </html>
