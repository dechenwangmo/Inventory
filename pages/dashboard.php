<?php
// check if logged in and admin
require 'login_check.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM ims";
$result = $conn->query($sql);



$sql_ele1="SELECT * FROM electronics WHERE status = 'under Custody' " ;
if ($result=mysqli_query($conn,$sql_ele1))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  mysqli_free_result($result);
  }
$sql2="SELECT * FROM electronics WHERE status = 'Returned' " ;
if ($result=mysqli_query($conn,$sql2))
  {
  // Return the number of rows in result set
  $rowcount1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
$sql3="SELECT * FROM electronics WHERE status = 'OAG' " ;

if ($result=mysqli_query($conn,$sql3))
  {
  // Return the number of rows in result set
  $rowcount2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
 
$sql4="SELECT * FROM electronics WHERE status = 'Auctioned' " ;


if ($result=mysqli_query($conn,$sql4))
  {
  // Return the number of rows in result set
  $rowcount3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  

// land

 $sql5="SELECT * FROM land WHERE status = 'under Custody' " ;
   if ($result=mysqli_query($conn,$sql5))
  {
  // Return the number of rows in result set
  $rowcount_land1=mysqli_num_rows($result);

  
  mysqli_free_result($result);
  }
$sql6="SELECT * FROM land WHERE status = 'Returned' " ;
if ($result=mysqli_query($conn,$sql6))
  {
  // Return the number of rows in result set
  $rowcount_land2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
$sql7="SELECT * FROM land WHERE status = 'OAG' " ;

if ($result=mysqli_query($conn,$sql7))
  {
  // Return the number of rows in result set
  $rowcount_land3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

$sql8="SELECT * FROM land WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($conn,$sql8))
  {
  // Return the number of rows in result set
  $rowcount_land4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
// buildings

  $sql9="SELECT * FROM buildings WHERE status = 'under Custody' " ;
   if ($result=mysqli_query($conn,$sql9))
  {
  // Return the number of rows in result set
  $rowcount_bu1=mysqli_num_rows($result);

  
  mysqli_free_result($result);
  }
$sql10= "SELECT * FROM buildings WHERE status = 'Returned' " ;
if ($result=mysqli_query($conn,$sql10))
  {
  // Return the number of rows in result set
  $rowcount_bu2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
$sql11="SELECT * FROM buildings WHERE status = 'OAG' " ;

if ($result=mysqli_query($conn,$sql11))
  {
  // Return the number of rows in result set
  $rowcount_bu3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

$sql12="SELECT * FROM buildings WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($conn,$sql12))
  {
  // Return the number of rows in result set
  $rowcount_bu4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

//jew

  $sql_j1="SELECT * FROM jewleries WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($conn,$sql_j1))
  {
  // Return the number of rows in result set
  $rowcount_j1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  $sql_j2="SELECT * FROM jewleries WHERE status = 'Returned' " ;

if ($result=mysqli_query($conn,$sql_j2))
  {
  // Return the number of rows in result set
  $rowcount_j2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_j3="SELECT * FROM jewleries WHERE status = 'OAG' " ;

if ($result=mysqli_query($conn,$sql_j3))
  {
  // Return the number of rows in result set
  $rowcount_j3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_j4="SELECT * FROM jewleries WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($conn,$sql_j4))
  {
  // Return the number of rows in result set
  $rowcount_j4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  //firearms
   $sql_f1="SELECT * FROM firearms WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($conn,$sql_f1))
  {
  // Return the number of rows in result set
  $rowcount_f1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_f2="SELECT * FROM firearms WHERE status = 'Returned' " ;

if ($result=mysqli_query($conn,$sql_f2))
  {
  // Return the number of rows in result set
  $rowcount_f2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_f3="SELECT * FROM firearms WHERE status = 'OAG' " ;

if ($result=mysqli_query($conn,$sql_f3))
  {
  // Return the number of rows in result set
  $rowcount_f3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_f4="SELECT * FROM firearms WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($conn,$sql_f4))
  {
  // Return the number of rows in result set
  $rowcount_f4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
//cash in hand 
     $sql_cash1="SELECT * FROM cash WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($conn,$sql_cash1))
  {
  // Return the number of rows in result set
  $rowcount_cash1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_cash2="SELECT * FROM cash WHERE status = 'Returned' " ;

if ($result=mysqli_query($conn,$sql_cash2))
  {
  // Return the number of rows in result set
  $rowcount_cash2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_cash3="SELECT * FROM cash WHERE status = 'OAG' " ;

if ($result=mysqli_query($conn,$sql_cash3))
  {
  // Return the number of rows in result set
  $rowcount_cash3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_cash4="SELECT * FROM cash WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($conn,$sql_cash4))
  {
  // Return the number of rows in result set
  $rowcount_cash4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  // cash in bank
     $sql_bank1="SELECT * FROM bank WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($conn,$sql_bank1))
  {
  // Return the number of rows in result set
  $rowcount_bank1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_bank2="SELECT * FROM bank WHERE status = 'Returned' " ;

if ($result=mysqli_query($conn,$sql_bank2))
  {
  // Return the number of rows in result set
  $rowcount_bank2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_bank3="SELECT * FROM bank WHERE status = 'OAG' " ;

if ($result=mysqli_query($conn,$sql_bank3))
  {
  // Return the number of rows in result set
  $rowcount_bank3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

   $sql_bank4="SELECT * FROM bank WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($conn,$sql_bank4))
  {
  // Return the number of rows in result set
  $rowcount_bank4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

 //bankacc

  $sql_acc1="SELECT * FROM bankacc WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($conn,$sql_acc1))
  {
  // Return the number of rows in result set
  $rowcount_acc1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_acc2="SELECT * FROM bankacc WHERE status = 'Returned' " ;

if ($result=mysqli_query($conn,$sql_acc2))
  {
  // Return the number of rows in result set
  $rowcount_acc2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_acc3="SELECT * FROM bankacc WHERE status = 'OAG' " ;

if ($result=mysqli_query($conn,$sql_acc3))
  {
  // Return the number of rows in result set
  $rowcount_acc3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_acc4="SELECT * FROM bankacc WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($conn,$sql_acc4))
  {
  // Return the number of rows in result set
  $rowcount_acc4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  ///shares

  $sql_sha1="SELECT * FROM shares WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($conn,$sql_sha1))
  {
  // Return the number of rows in result set
  $rowcount_sha1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  $sql_sha2="SELECT * FROM shares WHERE status = 'Returned' " ;

if ($result=mysqli_query($conn,$sql_sha2))
  {
  // Return the number of rows in result set
  $rowcount_sha2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_sha3="SELECT * FROM shares WHERE status = 'OAG' " ;

if ($result=mysqli_query($conn,$sql_sha3))
  {
  // Return the number of rows in result set
  $rowcount_sha3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_sha4="SELECT * FROM shares WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($conn,$sql_sha4))
  {
  // Return the number of rows in result set
  $rowcount_sha4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  //emails

  $sql_em1="SELECT * FROM emails WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($conn,$sql_em1))
  {
  // Return the number of rows in result set
  $rowcount_em1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  $sql_em2="SELECT * FROM emails WHERE status = 'Returned' " ;

if ($result=mysqli_query($conn,$sql_em2))
  {
  // Return the number of rows in result set
  $rowcount_em2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_em3="SELECT * FROM emails WHERE status = 'OAG' " ;

if ($result=mysqli_query($conn,$sql_em3))
  {
  // Return the number of rows in result set
  $rowcount_em3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_em4="SELECT * FROM emails WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($conn,$sql_em4))
  {
  // Return the number of rows in result set
  $rowcount_em4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  //doc

  $sql_doc1="SELECT * FROM document WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($conn,$sql_doc1))
  {
  // Return the number of rows in result set
  $rowcount_doc1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  $sql_doc2="SELECT * FROM document WHERE status = 'Returned' " ;

if ($result=mysqli_query($conn,$sql_doc2))
  {
  // Return the number of rows in result set
  $rowcount_doc2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_doc3="SELECT * FROM document WHERE status = 'OAG' " ;

if ($result=mysqli_query($conn,$sql_doc3))
  {
  // Return the number of rows in result set
  $rowcount_doc3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_doc4="SELECT * FROM document WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($conn,$sql_doc4))
  {
  // Return the number of rows in result set
  $rowcount_doc4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  // veh
  $sql_vm1="SELECT * FROM vehicles_machineries WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($conn,$sql_vm1))
  {
  // Return the number of rows in result set
  $rowcount_vm1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  $sql_vm2="SELECT * FROM vehicles_machineries WHERE status = 'Returned' " ;

if ($result=mysqli_query($conn,$sql_vm2))
  {
  // Return the number of rows in result set
  $rowcount_vm2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_vm3="SELECT * FROM vehicles_machineries WHERE status = 'OAG' " ;

if ($result=mysqli_query($conn,$sql_vm3))
  {
  // Return the number of rows in result set
  $rowcount_vm3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_vm4="SELECT * FROM vehicles_machineries WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($conn,$sql_vm4))
  {
  // Return the number of rows in result set
  $rowcount_vm4=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  //others
  $sql_o1="SELECT * FROM others WHERE status = 'Under Custody' " ;

if ($result=mysqli_query($conn,$sql_o1))
  {
  // Return the number of rows in result set
  $rowcount_o1=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }

  $sql_o2="SELECT * FROM others WHERE status = 'Returned' " ;

if ($result=mysqli_query($conn,$sql_o2))
  {
  // Return the number of rows in result set
  $rowcount_o2=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_o3="SELECT * FROM others WHERE status = 'OAG' " ;

if ($result=mysqli_query($conn,$sql_o3))
  {
  // Return the number of rows in result set
  $rowcount_o3=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
  $sql_o4="SELECT * FROM others WHERE status = 'Auctioned' " ;

if ($result=mysqli_query($conn,$sql_o4))
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

<body style="background-color: #337AB7">

    <div id="wrapper" >

        <!-- Menu -->
        <?php include('menu.php'); ?>
        <!-- .menu -->

        <div id="page-wrapper" style="height: 1500px">
          
        <div class="row">
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading" style="background-color: #337ab7; color: #fff; font-size: 18px">
                <span class="fa fa-pie-chart"></span> &nbsp; <b>Seized Items by Status</b>
              </div>
              <div class="panel-body">
                <div id="chart_div2" ></div>
              
              </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="panel panel-default">
              <div class="panel-heading" style="background-color: #337ab7; color: #fff; font-size: 18px">
                <span class="fa fa-bar-chart"></span> &nbsp; <b>Seized Items by Count</b>
              </div>
              <div class="panel-body">
                <div id="columnchart_values" style="overflow: hidden;"></div>
              </div>
            </div>
          </div>
          </div>
           <br> <br>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #337ab7; color: #fff; font-size: 18px">
                        <span class="glyphicon glyphicon-th-list"></span> &nbsp; <b>Status Wise Count </b>
                    </div>
                          <div class="panel-body">
                            <div class="table-responsive">      
                                <table class="table table-striped table-bordered"  align="center" >
                                        <thead>
                                          <tr class="odd gradeX">
                                            <th>Items</th>

                                            <th>Under Custody</th>
                                            <th>Returned</th>
                                            <th>OAG</th>
                                            <th>Auctioned</th>
                                           

                                          </tr>
                                        </thead>
                                        
                                        <tbody>
                                        
                                          <tr>
                                            <td>Electronics</td>
                                            <td><?php echo $rowcount; ?> </td>
                                            <td><?php echo $rowcount1; ?> </td>
                                            <td><?php echo $rowcount2; ?> </td>
                                            <td><?php echo $rowcount3; ?> </td>
                                           
                                          </tr>
                                        
                                          <tr>

                                            <td>Land</td>
                                            <td><?php echo $rowcount_land1; ?> </td>
                                            <td><?php echo $rowcount_land2; ?> </td>
                                            <td><?php echo $rowcount_land3; ?> </td>
                                            <td><?php echo $rowcount_land4; ?> </td>
                                            
                                         </tr>


                                           
                                          <tr>
                                            <td>Buildings</td>
                                            <td><?php echo $rowcount_bu1; ?> </td>
                                            <td><?php echo $rowcount_bu2; ?> </td>
                                            <td><?php echo $rowcount_bu3; ?> </td>
                                            <td><?php echo $rowcount_bu4; ?> </td>
                                           
                                          </tr>
                                          

                                          <tr>
                                            <td>Jewelries</td>
                                            <td><?php echo $rowcount_j1; ?> </td>
                                            <td><?php echo $rowcount_j2; ?> </td>
                                            <td><?php echo $rowcount_j3; ?> </td>
                                            <td><?php echo $rowcount_j4; ?> </td>
                                           
                                          </tr>
                                          
                                          <tr>
                                            <td>Firearms</td>
                                            <td><?php echo $rowcount_f1; ?> </td>
                                            <td><?php echo $rowcount_f2; ?> </td>
                                            <td><?php echo $rowcount_f3; ?> </td>
                                            <td><?php echo $rowcount_f4; ?> </td>
                                           
                                          </tr>
                                          
                                          <tr>
                                         
                                            <td>Cash In Hand</td>
                                            <td><?php echo $rowcount_cash1; ?> </td>
                                            <td><?php echo $rowcount_cash2; ?> </td>
                                            <td><?php echo $rowcount_cash3; ?> </td>
                                            <td><?php echo $rowcount_cash4; ?> </td>
                                           
                                          </tr>
                                          
                                          <tr>
                                            <td> Cash In Bank </td>
                                            <td><?php echo $rowcount_bank1; ?> </td>
                                            <td><?php echo $rowcount_bank2; ?> </td>
                                            <td><?php echo $rowcount_bank3; ?> </td>
                                            <td><?php echo $rowcount_bank4; ?> </td>
                                          
                                        </tr>

                                          
                                           <tr>
                                            <td>Bank Accounts</td>
                                            <td><?php echo $rowcount_acc1; ?> </td>
                                            <td><?php echo $rowcount_acc2; ?> </td>
                                            <td><?php echo $rowcount_acc3; ?> </td>
                                            <td><?php echo $rowcount_acc4; ?> </td>
                                           
                                          
                                          </tr>
                                          <tr>
                                          
                                            <td>Shares</td>
                                            <td><?php echo $rowcount_sha1; ?> </td>
                                            <td><?php echo $rowcount_sha2; ?> </td>
                                            <td><?php echo $rowcount_sha3; ?> </td>
                                            <td><?php echo $rowcount_sha4; ?> </td>
                                          
                                          
                                           </tr>

                                          <tr>
                                         
                                            <td>Emails</td>
                                            <td><?php echo $rowcount_em1; ?> </td>
                                            <td><?php echo $rowcount_em2; ?> </td>
                                            <td><?php echo $rowcount_em3; ?> </td>
                                            <td><?php echo $rowcount_em4; ?> </td>
                                            
                                          </tr>

                                           <tr>
                                            
                                            <td>Documents</td>
                                            <td><?php echo $rowcount_doc1; ?> </td>
                                            <td><?php echo $rowcount_doc2; ?> </td>
                                            <td><?php echo $rowcount_doc3; ?> </td>
                                            <td><?php echo $rowcount_doc4; ?> </td>
                                           
                                        
                                          </tr>
                                          
                                          
                                          <tr>
                                          
                                            <td>Vehicles and Machineries</td>
                                            <td><?php echo $rowcount_vm1; ?> </td>
                                            <td><?php echo $rowcount_vm2; ?> </td>
                                            <td><?php echo $rowcount_vm3; ?> </td>
                                            <td><?php echo $rowcount_vm4; ?> </td>
                                           
                                        
                                          </tr>

                                          <tr>
                                          
                                            <td>Others</td>
                                            <td><?php echo $rowcount_o1; ?> </td>
                                            <td><?php echo $rowcount_o2; ?> </td>
                                            <td><?php echo $rowcount_o3; ?> </td>
                                            <td><?php echo $rowcount_o4; ?> </td>
                                           
                                          </tr>

                                         <tr>
                                          <td>Total</td>
                                            <th><span class="badge"><?php echo $Total_Under_Custoty = $rowcount + $rowcount_land1 + $rowcount_bu1 + $rowcount_j1 + $rowcount_f1 + $rowcount_cash1+ $rowcount_bank1+ $rowcount_acc1+ $rowcount_sha1+ $rowcount_em1+ $rowcount_doc1+ $rowcount_vm1+ $rowcount_o1 ?> </span></th>
                                            <th> <span class="badge"><?php echo $Total_Returned = $rowcount1 + $rowcount_land2 + $rowcount_bu2 + $rowcount_j2 + $rowcount_f2 + $rowcount_cash2+ $rowcount_bank2+ $rowcount_acc2+ $rowcount_sha2+ $rowcount_em2+ $rowcount_doc2+ $rowcount_vm2+ $rowcount_o2 ?></span> </th>
                                            <th><span class="badge"><?php echo $Total_OAG = $rowcount2 + $rowcount_land3 + $rowcount_bu3 + $rowcount_j3 + $rowcount_f3 + $rowcount_cash3+ $rowcount_bank3+ $rowcount_acc3+ $rowcount_sha3+ $rowcount_em3+ $rowcount_doc3+ $rowcount_vm3+ $rowcount_o3 ?></span>
                                             </th>
                                            <th><span class="badge"><?php echo $Total_Auctioned = $rowcount3 + $rowcount_land4 + $rowcount_bu4 + $rowcount_j4 + $rowcount_f4 + $rowcount_cash4+ $rowcount_bank4+ $rowcount_acc4+ $rowcount_sha4+ $rowcount_em4+ $rowcount_doc4+ $rowcount_vm4+ $rowcount_o4 ?> </span>
                                            </th>
                                         

                                        </tr>
                                        </tbody>
                                 </table>
                            </div> 
                    </div> 
                </div> 
            </div>
         
      
            <div class="col-md-6" style="padding-left: 10%">
                <div class="list-group">

                <a href="#" class="list-group-item active" style="font-size: 18px">
                    <span class="glyphicon glyphicon-th-list"></span> <b>Summary</b>
                </a>
                     <a href="#" class="list-group-item">
                    <span class="glyphicon glyphicon glyphicon-flash"></span>Total Electronics Item Seized<span class="badge"> <td><?php echo $Total_ele = $rowcount + $rowcount1 + $rowcount2 + $rowcount3 ?> </td>
                              </span>
                </a>
                <a href="#" class="list-group-item">
                    <span class="glyphicon glyphicon glyphicon-flash"></span>Total Land Seized
                    <span class="badge"><td><?php echo $Total_land = $rowcount_land1 + $rowcount_land2 + $rowcount_land3 + $rowcount_land4 ?> </td>
                                 </span>
                </a>
                 <a href="#" class="list-group-item">
                    <span class="glyphicon glyphicon glyphicon-flash"></span>Total Building Seized
                    <span class="badge"> <td><?php echo $Total_build = $rowcount_bu1 + $rowcount_bu2 + $rowcount_bu3 + $rowcount_bu4 ?> </td>
                                     </span>
                </a>  
                <a href="#" class="list-group-item">
                    <span class="glyphicon glyphicon glyphicon-flash"></span>Total Jewellery Items Seized
                     <span class="badge"> <td><?php echo $Total_jew = $rowcount_j1 + $rowcount_j2 + $rowcount_j3 + $rowcount_j4 ?> </td>
                                      </span>
                </a>   
                
                <a href="#" class="list-group-item">
                    <span class="glyphicon glyphicon glyphicon-flash"></span>Total Firearms Item Seized
                    <span class="badge"> <td><?php echo $Total_firearms = $rowcount_f1 + $rowcount_f2 + $rowcount_f3 + $rowcount_f4?> </td>
                             </span>
                </a>  
                           
                <a href="#" class="list-group-item">
                    <span class="glyphicon glyphicon glyphicon-flash"></span>Total Cash  Seized
                    <span class="badge"> <td><?php echo $Total_cash = $rowcount_cash1 + $rowcount_cash2 + $rowcount_cash3 + $rowcount_cash4 ?> </td>
                   
                    </span>
               </a>
               
                
                                      <a href="#" class="list-group-item">
                      <span class="glyphicon glyphicon glyphicon-flash"></span>
                    Total Cash in Bank  Seized <span class="badge">  <td><?php echo $Total_bank = $rowcount_bank1 + $rowcount_bank2 + $rowcount_bank3 + $rowcount_bank4 ?> </td>
                                     </span>
                       </a>
                        <a href="#" class="list-group-item">
                      <span class="glyphicon glyphicon glyphicon-flash"></span>
                    Total Bank Accounts Seized <span class="badge"> <td><?php echo $Total_acc = $rowcount_acc1 + $rowcount_acc2 + $rowcount_acc3 + $rowcount_acc4 ?> </td>
                                     </span>
                       </a> 
                       <a href="#" class="list-group-item">
                      <span class="glyphicon glyphicon glyphicon-flash"></span>
                    Total Shares and Stocks Seized <span class="badge">  <td><?php echo $Total_share = $rowcount_sha1 + $rowcount_sha2 + $rowcount_sha3 + $rowcount_sha4 ?> </td>
                                     </span>
                       </a>
                                       <a href="#" class="list-group-item">
                      <span class="glyphicon glyphicon glyphicon-flash"></span>
                    Total Email Seized <span class="badge"><td><?php echo $Total_email = $rowcount_em1 + $rowcount_em2 + $rowcount_em3 + $rowcount_em4 ?> </td>
                                       </span>
                       </a>
                                       <a href="#" class="list-group-item">
                      <span class="glyphicon glyphicon glyphicon-flash"></span>
                    Total Documents Item Seized <span class="badge"> <td><?php echo $Total_doc = $rowcount_doc1 + $rowcount_doc2 + $rowcount_doc3 + $rowcount_doc4 ?> </td>
                                      </span>
                       </a>
                              <a href="#" class="list-group-item">
                      <span class="glyphicon glyphicon glyphicon-flash"></span>
                    Total Vehicles and Machineries Item Seized <span class="badge"> <td><?php echo $Total_Vehicles_Machineries = $rowcount_vm1 + $rowcount_vm2 + $rowcount_vm3 + $rowcount_vm4 ?> </td>
                                     </span>
                       </a>         
                                       <a href="#" class="list-group-item">
                      <span class="glyphicon glyphicon glyphicon-flash"></span>
                    Total Others Item Seized <span class="badge"> <td><?php echo $Total_other = $rowcount_o1 + $rowcount_o2 + $rowcount_o3 + $rowcount_o4 ?> </td>
                                       </span>
                       </a>
                        <a href="#" class="list-group-item">
                      <span class="glyphicon glyphicon glyphicon-flash"></span>
                    Total Items Seized
                          <th ><span class="badge"><?php echo $Total_seized_items = $Total_Under_Custoty + $Total_Returned + $Total_OAG + $Total_Auctioned ?></span> </th> </a>
                           

                </div>


            </div>

           
            
        </div> <!-- end-page-wrapper -->
    </div> <!-- end-wrapper -->

    <footer>
        <p style="color: #fff; text-align: center; padding-top: 10px">
        Copyright © 2016 Office of the Anti-Corruption Commission, Thimphu, Post Box 1113, Phone: +975-2-334863/64/66/69 -Asset -337423, Fax: +975-2-334865
        </p>
    </footer>
    <!--Charts -->
    <script type="text/javascript" src="../js/loader.js"></script>

    <script type="text/javascript">
      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table. --> first chart
      
        // Create the data table. --> second chart
        var data1 = new google.visualization.DataTable();
        data1.addColumn('string', 'Topping');
        data1.addColumn('number', 'Slices');
        data1.addRows([
          ['Under Custody', <?php echo $Total_Under_Custoty ; ?> ],
          ['OAG', <?php echo $Total_OAG;?>],
          ['Return', <?php echo $Total_Returned; ?>],
          ['Auctioned', <?php echo $Total_Auctioned; ?>]
         

        ]);

        // Set chart options
        var options1 = {'title':'',
                        'legend':'right',
                         pieHole: 0.4,
                         height:350
                       };
       
        var chart1 = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart1.draw(data1, options1);

        

        var data = google.visualization.arrayToDataTable([
        ['Items', 'No. of Seized Items', { role: "style" } ],
        ['Electronics', <?php echo $Total_ele ; ?>, "#247DA9"],
        ['Land', <?php echo $Total_land;?>, "#CC6764"],
        ['Buildings', <?php echo $Total_build ; ?>, "#F4B400"],
        ['Jewelries', <?php echo $Total_jew;?>, "#3E8A42"],
        ['Firearms', <?php echo $Total_firearms ; ?>,"#7A5D9C"],
        ['Cash in hand', <?php echo $Total_cash;?>, "#CCC"],
        ['Cash in Bank', <?php echo $Total_bank ; ?>,"#2E86E4"],
        ['Bank Accounts', <?php echo $Total_acc;?>, "#D89CBD"],
        ['Shares and Stocks', <?php echo $Total_share ; ?>, "#52A09A"],
        ['Emails', <?php echo $Total_email;?>,"#EC3939"],
        ['Documents', <?php echo $Total_doc ; ?>, "#EAEF3D"],
        ['Vehicles and Machineries', <?php echo $Total_Vehicles_Machineries;?>, "#524D4D"],
        ['Others', <?php echo $Total_other ;?>, "#20B5C5"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "",
        height: 350,
        bar: {groupWidth:"80%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
      }
    </script> <!--end of chart scripts -->



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

    <!-- dropdown hover-->
    <script src="../dist/js/jquery.bootstrap-dropdown-hover.js"></script>

    <script>
      //$('[data-toggle="dropdown"]').bootstrapDropdownHover();
      $.fn.bootstrapDropdownHover();
      //$('#dropdownMenu1').bootstrapDropdownHover();
      //$('.navbar [data-toggle="dropdown"]').bootstrapDropdownHover();
    </script>

    <script>
      // demo for realtime configuration and destroy
      $('[data-toggle="tooltip"]').tooltip({container: 'body'});

      $('#setSticky').on('click', function () {
        $('.setdemo [data-toggle="dropdown"]').bootstrapDropdownHover('setClickBehavior', 'sticky');
      });

      $('#setDefault').on('click', function () {
        $('.setdemo [data-toggle="dropdown"]').bootstrapDropdownHover('setClickBehavior', 'default');
      });

      $('#setDisable').on('click', function () {
        $('.setdemo [data-toggle="dropdown"]').bootstrapDropdownHover('setClickBehavior', 'disable');
      });

      $('#set1000').on('click', function () {
        $('.setdemo [data-toggle="dropdown"]').bootstrapDropdownHover('setHideTimeout', 1000);
      });

      $('#set200').on('click', function () {
        $('.setdemo [data-toggle="dropdown"]').bootstrapDropdownHover('setHideTimeout', 200);
      });

      $('#destroy').on('click', function () {
        $('[data-toggle="tooltip"]').tooltip('hide');
        $('.setdemo [data-toggle="dropdown"]').bootstrapDropdownHover('destroy');
        $('#destroy, #set200, #set1000, #setDisable, #setDefault, #setSticky').prop('disabled', 'disabled');
        $('#reinitialize').prop('disabled', false);
        $('.setdemo').addClass('destroyed');
      });

      $('#reinitialize').on('click', function () {
        $('[data-toggle="tooltip"]').tooltip('hide');
        $('.setdemo [data-toggle="dropdown"]').bootstrapDropdownHover();
        $('#destroy, #set200, #set1000, #setDisable, #setDefault, #setSticky').prop('disabled', false);
        $(this).prop('disabled', 'disabled');
        $('.setdemo').removeClass('destroyed');
      });
    </script>
</body>
</html>
