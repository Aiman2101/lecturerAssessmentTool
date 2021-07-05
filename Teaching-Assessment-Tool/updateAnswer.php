<?php
require_once "Config.php";
session_start();

if(isset($_POST['reset'])){
  session_destroy();
  header('Location: login.php');
  return;
}

if ( isset($_POST['answer'])) {
  $sql = "UPDATE answer SET answer = :answer WHERE answer = :answerStr";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':answer' => $_POST['answer'],
  ':answerStr' => $_GET['answer']));

      $_SESSION['success'] = 'Answer updated successfully!';
      header( 'Location: editAnswer.php' ) ;
      return;
}

$stmt = $pdo->prepare("SELECT answer FROM answer WHERE answer = :xyz");
$stmt->execute(array(":xyz" => $_GET['answer']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
  $_SESSION['error'] = 'Bad value for answer_value';
  header( 'Location: editAnswer.php' ) ;
  return;
}
$a = htmlentities($row['answer']);

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


.box{
  margin: auto;
  width: 80%;
  border: solid black;
  text-align: center;
  background-color: white;
}

input[type=text] {
  width: 80%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
</style>
 </head>
 <body>
   <ul>
  <li><a href="#home"><?php  echo "<p>&nbsp<i class='fas fa-user-circle' style='font-size:24px'></i> Welcome! Admin";
  echo "</p>\n";?></a></li>
  <form method = "post">
  <li style="float:right"></i><input style="margin-right:20px;background-color:#9E5A63; " type = "submit" name = "reset" value = "Logout"/></li>

    </form>
 </ul>
<a style="margin-right:20px; float:right;" href="editAnswer.php">Back</a>
<div class="box w3-round-xlarge" style="margin-top:40px;background-color: #ccd4ff;">
         <h2 style="margin-bottom:20px;">&nbspEdit Answer</h2>

<form method="post">
<p>Answer:
<input type="text" name="answer" value="<?= $a ?>"></p>
<p><input type="submit" name="submit" value="Update"/></p>
</form>

</div>
</body>
</html>
