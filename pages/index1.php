<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM ims";
$result = $con->query($sql);


$sql_ele1="SELECT * FROM electronics WHERE status = 'under Custody' " ;
if ($result=mysqli_query($con,$sql_ele1))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);


  mysqli_free_result($result);
  }
$sql2="SELECT * FROM electronics WHERE status = 'Returned' " ;
if ($result=mysqli_query($con,$sql2))
  {
  // Return the number of rows in result set
  $rowcount1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
$sql3="SELECT * FROM electronics WHERE status = 'OAG' " ;

if ($result=mysqli_query($con,$sql3))
  {
  // Return the number of rows in result set
  $rowcount2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
 
$sql4="SELECT * FROM electronics WHERE status = 'Auctioned' " ;


if ($result=mysqli_query($con,$sql4))
  {
  // Return the number of rows in result set
  $rowcount3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  
  




// Print out result

 // land

 $sql5="SELECT * FROM land WHERE status = 'under Custody' " ;
   if ($result=mysqli_query($con,$sql5))
  {
  // Return the number of rows in result set
  $rowcount_land1=mysqli_num_rows($result);

  
  mysqli_free_result($result);
  }
$sql6="SELECT * FROM land WHERE status = 'Returned' " ;
if ($result=mysqli_query($con,$sql6))
  {
  // Return the number of rows in result set
  $rowcount_land2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
$sql7="SELECT * FROM land WHERE status = 'OAG' " ;

if ($result=mysqli_query($con,$sql7))
  {
  // Return the number of rows in result set
  $rowcount_land3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

$sql8="SELECT * FROM land WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($con,$sql8))
  {
  // Return the number of rows in result set
  $rowcount_land4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
// buildings

  $sql9="SELECT * FROM buildings WHERE status = 'under Custody' " ;
   if ($result=mysqli_query($con,$sql9))
  {
  // Return the number of rows in result set
  $rowcount_bu1=mysqli_num_rows($result);

  
  mysqli_free_result($result);
  }
$sql10= "SELECT * FROM buildings WHERE status = 'Returned' " ;
if ($result=mysqli_query($con,$sql10))
  {
  // Return the number of rows in result set
  $rowcount_bu2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
$sql11="SELECT * FROM buildings WHERE status = 'OAG' " ;

if ($result=mysqli_query($con,$sql11))
  {
  // Return the number of rows in result set
  $rowcount_bu3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

$sql12="SELECT * FROM buildings WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($con,$sql12))
  {
  // Return the number of rows in result set
  $rowcount_bu4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

//jew

  $sql_j1="SELECT * FROM jewleries WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($con,$sql_j1))
  {
  // Return the number of rows in result set
  $rowcount_j1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  $sql_j2="SELECT * FROM jewleries WHERE status = 'Returned' " ;

if ($result=mysqli_query($con,$sql_j2))
  {
  // Return the number of rows in result set
  $rowcount_j2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_j3="SELECT * FROM jewleries WHERE status = 'OAG' " ;

if ($result=mysqli_query($con,$sql_j3))
  {
  // Return the number of rows in result set
  $rowcount_j3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_j4="SELECT * FROM jewleries WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($con,$sql_j4))
  {
  // Return the number of rows in result set
  $rowcount_j4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  //firearms
   $sql_f1="SELECT * FROM firearms WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($con,$sql_f1))
  {
  // Return the number of rows in result set
  $rowcount_f1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_f2="SELECT * FROM firearms WHERE status = 'Returned' " ;

if ($result=mysqli_query($con,$sql_f2))
  {
  // Return the number of rows in result set
  $rowcount_f2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_f3="SELECT * FROM firearms WHERE status = 'OAG' " ;

if ($result=mysqli_query($con,$sql_f3))
  {
  // Return the number of rows in result set
  $rowcount_f3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_f4="SELECT * FROM firearms WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($con,$sql_f4))
  {
  // Return the number of rows in result set
  $rowcount_f4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
//cash in hand 
     $sql_cash1="SELECT * FROM cash WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($con,$sql_cash1))
  {
  // Return the number of rows in result set
  $rowcount_cash1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_cash2="SELECT * FROM cash WHERE status = 'Returned' " ;

if ($result=mysqli_query($con,$sql_cash2))
  {
  // Return the number of rows in result set
  $rowcount_cash2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_cash3="SELECT * FROM cash WHERE status = 'OAG' " ;

if ($result=mysqli_query($con,$sql_cash3))
  {
  // Return the number of rows in result set
  $rowcount_cash3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_cash4="SELECT * FROM cash WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($con,$sql_cash4))
  {
  // Return the number of rows in result set
  $rowcount_cash4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  // cash in bank
     $sql_bank1="SELECT * FROM bank WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($con,$sql_bank1))
  {
  // Return the number of rows in result set
  $rowcount_bank1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_bank2="SELECT * FROM bank WHERE status = 'Returned' " ;

if ($result=mysqli_query($con,$sql_bank2))
  {
  // Return the number of rows in result set
  $rowcount_bank2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_bank3="SELECT * FROM bank WHERE status = 'OAG' " ;

if ($result=mysqli_query($con,$sql_bank3))
  {
  // Return the number of rows in result set
  $rowcount_bank3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_bank4="SELECT * FROM bank WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($con,$sql_bank4))
  {
  // Return the number of rows in result set
  $rowcount_bank4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }


  //bankacc

  $sql_acc1="SELECT * FROM bankacc WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($con,$sql_acc1))
  {
  // Return the number of rows in result set
  $rowcount_acc1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_acc2="SELECT * FROM bankacc WHERE status = 'Returned' " ;

if ($result=mysqli_query($con,$sql_acc2))
  {
  // Return the number of rows in result set
  $rowcount_acc2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_acc3="SELECT * FROM bankacc WHERE status = 'OAG' " ;

if ($result=mysqli_query($con,$sql_acc3))
  {
  // Return the number of rows in result set
  $rowcount_acc3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_acc4="SELECT * FROM bankacc WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($con,$sql_acc4))
  {
  // Return the number of rows in result set
  $rowcount_acc4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  ///shares

  $sql_sha1="SELECT * FROM shares WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($con,$sql_sha1))
  {
  // Return the number of rows in result set
  $rowcount_sha1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  $sql_sha2="SELECT * FROM shares WHERE status = 'Returned' " ;

if ($result=mysqli_query($con,$sql_sha2))
  {
  // Return the number of rows in result set
  $rowcount_sha2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_sha3="SELECT * FROM shares WHERE status = 'OAG' " ;

if ($result=mysqli_query($con,$sql_sha3))
  {
  // Return the number of rows in result set
  $rowcount_sha3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_sha4="SELECT * FROM shares WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($con,$sql_sha4))
  {
  // Return the number of rows in result set
  $rowcount_sha4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  //emails

  $sql_em1="SELECT * FROM emails WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($con,$sql_em1))
  {
  // Return the number of rows in result set
  $rowcount_em1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  $sql_em2="SELECT * FROM emails WHERE status = 'Returned' " ;

if ($result=mysqli_query($con,$sql_em2))
  {
  // Return the number of rows in result set
  $rowcount_em2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_em3="SELECT * FROM emails WHERE status = 'OAG' " ;

if ($result=mysqli_query($con,$sql_em3))
  {
  // Return the number of rows in result set
  $rowcount_em3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_em4="SELECT * FROM emails WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($con,$sql_em4))
  {
  // Return the number of rows in result set
  $rowcount_em4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  //doc

  $sql_doc1="SELECT * FROM document WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($con,$sql_doc1))
  {
  // Return the number of rows in result set
  $rowcount_doc1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  $sql_doc2="SELECT * FROM document WHERE status = 'Returned' " ;

if ($result=mysqli_query($con,$sql_doc2))
  {
  // Return the number of rows in result set
  $rowcount_doc2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_doc3="SELECT * FROM document WHERE status = 'OAG' " ;

if ($result=mysqli_query($con,$sql_doc3))
  {
  // Return the number of rows in result set
  $rowcount_doc3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_doc4="SELECT * FROM document WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($con,$sql_doc4))
  {
  // Return the number of rows in result set
  $rowcount_doc4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  // veh
  $sql_vm1="SELECT * FROM vehicles_machineries WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($con,$sql_vm1))
  {
  // Return the number of rows in result set
  $rowcount_vm1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  $sql_vm2="SELECT * FROM vehicles_machineries WHERE status = 'Returned' " ;

if ($result=mysqli_query($con,$sql_vm2))
  {
  // Return the number of rows in result set
  $rowcount_vm2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_vm3="SELECT * FROM vehicles_machineries WHERE status = 'OAG' " ;

if ($result=mysqli_query($con,$sql_vm3))
  {
  // Return the number of rows in result set
  $rowcount_vm3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_vm4="SELECT * FROM vehicles_machineries WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($con,$sql_vm4))
  {
  // Return the number of rows in result set
  $rowcount_vm4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  //others
  $sql_o1="SELECT * FROM others WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($con,$sql_o1))
  {
  // Return the number of rows in result set
  $rowcount_o1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  $sql_o2="SELECT * FROM others WHERE status = 'Returned' " ;

if ($result=mysqli_query($con,$sql_o2))
  {
  // Return the number of rows in result set
  $rowcount_o2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_o3="SELECT * FROM others WHERE status = 'OAG' " ;

if ($result=mysqli_query($con,$sql_o3))
  {
  // Return the number of rows in result set
  $rowcount_o3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_o4="SELECT * FROM others WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($con,$sql_o4))
  {
  // Return the number of rows in result set
  $rowcount_o4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
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

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-home"></i></a>
            </div>
            <!-- /.navbar-header -->
             <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Dechen</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>ffffffsdadasdadad...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Kezang</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>sdadadsadadsadsadsadsada...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Ugyen</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>yyyyyyyyyyyyy...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!--
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"> </i> Dashboard</a>
                        </li>
                        <li>
                            <a href="cases.php"><i class="fa fa-table fa-fw"> </i> Registered Cases</a>
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Report Options<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="report.php">Case No.</a>
                                </li>
                                <li>
                                    <a href="investigator.php">Investigators</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        

                        <li>
                            <a href="login.html"> <i class="glyphicon glyphicon-log-out"> </i> Logout</span></a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            
       <body>
     <table class="table table-striped table-bordered"  align="center" >
            <thead>
              <tr class="success">
                <th>Items</th>

                <th>Under Custody</th>
                <th>Returned</th>
                <th>OAG</th>
                <th>Auctioned</th>
                <th>Total</th>
                

              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Electronics</td>
                <td><?php echo $rowcount; ?> </td>
                <td><?php echo $rowcount1; ?> </td>
                <td><?php echo $rowcount2; ?> </td>
                <td><?php echo $rowcount3; ?> </td>
                <td><?php echo $electronics_total = $rowcount+$rowcount1+$rowcount2+$rowcount3; ?> </td>
              </tr>
              <tr>
                <td>Land</td>
                <td><?php echo $rowcount_land1; ?> </td>
                <td><?php echo $rowcount_land2; ?> </td>
                <td><?php echo $rowcount_land3; ?> </td>
                <td><?php echo $rowcount_land4; ?> </td>
                <td><?php echo $land_total = $rowcount_land1+$rowcount_land2+$rowcount_land3+$rowcount_land4; ?> </td>
              </tr>


               <?php

            $sql_bu= "SELECT COUNT(status) FROM buildings  "; 
            $result = mysqli_query($con, $sql_bu) or die(mysqli_error());

               while($row = mysqli_fetch_row($result)){
            ?>
              <tr>
                <td>Buildings</td>
                <td><?php echo $rowcount_bu1; ?> </td>
                <td><?php echo $rowcount_bu2; ?> </td>
                <td><?php echo $rowcount_bu3; ?> </td>
                <td><?php echo $rowcount_bu4; ?> </td>
                <td><?php echo $row [0]; ?> </td>
              
            <?php } ?>
             
              </tr>
              <?php
            $sql_jew= "SELECT COUNT(status) FROM jewleries  "; 
            $result = mysqli_query($con, $sql_jew) or die(mysqli_error());

               while($row = mysqli_fetch_row($result)){
            ?>

              <tr>
                <td>Jewelries</td>
                <td><?php echo $rowcount_j1; ?> </td>
                <td><?php echo $rowcount_j2; ?> </td>
                <td><?php echo $rowcount_j3; ?> </td>
                <td><?php echo $rowcount_j4; ?> </td>
                <td><?php echo $row [0]; ?> </td>
              
            <?php } ?>
              </tr>
              <?php
            $sql_fire= "SELECT COUNT(status) FROM firearms  "; 
            $result = mysqli_query($con, $sql_fire) or die(mysqli_error());

               while($row = mysqli_fetch_row($result)){
            ?>
              <tr>
                <td>Firearms</td>
                <td><?php echo $rowcount_f1; ?> </td>
                <td><?php echo $rowcount_f2; ?> </td>
                <td><?php echo $rowcount_f3; ?> </td>
                <td><?php echo $rowcount_f4; ?> </td>
                <td><?php echo $row [0]; ?> </td>
              
            <?php } ?>
              </tr>
              
              <tr>
              <?php
            $sql_cash= "SELECT COUNT(status) FROM cash  "; 
            $result = mysqli_query($con, $sql_cash) or die(mysqli_error());

               while($row = mysqli_fetch_row($result)){
            ?>
                <td>Cash In Hand</td>
                <td><?php echo $rowcount_cash1; ?> </td>
                <td><?php echo $rowcount_cash2; ?> </td>
                <td><?php echo $rowcount_cash3; ?> </td>
                <td><?php echo $rowcount_cash4; ?> </td>
                <td><?php echo $row [0]; ?> </td>
              
            <?php } ?>
                
              </tr>
              <?php
            $sql_bank= "SELECT COUNT(status) FROM bank  "; 
            $result = mysqli_query($con, $sql_bank) or die(mysqli_error());

               while($row = mysqli_fetch_row($result)){
            ?>
              <tr>
                <td> Cash In Bank </td>
                <td><?php echo $rowcount_bank1; ?> </td>
                <td><?php echo $rowcount_bank2; ?> </td>
                <td><?php echo $rowcount_bank3; ?> </td>
                <td><?php echo $rowcount_bank4; ?> </td>
                <td><?php echo $row [0]; ?> </td>
              
            <?php } ?>
              </tr>

              <?php
            $sql_acc= "SELECT COUNT(status) FROM bankacc  "; 
            $result = mysqli_query($con, $sql_acc) or die(mysqli_error());

               while($row = mysqli_fetch_row($result)){
            ?>
               <tr>
                <td>Bank Accounts</td>
                <td><?php echo $rowcount_acc1; ?> </td>
                <td><?php echo $rowcount_acc2; ?> </td>
                <td><?php echo $rowcount_acc3; ?> </td>
                <td><?php echo $rowcount_acc4; ?> </td>
                <td><?php echo $row [0]; ?> </td>
              
            <?php } ?>
              </tr>
              <tr>
              <?php
            $sql_sha= "SELECT COUNT(status) FROM shares  "; 
            $result = mysqli_query($con, $sql_sha) or die(mysqli_error());

               while($row = mysqli_fetch_row($result)){
            ?>
                <td>Shares</td>
                <td><?php echo $rowcount_sha1; ?> </td>
                <td><?php echo $rowcount_sha2; ?> </td>
                <td><?php echo $rowcount_sha3; ?> </td>
                <td><?php echo $rowcount_sha4; ?> </td>
                <td><?php echo $row [0]; ?> </td>
              
            <?php } ?>
              </tr>

              <tr>
              <?php
            $sql_em= "SELECT COUNT(status) FROM emails  "; 
            $result = mysqli_query($con, $sql_em) or die(mysqli_error());

               while($row = mysqli_fetch_row($result)){
            ?>
                <td>Emails</td>
                <td><?php echo $rowcount_em1; ?> </td>
                <td><?php echo $rowcount_em2; ?> </td>
                <td><?php echo $rowcount_em3; ?> </td>
                <td><?php echo $rowcount_em4; ?> </td>
                <td><?php echo $row [0]; ?> </td>
              
            <?php } ?>
              </tr>

               <tr>
                <?php
            $sql_doc= "SELECT COUNT(status) FROM document  "; 
            $result = mysqli_query($con, $sql_doc) or die(mysqli_error());

               while($row = mysqli_fetch_row($result)){
            ?>
                <td>Documents</td>
                <td><?php echo $rowcount_doc1; ?> </td>
                <td><?php echo $rowcount_doc2; ?> </td>
                <td><?php echo $rowcount_doc3; ?> </td>
                <td><?php echo $rowcount_doc4; ?> </td>
                <td><?php echo $row [0]; ?> </td>
              
            <?php } ?>
              </tr>
              
              
              <tr>
              <?php
            $sql_vm= "SELECT COUNT(status) FROM vehicles_machineries  "; 
            $result = mysqli_query($con, $sql_vm) or die(mysqli_error());

               while($row = mysqli_fetch_row($result)){
            ?>
                <td>Vehicles and Machineries</td>
                <td><?php echo $rowcount_vm1; ?> </td>
                <td><?php echo $rowcount_vm2; ?> </td>
                <td><?php echo $rowcount_vm3; ?> </td>
                <td><?php echo $rowcount_vm4; ?> </td>
                <td><?php echo $row [0]; ?> </td>
              
            <?php } ?>


              </tr>

              <tr>
              <?php
            $sql_other= "SELECT COUNT(status) FROM others  "; 
            $result = mysqli_query($con, $sql_other) or die(mysqli_error());

               while($row = mysqli_fetch_row($result)){
            ?>
                <td>Others</td>
                <td><?php echo $rowcount_o1; ?> </td>
                <td><?php echo $rowcount_o2; ?> </td>
                <td><?php echo $rowcount_o3; ?> </td>
                <td><?php echo $rowcount_o4; ?> </td>
                <td><?php echo $row [0]; ?> </td>
              
            <?php } ?>


              </tr>
             <tr>
               <th>Total</th>
               <th><?php echo $rowcount+$rowcount_land1; ?></th>
               <th>Total</th>
               <th>Total</th>
               <th>Total</th>
               <th><?php echo $electronics_total+$land_total; ?></th>
             </tr>
              
            
            </tbody>
          </table>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>

</html>
