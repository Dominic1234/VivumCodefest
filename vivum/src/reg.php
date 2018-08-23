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
  $grade    = 11;//strip_tags($_POST['grade']);
  $score    = strip_tags($_POST['score']);
       $sec = strip_tags($_POST['sec']);



  $sql = 'INSERT INTO std VALUES (NULL,"'.$username.'","'.$password.'","'.$fname.'",'.$grade.',"'.$sec.'",NULL, NULL);';
  $query  = mysqli_query($conn, $sql);
  echo "<script>console.log('q: ".strip_tags($sql)."');</script>";
  $cquery = mysqli_query($conn, "SELECT id FROM std WHERE uname = '$username';");

  if ($query) {
   /* $row    = mysqli_fetch_row($cquery);
    $userid = $row[0];*/


    echo "document.location.href='index.php';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=index.php">';
    //} else echo 'NO RESPONSE';
  } else { 
    echo "<div class=\"alert alert-danger\">REGISTRATION ERROR:" . mysqli_connect_error() . "</div><script>console.log('ERROR: ".mysqli_connect_error() ."');</script>";
    session_destroy();
  }

} else echo "<script>console.log('fggfdg');</script>"

?>
  <!DOCTYPE html>
  <html>

  <head>
  <head>
        <meta charset="utf-8">
        <title>viv.um</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="assets\css\bootstrap.min.css">
        <link rel="stylesheet" href="assets\css\material.min.css">
        <script src="assets\js\jquery-3.3.1.min.js"></script>
        <script src="assets\js\bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="assets\css\bootstrap.min.css.map">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <script defer src="assets/js/material.min.js"></script>
    </head>
  </head>

  <body>
    <style>
      .container{
        text-align:center;
      }
    </style>
    <div class="container">
          <h1>Register</h1>
      
      <P></P>
      <form method="post" action="reg.php">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" type="text" id="u" name="username" maxlength="50">
          <label class="mdl-textfield__label" for="u">Username</label>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" type="text" id="p" name="password" maxlength="50">
          <label class="mdl-textfield__label" for="p">Password</label>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" type="text" id="pc" name="passwordc" maxlength="50">
          <label class="mdl-textfield__label" for="pc">Confirm Password</label>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" type="text" id="f" name="fname" maxlength="50">
          <label class="mdl-textfield__label" for="f">Full Name</label>
        </div>
        <br>

       <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" type="text" id="s" name="sec" maxlength="1">
          <label class="mdl-textfield__label" for="s">Section</label>
        </div>
        <br>

        <p></p>
        <!-- <input type="submit" name="submit" value="Register" class="btn btn-success btn-block d" /> -->
        <input type="submit" value="Register" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
        <button class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--accent" onclick='window.location.replace("/")'>
  CANCEL
</button>
  </body>

  </html>