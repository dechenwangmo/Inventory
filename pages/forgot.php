<?php
    

    if(isset($_POST['submit']) && $_POST['submit'] = "submit")
    {

        $link = mysqli_connect("localhost", "root", "", "project");
 
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $uname = $_POST['id']; 
        $newpassword = $_POST['newpassword'];
        $confirmnewpassword = $_POST['confirmnewpassword'];


            if($newpassword == $confirmnewpassword)
            {
              $reset= "UPDATE login_details SET password = '$confirmnewpassword' WHERE id = '$uname'";

              if(mysqli_query($link, $reset))
                    {

                    header('Location: login.php');
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

            }
           
            else
            {
                echo "New password and confirm password must be the same!";
            }
        }     
    ?>

       
<!DOCTYPE html>
<html lang="en">

<head>

     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="description" content="Responsive tabbed layout component built with some CSS3 and JavaScript">

    <title>Admin Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/Responsive.dataTables.css" rel="stylesheet">

</head>

<body style="background: #337AB7;">

<div class="container" style="padding-top: 10%; ">
  
    <form id="login-form" method="post" role="form">
      
            <div class="col-md-8" style="padding-left: 35%">

               <h3 style="color: #fff; text-align: center" class="page-header">Reset Password</h3>
                <div class="form-group">
                    <input type="text" name="id" class="form-control"  placeholder="Enter Username" value="">
                </div>
                                
                <div class="form-group">
                    <input type="password" name="newpassword" class="form-control"  tabindex="1" placeholder="Enter New Password" value="">
                </div>

                <div class="form-group">
                    <input type="password" name="confirmnewpassword" class="form-control"  tabindex="1" placeholder="Re-type New Password" value="">
                </div>

                <div class="form-group" align="center">
                    <a href="login.php" class="btn btn-danger">Cancel </a> &nbsp; <button type="submit" name="submit" class="btn btn-warning">Reset Password</button> 
                </div>

            </div>
     
    </form>

  </div>

    


        <script src="../assets-login/js/jquery-1.11.1.min.js"></script>
        <script src="../assets-login/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets-login/js/jquery.backstretch.min.js"></script>
        <script src="../assets-login/js/scripts.js"></script>

</body>

</html>
