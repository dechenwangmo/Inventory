<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(isset($_SESSION['login'])) {
  if($_SESSION['login'] == 1){
    header("Location: dashboard.php");
  }
  exit();
}
?>
<html>
<head>
<title>Login Page</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="description" content="Responsive tabbed layout component built with some CSS3 and JavaScript">


    <title>Login Page</title>
      
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

   
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/common.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
<?php
if(isset($_SESSION['error'])){ ?>
  <div class="alert alert-danger" style="margin-top: 50px;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong>
    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
  </div>
<?php }
?>
  <div class="login-container">
    <form method="post" action="login_post.php" role="form" class="form-inline">
      <div class="form-group">
        <input type="text" name="username" placeholder="username" class="form-control" required="required">
      </div>
      <div class="form-group">
        <input type="password" name="password" placeholder="Password" class="form-control" required="required">
      </div>
      <div class="clearfix"></div>
      <div class="form-actions" style="padding-top: 10px">
        <a href="" class="forgot"> Forgot Password? </a>
        <button type="submit"  class="btn btn-default login pull-right">Login</button>
      </div>
    </form>
  </div>
  <div class="logo-container">
      <img src="../images/low.png" >
  </div>
</div>
</body>
</html>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>


</html>

