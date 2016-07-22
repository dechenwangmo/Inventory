<html>
<head>
<title>Login Page</title>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login </title>
      
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

   
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>
body {overflow: hidden}; 

</style>
</head>
<body style="background: #337AB7">
<style type="text/css">
input {
   
    height: 30px;
    width: 220px;
}
</style>
<table style="margin:0px auto">
<form name="form1" method="post" action="check.php " >
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <div class="row" align="right" style="padding-right: 10%">
  <div class="form-group">
    <p>
      
      <input type="text" name="uname" id="textfield"  placeholder="username" >
      <input type="password" name="pwd" id="textfield2"  placeholder="password" >
  </p>
  </div>
  </div>
  
  <tr><td></td><td width="50px"><span style="color:#E21111;font-size:12px;">
<?php // To display Error messages
if(isset($_GET['err'])){
if ($_GET['err']==1){
  $message = "Username and/or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
else if($_GET['err']==5){
echo "Successfully Logged out..";}
else if ($_GET['err']==2){
echo "Your trying to access unauthorized page.Please login first";
}
}
?>
</span></td></tr>
<div class="row" align="right" style="padding-right: 10%">
    <p>
    
     <button type="submit" class="btn btn-xs" style="height: 40px; background: #0000FF; color: #fff;float: 10% ; float: right; width: 75px">LOGIN</button>
   <a href="forgot.php" style="color: #fff; font-size: 15px; " >Forgot Password?</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   </p>
  </div>
  </table>
  

  <div class="row" align="right" style="padding-top: 5%">
    <p>
    
      <img src="../images/acc.png" >
    </p>
  </div>
   <div class="row" align="center" style="float: right; padding-top: 1%; padding-right: 15%">
    <p>
    
      <img src="../images/acc_tel.jpg" >
    </p>
  </div>
  <div class="row" align="left" style="padding-top:.1% ">
    <p>
    
      <img src="../images/acc_build_burned.png" width="35%" height="310px">
    </p>
  </div>
  
 
</form>
</body>
</html>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>


</html>

