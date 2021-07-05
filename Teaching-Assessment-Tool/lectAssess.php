<?php

require_once "Config.php";
session_start();


if(isset($_POST['submit'])){
  if(!isset($_POST['sec']) || !isset ($_POST['sec2']) || !isset($_POST['sec3'])){
    $_SESSION['error'] = "Please fill up all the choices!";
    header("Location: lectAssess.php");
    return;
  }

  else{
    if($_POST['sec']){

    $total = array_sum($_POST['sec']);
    $_SESSION['section1'] = $total;


    /*if($row){
      $subject_id = $row['subject_ID'];
      $stment = $pdo -> prepare('INSERT INTO assessment (subject_ID, section_ID, total_rating, dateAssess) VALUES (:subject_ID, :section_ID, :total_rating, :dateAssess)');
      $stment-> execute(array(
      ':subject_ID' => $subject_id,
      ':section_ID'=> $_POST['section1'],
      ':total_rating'=> $total,
      ':dateAssess' => $_SESSION['dateNow']
    ));
  }*/
}


  if($_POST['sec2']){
    $total1 = array_sum($_POST['sec2']);
    $_SESSION['section2'] = $total1;



    /*if($row){
    $subject_id = $row['subject_ID'];

    $stment = $pdo -> prepare('INSERT INTO assessment (subject_ID, section_ID, total_rating, dateAssess) VALUES (:subject_ID, :section_ID, :total_rating, :dateAssess)');
    $stment-> execute(array(
      ':subject_ID' => $subject_id,
      ':section_ID'=> $_POST['section2'],
      ':total_rating'=> $total1,
      ':dateAssess' => $_SESSION['dateNow']
    ));

}*/
}

  if($_POST['sec3']){
    $total2 = array_sum($_POST['sec3']);
    $_SESSION['section3'] = $total2;

    /*if($row){
      $subject_id = $row['subject_ID'];

    $stment = $pdo -> prepare('INSERT INTO assessment (subject_ID, section_ID, total_rating) VALUES (:subject_ID, :section_ID, :total_rating, :dateAssess)');
    $stment-> execute(array(
      ':subject_ID' => $subject_id,
      ':section_ID'=> $_POST['section3'],
      ':total_rating'=> $total,
      ':dateAssess' => $_SESSION['dateNow']
    ));
  }*/
}

  $overallValue = $total + $total1 + $total2;
  $_SESSION['overallValue'] = $overallValue;
  $_SESSION['averageAll'] = ($overallValue)/3;
  $_SESSION['overallPercent'] = ($overallValue/105)*100;
  header("Location: summary.php");
  }
}


 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset = "UTF-8">
  <meta name = "viewport" contents = "width=device-width,, initial-scale=1.0">
  <title> Lecturer Assessment </title>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    height: 1550px;
    align: center;
    margin: 20px;
    max-width: 800px;
    padding: 13px;
    background-color: #fcfbc5;
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

.tablink{
  background-color: #F78888;
}

.w3-bar{
  background-color: #9E5A63;
}

.design-btn{
  background-color: #F78888;;
  color: white;
  padding: 16px 20px;
  border: none;
  margin-left: 57%;
  margin-top: -3%;
  cursor: pointer;
  width: 40%;
  opacity: 0.9;
}

