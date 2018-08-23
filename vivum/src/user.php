<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

if (isset($_SESSION['userinfo']['id'])) {
  $u = $_SESSION['userinfo'];
  echo "<SCRIPT>console.log(\"Logged in.\")</SCRIPT>";
} else {
  echo '<script>window.location.replace("/")</script>';
  die();
}

?>
  <!DOCTYPE html>
  <html>

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

  <body>
  <style>
  .home, .ques{
    padding-top:30px;
    padding-left:30px;
    background: url('../assets/imgs/blue.png') center / cover;
    background-attachment: fixed;
    height: 300px;
  }
  </style>
<!-- Simple header with scrollable tabs. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">viv.um</span>
      <div class="mdl-layout-spacer"></div>
      <nav class="mdl-navigation">
        <span class="mdl-navigation__link">Hey, <?php echo $u['username']; ?></span>
        <a class="mdl-navigation__link" href="logout.php">Logout</a>
      </nav>

    </div>
    <!-- Tabs -->
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
      <a href="#home" class="mdl-layout__tab is-active" style="text-decoration:none;">Home</a>
      <a href="#ques" class="mdl-layout__tab">Questions</a>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title"><code>viv.um</code></span>
    <nav class="mdl-navigation">
    <span style="margin:auto;">Hey, <?php echo $u['username']; ?></span>
      <a class="mdl-navigation__link" href="#home">Home</a>
      <a class="mdl-navigation__link" href="#ques">Questions</a>
      <a class="mdl-navigation__link" href="logout.php">Logout</a>
    </nav>

  </div>
  <main class="mdl-layout__content">
    <section class="mdl-layout__tab-panel is-active" id="home">
      <div class="page-content">
      <div class='home mdl-tabs__panel is-active'>
        <h1>home.div</h1>
        <p><div id="overallp" class="mdl-progress mdl-js-progress"></div></p>
      </div>
      </div>
    </section>
    <section class="mdl-layout__tab-panel" id="ques">
      <div class="page-content">
      <div class='ques mdl-tabs__panel' id='ques'>
        <h1>questions.div</h1>
        <p><div id="quesp" class="mdl-progress mdl-js-progress"></div></p>
      </div>
      <h2>questions to solve<h2>
      </div>
    </section>
  </main>
</div>
<script>
  document.querySelector('#overallp').addEventListener('mdl-componentupgraded', function() {
    this.MaterialProgress.setProgress(<?php echo $u['grade'];?>);
  });
  document.querySelector('#overallp').addEventListener('mdl-componentupgraded', function() {
    this.MaterialProgress.setProgress(<?php echo $u['score'];?>);
  });

</script>
  </body>

  </html>
