<?php
require_once "Config.php";
session_start();

if(isset($_POST['reset'])){
  session_destroy();
  header('Location: login.php');
  return;
}

if ( isset($_POST['questions']) && isset($_POST['question_id']) ) {
  $sql = "UPDATE question SET questions = :questions WHERE question_id = :question_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':questions' => $_POST['questions'],
    ':question_id' => $_POST['question_id']));
    if ($_POST['section_id']==1) {
      $_SESSION['success'] = 'Question updated successfully!';
      header( 'Location: editQuestionSection1.php' ) ;
      return;
    } else if ($_POST['section_id']==2) {
      $_SESSION['success'] = 'Question updated successfully!';
      header( 'Location: editQuestionSection2.php' ) ;
      return;
    } else if ($_POST['section_id']==3) {
      $_SESSION['success'] = 'Question updated successfully!';
      header( 'Location: editQuestionSection3.php' ) ;
      return;
    }

}
$stmt = $pdo->prepare("SELECT question_id, questions, section_id FROM question WHERE question_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['question_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
  $_SESSION['error'] = 'Bad value for question_id';
  header( 'Location: mainpageAdmin.php' ) ;
  return;
}
$q = htmlentities($row['questions']);
$question_id = $row['question_id'];
$id = htmlentities($row['section_id']);

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
  <li><a href="#home"><?php  echo "<p>&nbsp<i class='fas fa-user-circle' style='font-size:24px; font-color:khaki'></i> Welcome! Admin";

  echo "</p>\n";?></a></li>
  <form method = "post">
<li style="float:right"></i><input style="margin-right:20px;background-color:#9E5A63; " type = "submit" name = "reset" value = "Logout"/></li>

    </form>

</ul>
<a style="margin-right:20px; float:right;" href="mainpageAdmin.php">Back</a>
<div class="box w3-round-xlarge" style="margin-top:40px;  background-color: #ccd4ff;">
         <h2 style="margin-bottom:20px;">&nbspEdit Question</h2>

<form method="post">
<p>Question:
<input type="text" name="questions" value="<?= $q ?>"></p>
<input type="hidden" name="question_id" value="<?= $question_id ?>">
<input type="hidden" name="section_id" value="<?= $id ?>">
<p><input type="submit" name="submit" value="Update"/></p>
</form>

</div>
</body>
</html>
