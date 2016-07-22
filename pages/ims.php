<?php
    // check if logged in and admin
    require 'admin_role.php';

    $link = mysqli_connect("localhost", "root", "", "project");
 
    if($link === false)
    {
       die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    if(isset($_POST['add']))
    {
        $case_no = mysqli_real_escape_string($link, $_POST['case_no']);
        $investigator = mysqli_real_escape_string($link, $_POST['investigator']);
        $suspect = mysqli_real_escape_string($link, $_POST['suspect']);

        $sql = "INSERT INTO ims ( case_no, investigator, suspect)  VALUES ('$case_no', '$investigator', '$suspect')";

    if(mysqli_query($link, $sql))
            {
            $_SESSION['message'] = 'New Case added successfully!';
            ?>
            <script type="text/javascript">
                window.location.href = "cases.php";
            </script>
            <?php
            } 
            else
            {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
    }
            mysqli_close($link);

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Report</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../assets/css/datepicker.css">
  

</head>

<body style="background-color: #133E63">
<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse" role="navigation" style="margin-bottom: 0">
       
            <div class="navbar-header" style="background: #337AB7">
               <h1 align="center">
                <img src="../images/header.png"> 
                </h1> 
            </div>
      
                
            <ul class="nav navbar-nav" style="padding: 0 0 0 10%">
                <li>
                    <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"> </i> Dashboard</a>
                </li>

                        <li class="active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cases <span class="caret"></span></a>
                            <ul class="dropdown-menu" >
                                <li>
                                    <a href="cases.php">Registered Cases</a>
                                </li>
                                <li>
                                    <a href="ims.php">Add New Cases</a>
                                </li>
                            </ul>

                        </li>

                        <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">Report Options <span class="caret"></span></a>
                            
                            <ul class="dropdown-menu" >
                                <li>
                                    <a href="report.php">By Case No.</a>
                                </li>
                                <li>
                                    <a href="investigator.php">By Investigators</a>
                                </li>
                                 <li>
                                    <a href="seized_ref.php">By Seized Reference No</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi, <?php echo $_SESSION['username']; ?> !</a>
                              <ul class="dropdown-menu">
                                <li></li>
                                <li><a href="profile.php"><span class="glyphicon glyphicon-pencil"></span> Edit My Profile</a></li>
                                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                                
                              </ul>
                      </li>
                    </ul>
         
        </nav>

        <div id="page-wrapper">
        
        <form role="form" action="" method="POST">

            <div class="row" style="padding: 0 25% 0 10%"> 
             <div class="col-lg-8" style="float: right;">
              <?php
            if(isset($_SESSION['message'])){ ?>
              <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
              </div>
            <?php }
            ?>   
            <br>
                    <h2 align="center" class="page-header">Add New Case</h2> <br>
                    <div class="form-group">
                        <label>Case No.</label>
                        <input type="text" class="form-control" name="case_no" required >
                    </div>
                    
                     <div class="form-group">
                                <label>Investigator</label>
                                <input type="text" class="form-control" name="investigator" required >
                     </div> 

                    <div class="form-group">
                                <label>Suspect</label>
                               <input type="text" class="form-control" name="suspect" required >
                    </div> 
                                             
                </div>
            </div>
             <div class="row">
                    <br>

                    <div class="form-group" align="center">                         
                        <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-ok">&nbsp;</span>Add</button>
                         &nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove">&nbsp;</span>Reset</button>
                    </div>
               
                </div>
                   
         </form>
       
       
        </div> <!-- /page-wrapper -->
    </div>  <!-- /#-wrapper -->

    <footer>

        <p style="color: #fff; text-align: center; padding-top: 10px">
                    Copyright © 2016 Office of the Anti-Corruption Commission, Thimphu, Post Box 1113, Phone: +975-2-334863/64/66/69 -Asset -337423, Fax: +975-2-334865
                    </p>
    </footer>

    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script src="../assets/js/jquery-1.9.1.min.js"></script>
    <script src="../assets/js/bootstrap-datepicker.js"></script>

     

</body>

</html>
