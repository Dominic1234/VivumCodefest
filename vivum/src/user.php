<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

if (isset($_SESSION['userinfo']['id'])) {
  $u = $_SESSION['userinfo'];
  echo "<SCRIPT>console.log(\"Logged in.\")</SCRIPT>";
} else {
  header('Location: /401');
  die();
}

?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <title>Members Area</title>
    <meta name="description" content="A website for random stuff">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-scope" content="profile email">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!--<link href="http://www.imagifight.in/favicon.ico" rel="shortcut icon">-->
    <!--<meta property="og:image" content="http://www.imagifight.in/favicon.ico" />-->
  </head>

  <body>
    <div class="container">
      You shouldn't be seeing this
      <br>You shouldn't be seeing this
      <br>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">members.imagifight.in</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="u/profile">Profile</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <center>
        <h1>Members area</h1></center>
      Welcome,
      <?php echo $u["username"]; ?>. You are logged in. Your user ID is
        <?php echo $u['id']; ?>.
          <div class="jumbotron">
            <h2>Achieve premium...</h2> uh, stuff
            <br>Things coming up soon.
            <br>So are user profiles.
            <br>And everything else.
          </div>
    </div>
  </body>

  </html>
