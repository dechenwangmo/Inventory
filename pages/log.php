

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
<style type="text/css">

body {overflow: hidden}; 



</style>
</head>
<body style="background: #337AB7; scroll-behavior: no;">

<div class="row "> 
<div clas= "">
<form class="form-inline" role="form" action="check.php">
              
              <h3 style="color: #fff"><b>Login</b></h3>
                <div class="form-group">
                  <input type="text" class="form-control" id="username" placeholder="Enter username">
                  <input type="password" class="form-control"  placeholder="Enter password"><br><br>
                </div>
               
            
                <div class="form-group">
               
                   <a href="#" style="color: #fff ; float: left;">Forgot Password?</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                   <button type="submit" class="btn btn-sm" style="height: 44px; background: #EFB41A; color: #000; float: right;">LOGIN</button>
                </div>
                
              
<span>              
<?php // To display Error messages
if(isset($_GET['err'])){
if ($_GET['err']==1){
echo "Invalid Credentials.Try username:codefreax, password:password";}
else if($_GET['err']==5){
echo "Successfully Logged out..";}
else if ($_GET['err']==2){
echo "Your trying to access unauthorized page.Please login first";
}
}
?>
</span>

</form>
</div>
</div>



<script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>


</html>

