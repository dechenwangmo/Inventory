<?php
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

        $seizure_sql = "SELECT DISTINCT seized_ref_no FROM seizure";

        $seizure_res = $conn->query($seizure_sql);

        if ($seizure_res->num_rows > 0) {
            $seized_ref_no = array();

            while($seized_row = $seizure_res->fetch_assoc()) {
                $seized_ref_no[] = $seized_row["seized_ref_no"];
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

<body style="background-color: #337AB7">
<div id="wrapper">
        <!-- Navigation -->
       <!-- Menu -->
        <?php include('menu.php'); ?>
        <!-- .menu -->

        <div id="page-wrapper">
         <form role="form" action="seized_report.php" method="POST">
            <div class="row" style="padding: 0 25% 0 10%">      
                <div class="col-lg-8" style="float: right;">
                    <h2 align="center" class="page-header">Reporting Information</h2> <br>
                   <div class="form-group">
                         <label>Seized Reference No:</label>
                         <select name="seized_ref_no" class="select form-control">
                            <option value="all"> All </option>
                        <?php foreach($seized_ref_no as $seized_ref_no) { ?>
                            <option value="<?php echo $seized_ref_no; ?>"><?php echo $seized_ref_no; ?></option>
                        <?php } ?>
                        </select>
                     </div>

                    
                     <div class="form-group">
                                <label>Items</label>
                                <select id="items" class="form-control" name="items">
                                     <option value="all" >All Items</option>
                                     <option value="electronics">Electronics</option>
                                     <option value="land">Land</option>
                                     <option value="buildings" >Buildings</option>
                                     <option value="jewleries">Jewelries</option>
                                     <option value="firearms" >Firearms</option>
                                     <option value="cash" >Cash in hand</option>
                                     <option value="bank" >Cash in bank</option>
                                     <option value="bankacc">Bank Accounts</option>
                                     <option value="shares" >Shares and Stocks</option>
                                     <option value="emails">Emails</option>
                                     <option value="document">Documents</option>
                                     <option value="vehicles_machineries">Vehichles and Machineries</option>
                                     <option value="others" >Others</option>
                     
                                </select>
                     </div> 
                     
                    <div class="form-group">
                                <label>Status</label>
                                <select id="status-choice" class="form-control" name="status">
                                     <option value="all">All status</option>
                                     <option value="Under Custody">Under Custody</option>
                                     <option value="OAG">OAG</option>
                                     <option value="Returned">Returned</option>
                                     <option value="Auctioned">Auctioned</option>
                                </select>
                    </div> 

                    <div class="form-group">
                        <div >
                            <label>From</label> 
                            <input type="date" class="form-control" name="start_date" />
                            <br>
                            <label>To</label>
                            <input type="date" class="form-control" name="end_date" />
                        </div>

                           
                    </div>
                    <br>

                    <div class="form-group" align="center">                         
                        <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok">&nbsp;</span>Generate Report</button>
                         &nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove">&nbsp;</span>Cancel</button>
                    </div>
               
                </div>
           </div>
                 
         </form>
       
        </div> <!-- page wrapper-->
     
    </div>   <!-- /#-wrapper -->
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