.design-btn:hover {
  opacity: 1;
}

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
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

  <div class="w3-bar">
    <button  class="w3-bar-item w3-button tablink" onclick="openCity(event,'teaching')" id="defaultOpen" > Teaching Method, Strategies and Practices </button>
    <button   class="w3-bar-item w3-button tablink" onclick="openCity(event,'course')"> Course Material and Structure </button>
    <button  class="w3-bar-item w3-button tablink" onclick="openCity(event,'personal')"> Personal/Connection - Clarity and Encouragement </button>
  </div>

  <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
  <form method = "post">

    <div id="teaching" class="w3-container city" style="display:none">



  <div class = "container">

    <?php
    if(isset($_SESSION['error'])){
    echo('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
    unset($_SESSION['error']);
    }

    ?>
      <h2> Teaching Method, Strategies and Practices </h2>

      <?php
      $counting = 1;
      $stment = $pdo -> query("SELECT questions from question where section_id = 1");
      $rows = $stment -> fetchAll(PDO::FETCH_ASSOC);

      $stment1 = $pdo -> query("SELECT answer,rating from answer where question_id = $counting");
      $rates = $stment1 -> fetchAll(PDO::FETCH_ASSOC);


      $question_id = (isset($rows['question_id']));
      if(sizeof($rows)>0){
          foreach ($rows as $row){
        echo ($row['questions']);
        echo "<br><br>";

        foreach ($rates as $rate){

           echo '<input type = "radio" name = "sec['.$counting.']" value= '.$rate['rating'].'/>';

            echo ($rate ['answer']);
          echo "<br>";

      }
      echo "<br><br>";
      $counting++;
      $stment1 = $pdo -> query("SELECT answer,rating from answer where question_id = $counting");
      $rates = $stment1 -> fetchAll(PDO::FETCH_ASSOC);

    }
  }
  ?>
<input type = "hidden" name = "section1" value = "1">

  </div>
</div>



    <div id="course" class="w3-container city" style = "display:none">
  <div class = "container">
      <h2> Course Material and Structure </h2>

      <?php
      $counting1 = 8;
      $stment = $pdo -> query("SELECT questions from question where section_id = 2");
      $rows = $stment -> fetchAll(PDO::FETCH_ASSOC);

      $stment1 = $pdo -> query("SELECT answer,rating from answer where question_id = $counting1");
      $rates = $stment1 -> fetchAll(PDO::FETCH_ASSOC);

      $question_id = (isset($rows['question_id']));
      if(sizeof($rows)>0){
          foreach ($rows as $row){
        echo ($row['questions']);
        echo "<br><br>";

        foreach ($rates as $rate){

        echo '<input type = "radio" name = "sec2['.$counting1.']" value= '.$rate['rating'].'/>';


            echo ($rate ['answer']);
          echo "<br>";
      }
      echo "<br><br>";
      $counting1++;
      $stment1 = $pdo -> query("SELECT answer,rating from answer where question_id = $counting1");
      $rates = $stment1 -> fetchAll(PDO::FETCH_ASSOC);

    }
  }

      ?>
      <input type = "hidden" name = "section2" value = "2">
</div>
</div>

  <div id="personal" class="w3-container city" style="display:none">
      <div class = "container">
    <h2> Personal/Connection - Clarity and Encouragement </h2>

    <?php
    $counting2 = 15;

    $stment = $pdo -> query("SELECT questions from question where section_id = 3");
    $rows = $stment -> fetchAll(PDO::FETCH_ASSOC);
    $stment1 = $pdo -> query("SELECT answer,rating from answer where question_id = $counting2");
    $rates = $stment1 -> fetchAll(PDO::FETCH_ASSOC);

  $question_id = (isset($rows['question_id']));
    if(sizeof($rows)>0){
        foreach ($rows as $row){
      echo ($row['questions']);
      echo "<br><br>";

      foreach ($rates as $rate){

          echo '<input type = "radio" name = "sec3['.$counting2.']" value= '.$rate['rating'].'/>';


          echo ($rate ['answer']);
        echo "<br>";
    }
    echo "<br><br>";
    $counting2++;
    $stment1 = $pdo -> query("SELECT answer,rating from answer where question_id = $counting2");
    $rates = $stment1 -> fetchAll(PDO::FETCH_ASSOC);

  }
}

    ?>
    <input type = "hidden" name = "section3" value = "3">
    <input class = "design-btn" type = "submit" name = "submit" value = "Assess your lecturer"/>
</div>
</div>

</form>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

<script>
var currentTab = 0;
function openCity(evt, cityName) {
var i, x, tablinks;
x = document.getElementsByClassName("city");
for (i = 0; i < x.length; i++) {
x[i].style.display = "none";
}
tablinks = document.getElementsByClassName("tablink");
for (i = 0; i < x.length; i++) {
tablinks[i].className = tablinks[i].className.replace(" w3-khaki", "");
}
document.getElementById(cityName).style.display = "block";
evt.currentTarget.className += " w3-khaki";
}


document.getElementById("defaultOpen").click();
</script>
       </body>
       </html>
