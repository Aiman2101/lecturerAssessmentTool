<?php
session_start();
include "Config.php";

// Encrypt cookie
function encryptCookie( $value ) {

   $key = hex2bin(openssl_random_pseudo_bytes(4));

   $cipher = "aes-256-cbc";
   $ivlen = openssl_cipher_iv_length($cipher);
   $iv = openssl_random_pseudo_bytes($ivlen);

   $ciphertext = openssl_encrypt($value, $cipher, $key, 0, $iv);

   return( base64_encode($ciphertext . '::' . $iv. '::' .$key) );
}

// Decrypt cookie
function decryptCookie( $ciphertext ) {

   $cipher = "aes-256-cbc";

   list($encrypted_data, $iv,$key) = explode('::', base64_decode($ciphertext));
   return openssl_decrypt($encrypted_data, $cipher, $key, 0, $iv);

}

if (isset($_SESSION["locked"])) {
  $difference = time() - $_SESSION["locked"];
  if ($difference > 10) {
    unset($_SESSION["locked"]);
    unset($_SESSION["login_attempts"]);
  }
}

// Check if $_SESSION or $_COOKIE already set
if( isset($_SESSION['auto_id']) ){
   header('Location: mainpage.php');
   exit;
}else if( isset($_COOKIE['rememberme'] )){

   // Decrypt cookie variable value
   $auto_id = decryptCookie($_COOKIE['rememberme']);

   // Fetch records
   $stmt = $pdo->prepare("SELECT count(*) as cntUser FROM student WHERE auto_id=:auto_id");
   $stmt->bindValue(':auto_id', (int)$auto_id, PDO::PARAM_INT);
   $stmt->execute();
   $count = $stmt->fetchColumn();

   if( $count > 0 ){
      $_SESSION['auto_id'] = $auto_id;
      header('Location: mainpage.php');
      exit;
   }
}

if ( isset($_POST['username']) && isset($_POST['password']) ) {
  unset($_SESSION["username"]);  // Logout current user

  if (isset($_POST['submit'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  if (($_POST['username'] == "admin") && ($_POST['password'] == "admin")) {
    header('Location: mainpageAdmin.php');
    return;
  }

  if ( strlen($username) < 1 || strlen($password) < 1 ) {
    $_SESSION["login_attempts"] += 1;
        $_SESSION["error"] = "Username and password are required";
        header("Location:login.php");
        return;
    } else {
      $query = $pdo->prepare("SELECT * FROM student WHERE username=:username");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
              $_SESSION["login_attempts"] += 1;
              $_SESSION["error"] = "Username and password combination is wrong";
              header("Location:login.php");
              return;
            } else {
              if (password_verify($password, $result['password'])) {
                $auto_id = $result['auto_id'];
                if (isset($_POST['rememberme'])) {
                  $days = 30;
                  $value = encryptCookie($auto_id);
                  setcookie("rememberme", $value, $current_time + (30 * 24 * 60 * 60));
                }
                $_SESSION['auto_id'] = $auto_id;
                $_SESSION['username'] = $username;
                $_SESSION["success"] = "Logged in.";
                header("Location: mainpage.php?id=".urlencode($auto_id));
                return;
              } else {
                $_SESSION["login_attempts"] += 1;
                $_SESSION["error"] = "Wrong Password";
                header("Location: login.php");
                return;
              }
            }
      }
    }
  }

 ?>
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html>
<head>

	<title>Teaching Assessment Tool</title>
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<style>
@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('https://michiganvirtual.org/wp-content/uploads/2020/02/survey-and-feedback.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.card-header h3{
color: white;
}

.input-group-prepend span{
width: 50px;
background-color:#F78888;
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

.overlay {
    min-height: 100%;
    min-width: 100%;
    left: 0;
    top: 0;
    background: rgba(0, 0, 0, 0.6);
}
</style>
</head>
<body>
  <div class="overlay">
<div class="container">

	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Log In</h3>

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
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username" placeholder="username">

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox" name="rememberme" value="1"/>&nbsp;Remember Me
					</div>
					<div class="form-group">
            <?php

            if (isset($_SESSION["login_attempts"]) && $_SESSION["login_attempts"] > 2) {
              $_SESSION["locked"] = time();
              echo '<script>alert("Your account have been block! Please wait for 10 seconds")</script>';
            }else{
             ?>
						<input type="submit" value="Login" name="submit" class="btn float-right login_btn">
          <?php } ?>
          </div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="signup.php">Register Here</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>
