<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
/**
 * @param $string
 */
function sha512($string) {return hash('sha512', $string);}

if ($_POST['submit'] && isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['fname']) && !empty($_POST['fname']) && isset($_POST['lname'])
&& !empty($_POST['lname'])&& isset($_POST['email']) && !empty($_POST['email']) && $_POST['password'] == $_POST['passwordc']) {
  include_once 'connection.php';
  $username = strip_tags($_POST['username']);
  //$uniqueid = uniqid();
  $password = sha512(strip_tags($_POST['password']));
  $fname    = strip_tags($_POST['fname']);
  $lname    = strip_tags($_POST['lname']);
  $email    = strip_tags($_POST['email']);
      $hash = md5( rand(0,1000) );


  $sql = "INSERT INTO `members` (`id`, `username`, `password`, `fname`, `lname`, `email`, `regdate`, `hash`, `active`) VALUES (NULL,'$username','$password','$fname','$lname','$email',CURRENT_TIMESTAMP,'$hash',0);";
  $query  = mysqli_query($conn, $sql);
  echo $query;
  $cquery = mysqli_query($conn, "SELECT `id` FROM `members` WHERE `username` = '$username' LIMIT 1;");

  if ($query && $cquery) {
    //reCAPTCHA
    /*require_once "recaptchalib.php";

    $secret = "6LeY7w4TAAAAADTLNdrOntc94HIo7k93OljjIJPN";
    $response = null;
    $reCaptcha = new ReCaptcha($secret);

    if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
    $_SERVER["REMOTE_ADDR"],
    $_POST["g-recaptcha-response"]
    );
    }*/

    $row    = mysqli_fetch_row($cquery);
    $userid = $row[0];

    //if ($response != null && $response->success) {
    //$_SESSION["id"]       = $userid;
   // $_SESSION['username'] = $username;
    // $hash = md5( rand(0,1000) );
    //$epass = rand(1000,5000);

$to      = $email; // Send email to our user
$subject = 'randomthoughts | verification'; // Give the email a subject
    $headers = 'From:"randomthoughts" <noreply@imagifight.in>'."\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $message = "
<!DOCTYPE html>
<html>

<body style='font-family:Whitney, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif'>
	<h2><code>randomthoughts</code></h2>
	<center>
		<h1>hey $username".",</h1>
		<br/> Thanks for registering with us. There's just one more step: verify your email address.
		<p></p>
		<a style='background-color: #008CBA;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;' href='http://randomthoughts.imagifight.in/auth/verify?hash=$hash"."&email=$email'>Verify your email</a>
		<p></p>
		<span style='color:gray;font-size:70%'>
			or, copy and paste this link in your browser:
			<br><b><a style='color:gray;' href='http://randomthoughts.imagifight.in/auth/verify?hash=$hash"."&email=$email'>http://randomthoughts.imagifight.in/auth/verify?hash=$hash"."&email=$email</a></b>
			</span>
		<p></p>
		<hr>
		<span style='color:gray;font-size:70%'>This message was sent to <u>$email</u>
		<br><a style='color:gray;' href='randomthoughts.imagifight.in'>randomthoughts.imagifight.in</a>
		</span>
	</center>
</body>
</html>";
    mail($email, $subject, $message, $headers);
    $msg = "Registered successfully. Verify your email before logging in.";
    //header("Location: user");
    $URL = "http://randomthoughts.imagifight.in/auth";
    echo "<script type='text/javascript'>alert('Verify email before logging in.');document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    //} else echo 'NO RESPONSE';
  } else {
    echo "<span style='color:red;'>Oh Noes! There was an error registering you. Please reload the page and try again.</span>";
    echo mysqli_connect_error();
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
        <?php
    if(isset($msg)){  // Check if $msg is not empty
        echo '<div class="alert alert-success">'.$msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
    }
?>
          <h1 style="color:#fefefe;">Register</h1></center>
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
          <label for="f">First name</label>
          <input type="text" name="fname" placeholder="fname" class="form-control" id="f" required="true" maxlength="30" autocomplete="off" />
          <br />
          <label for="l">Last name</label>
          <input type="text" name="lname" placeholder="lname" class="form-control" id="l" required="true" maxlength="30" autocomplete="off" />
          <br />
        </div>
        <div class="form-group">
          <label for="e"><span class="glyphicon glyphicon-email"></span> Email</label>
          <input type="email" name="email" placeholder="email" class="form-control" id="e" required="true" maxlength="50" autocomplete="off" />
          <br />
        </div>
        <!--<div class="g-recaptcha" data-sitekey="6LeY7w4TAAAAAPz6v1B-HLTH0HxS_Kn_694qikTb" data-theme="dark"></div>-->
        <p></p>
        <input type="submit" name="submit" value="Register" class="btn btn-success btn-block d" />
      </form>
  </body>

  </html>