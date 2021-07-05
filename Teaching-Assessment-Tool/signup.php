<?php
session_start();
include "Config.php";

$inputname = isset($_POST['name']) ? $_POST['name'] : '';
$inputmatricNo = isset($_POST['matricNo']) ? $_POST['matricNo'] : '';
$inputusername = isset($_POST['username']) ? $_POST['username'] : '';
$inputpass = isset($_POST['pass']) ? $_POST['pass'] : '';
$inputpass2 = isset($_POST['pass2']) ? $_POST['pass2'] : '';

if (isset($_POST['submit'])) {
  if ( isset($_POST['name']) && isset($_POST['matricNo']) && isset($_POST['username'])
  && isset($_POST['pass']) && isset($_POST['pass2'])) {
    $name = htmlentities($_POST['name']);
    $matricNo = htmlentities($_POST['matricNo']);
    $username = htmlentities($_POST['username']);
    $pass = htmlentities($_POST['pass']);
    $pass2 = htmlentities($_POST['pass2']);
    $hashedPwd = password_hash($pass, PASSWORD_BCRYPT);
    $query = $pdo->prepare("SELECT * FROM student WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();

    if (strlen($name) < 1 || strlen($matricNo) < 1 || strlen($username) < 1 || strlen($pass) < 1){
      $_SESSION["error"] = "All fields are required";
      header("Location:signup.php");
      return;
    }else if ($query->rowCount()>0) {
      $_SESSION["error"] = "Username is already taken";
      header("Location:signup.php");
      return;
    }else if ($pass != $pass2) {
      $_SESSION["error"] = "Password not match";
      header("Location:signup.php");
      return;
    } else if ($query->rowCount() == 0) {
      $query = $pdo->prepare('INSERT INTO student(name, matricNo, username, password) VALUES (:name, :matricNo, :username, :hashedPwd)');
      /**$stmt->execute(array(
        ':name' => $name,
        ':position' => $position,
        ':username' => $username,
        ':password' => $hashedPwd));**/
        $query->bindParam("name", $name, PDO::PARAM_STR);
        $query->bindParam("matricNo", $matricNo, PDO::PARAM_STR);
        $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("hashedPwd", $hashedPwd, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
              $_SESSION["success"] = "Successfully sign up!";
              header("Location:signup.php");
              return;
            } else {
              $_SESSION["error"] = "Something went wrong";
              header("Location:signup.php");
              return;
            }
  }
}
}

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Teaching Assessment Tool</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <!--Fontawesome CDN-->
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<style>
@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('https://michiganvirtual.org/wp-content/uploads/2020/02/survey-and-feedback.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.overlay {
    position: absolute;
    min-height: 100%;
    min-width: 100%;
    left: 0;
    top: 0;
    background: rgba(0, 0, 0, 0.6);
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 750px;
margin-top: 60px;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.card-header h3{
color: white;
}

.input-group-prepend span{
width: 50px;
background-color: #F78888;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #F78888;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
}
</style>
  </head>
<body>

<div class="overlay">
  <div class="container">

  	<div class="d-flex justify-content-center h-100">
  		<div class="card">
  			<div class="card-header">
  				<h3>Sign Up</h3>

  			</div>
  			<div class="card-body">
          <?php
          if(isset($_SESSION["error"])){
            echo('<p style="color:red">'.$_SESSION["error"]."</p>\n");
            unset($_SESSION["error"]);
          }
          if(isset($_SESSION["success"])){
            echo('<p style="color:green">'.$_SESSION["success"]."</p>\n");
            unset($_SESSION["success"]);
          }
          ?>
  				<form method="post">
  						<label for="name" style="color:white;">Name: </label>
              <input type="text" class="form-control" name="name" placeholder="Enter your name" value="<?= htmlentities($inputname) ?>"><br/>
              <label for="position" style="color:white;">Matric No: </label>
              <input type="text" class="form-control" name="matricNo" placeholder="Enter your matric number" value="<?= htmlentities($inputmatricNo) ?>"><br/>
              <label for="username" style="color:white;">Username: </label>
              <input type="text" class="form-control" name="username" placeholder="Enter your username" value="<?= htmlentities($inputusername) ?>"><br/>
              <label for="pass" style="color:white;">Password: </label>
              <input type="password" class="form-control" name="pass" placeholder="Enter your password" value="<?= htmlentities($inputpass) ?>"><br/>
              <label for="pass2" style="color:white;">Confirm Password: </label>
              <input type="password" class="form-control" name="pass2" placeholder="Re-enter your password" value="<?= htmlentities($inputpass2) ?>"><br/>
              <br/><input type="submit" value="Sign Up" name="submit" class="btn float-right login_btn">
  				</form>
  			</div>
  			<div class="card-footer">
  				<div class="d-flex justify-content-center links">
  					Already have an account?<a href="login.php">Log In here</a>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
</div>

      <script  src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-
        /xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
      </script>
      <script src="main.js"></script>
</body>
</html>
