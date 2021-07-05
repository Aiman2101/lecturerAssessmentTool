<?php
session_start();
require_once "Config.php";


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset = "UTF-8">
  <meta name = "viewport" contents = "width=device-width,, initial-scale=1.0">
  <title> Information Page </title>
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
    height: 1800px;
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
  table-layout: auto;
}
th, td {
  padding: 5px;
  text-align: left;
}
.w3-bar{
  background-color: #9E5A63;
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
      <h1> Information Page </h1>
      <h3>This page shows all the questions from all sections and description for each section.</h3>

      <table>
        <tr class="table-warning">
          <th>Section No</th>
          <th>Section Name</th>
          <th>Questions</th>
          <th>Description</th>
        </tr>

        <?php

        $flag = false;
        $stment = $pdo -> query("SELECT questions from question where section_id = 1");
        $rows = $stment -> fetchAll(PDO::FETCH_ASSOC);

        $stment1 = $pdo -> query("SELECT COUNT(questions) from question where section_id = 1");
      $count = $stment1 -> fetchAll(PDO::FETCH_ASSOC);
        //$count = $stment1 -> fetchAll(PDO::FETCH_ASSOC);

        echo '<tr class = "table-primary">';
          echo ('<td rowspan = "');
          echo ($count) ;
          echo ('">1</td>');
          echo ('<td rowspan = "');
          echo ($count);
          echo ('">Teaching Method, Strategies and Practices</td>');




          if(sizeof($rows)>0){

            echo "<td>";

              foreach ($rows as $row){

            echo ($row['questions']);
            echo "<br><br>";


          }

          echo "</td>";
          echo "<td>This section is assess on how well the lecturer execute their teaching method during the class.</td>";
          echo "</tr>";

        }



          $flag = false;
          $stment = $pdo -> query("SELECT questions from question where section_id = 2");
          $rows = $stment -> fetchAll(PDO::FETCH_ASSOC);

          $stment1 = $pdo -> query("SELECT COUNT(questions) from question where section_id = 2");


            echo '<tr class = "table-danger">';
            echo ('<td rowspan = "');

            echo ('">2</td>');
            echo ('<td rowspan = "');

            echo ('">Course Material and Structure</td>');

            if(sizeof($rows)>0){

              echo "<td>";

                foreach ($rows as $row){

              echo ($row['questions']);
              echo "<br><br>";


            }

            echo "</td>";
            echo "<td>This section assess on how well the lecturer convey the course material to the student.</td>";
            echo "</tr>";

          }

            $stment = $pdo -> query("SELECT questions from question where section_id = 3");
            $rows = $stment -> fetchAll(PDO::FETCH_ASSOC);


              echo '<tr class = "table-success">';
              echo ('<td rowspan = "');

              echo ('">3</td>');
              echo ('<td rowspan = "');

              echo ('">Personal/Connection - Clarity and Encouragement/</td>');


              if(sizeof($rows)>0){

                echo "<td>";

                  foreach ($rows as $row){

                echo ($row['questions']);
                echo "<br><br>";

              }

              echo "</td>";
              echo "<td>This section assess how well the lecturer handle and clarify any unclear information during and outside the class time.</td>";
              echo "</tr>";

            }

          ?>

        </table>
    </body>
    </html>
