<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
/**
 * @param $string
 */
function sha512($string) {return hash('sha512', $string);}

if ($_POST['submit'] && isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['fname']) && !empty($_POST['fname']) //&& isset($_POST['lname']) && !empty($_POST['lname'])&& isset($_POST['email']) && !empty($_POST['email'])
 && $_POST['password'] == $_POST['passwordc'] && !empty($_POST['password'])) {
  include_once 'connection.php';
  $username = strip_tags($_POST['username']);
  //$uniqueid = uniqid();
  $password = strip_tags($_POST['password']);
  $fname    = strip_tags($_POST['fname']);
  $grade    = strip_tags($_POST['grade']);
  $score    = strip_tags($_POST['score']);
       $sec = strip_tags($_POST['sec']);



  $sql = "INSERT INTO std VALUES (NULL,'$username','$password','$fname','$grade','$score','$sec', NULL);";
  $query  = mysqli_query($conn, $sql);
  echo $query;
  $cquery = mysqli_query($conn, "SELECT id FROM std WHERE uname = '$username';");

  if ($query && $cquery) {
    $row    = mysqli_fetch_row($cquery);
    $userid = $row[0];


    echo "document.location.href='login.php';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=login.php">';
    //} else echo 'NO RESPONSE';
  } else { ?>
    <div class="alert alert-danger">REGISTRATION ERROR: 
    <?
    echo mysqli_connect_error() . "</div>";
    session_destroy();
  }

}

?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="description" content="A website for random stuff">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-scope" content="profile email">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="http://www.imagifight.in/w3.css" rel="stylesheet" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="http://www.imagifight.in/favicon.ico" rel="shortcut icon">
    <meta property="og:image" content="http://www.imagifight.in/favicon.ico" />
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>
    <style>
      body {
        background-color: #222222;
        color: #555555;
      }

      .form-control {
        background-color: #666666 !important;
        color: white;
      }
    </style>
    <div class="container">
      <center>
          <h1 style="color:#fefefe;">Register</h1>
      </center>
      <P></P>
      <form method="post" action="register.php">
        <div class="form-group">
          <label for="y"><span class="glyphicon glyphicon-user"></span> Username</label>
          <input type="text" name="username" placeholder="Username" class="form-control" id="y" required="true" maxlength="30" autocomplete="off" />
          <br />
        </div>
        <div class="form-group">
          <label for="z"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
          <input type="password" name="password" placeholder="Password" class="form-control" id="z" required="true" maxlength="30" autocomplete="off" />
        </div>
        <div class="form-group">
          <label for="p"><span class="glyphicon glyphicon-eye-open"></span> Confirm Password</label>
          <input type="password" name="passwordc" placeholder="Confirm Password" class="form-control" id="p" required="true" maxlength="30" autocomplete="off" />
        </div>
        <div class="form-group">
          <label for="f">Full Name</label>
          <input type="text" name="fname" placeholder="fname" class="form-control" id="f" required="true" maxlength="30" autocomplete="off" />
          <br />
        </div>
        <div class="form-group">
          <label for="e"><span class="glyphicon glyphicon-email"></span> Email</label>
          <input type="email" name="email" placeholder="email" class="form-control" id="e" required="true" maxlength="50" autocomplete="off" />
          <br />
        </div>
        <p></p>
        <input type="submit" name="submit" value="Register" class="btn btn-success btn-block d" />
      </form>
  </body>

  </html>