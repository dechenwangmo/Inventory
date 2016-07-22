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

if(isset($_POST['submit']))
{
    $case_no = $_POST ['case_no'];
    $item = $_POST['items'];
    $status = $_POST['status'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    if($case_no == 'all') {
        $ims_sql = "SELECT * FROM ims";
    } else {
        $ims_sql = "SELECT * FROM ims WHERE case_no='$case_no'";
    }

        $ims_result = $conn->query($ims_sql);

        if ($ims_result->num_rows < 1) {
            ?>
            <script type="text/javascript">
                alert('Case Number is invalid');
                window.location.href = "report.php";
            </script>
            <?php
        }

        function getSeizure($ims_id, $start_date, $end_date, $conn) {

            if($start_date == null && $end_date == null) {
                $sql = "SELECT * FROM seizure WHERE seizure.ims_id = '$ims_id'";
            } elseif ($start_date != null && $end_date == null ) {
                $sql = "SELECT * FROM seizure WHERE seizure.ims_id = '$ims_id' AND date >= '$start_date' ";
            } elseif ($start_date == null && $end_date != null) {
                $sql = "SELECT * FROM seizure WHERE seizure.ims_id = '$ims_id' AND date <= '$end_date' ";
            } else {
                $sql = "SELECT * FROM seizure WHERE seizure.ims_id = '$ims_id' AND date between '$start_date' AND '$end_date' ";
            }
            // echo $sql;
            return $result = $conn->query($sql);
        }
?>

<!DOCTYPE>
<html>
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
       <!-- Menu -->
        <?php include('menu.php'); ?>
        <!-- .menu -->

<div id="page-wrapper" class="container-fluid">
<div class="row">
    
     <div style=" border-radius: 4px;">
     <style type="text/css">
         hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 3px solid #337ab7;
        }
        .case{
            border: 1px solid; 
            border-radius: 6px;
            padding: 10px;
            margin:10px;"
        }
     </style>
     <hr  style=" color: #337AB7; ">
     <div class="row">
         <div style="padding: 20px; float: left;">
            <h2>Seized Items List</h2>
         </div>
         <div style="padding: 20px; float: right">
           <img src="../images/seizure.png">
         </div>
     </div>
     <hr>
<?php
if ($ims_result->num_rows > 0) {
$i = 0;
while($ims_row = $ims_result->fetch_assoc()) {
            $ims_id = $ims_row["id"];
            $case_no = $ims_row["case_no"];
            $investigator = $ims_row["investigator"];
            $suspect = $ims_row["suspect"];

    // calling getSeizure function defined above
    $result = getSeizure($ims_id, $start_date, $end_date, $conn);
?> 
<?php
    if($result->num_rows > 0) {  ?>
    <div class="case" id="content<?php echo $i; ?>">
        <div class="clearfix"></div>
        <?php $item_count = 0; ?>
        <div class="col-md-6">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Case Number </th>
                    <td><?php echo $case_no; ?></td>
                </tr>
                <tr>
                    <th>Investigator </th>
                    <td><?php echo $investigator; ?></td>
                </tr>
                <tr>
                    <th>Suspects </th>
                    <td><?php echo $suspect; ?></td>
                </tr>
            </table>
        </div>
        <?php while($row = $result->fetch_assoc()) {
            $seizure_id = $row["seizure_id"];
         ?>
        <div class="col-md-6">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Place of Search </th>
                    <td><?php echo  $row["place_of_search"]; ?></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td><?php echo $row["date"]; ?></td>
                </tr>
                <tr>
                    <th>Search Order</th>
                    <td><?php echo $row["search_order"]; ?></td>
                </tr>
                <tr>
                    <th>Witness</th>
                    <td><?php echo $row["witness"]; ?></td>
                </tr>
                <tr>
                    <th>Seized since</th>
                    <td><?php
                        $datetime1 = new DateTime($row["date"]);
                        $datetime2 = date_create('today');
                        $interval = $datetime1->diff($datetime2);
                        echo $interval->format('%a days');
                   
                     ?>
                     </td>
                </tr>
            </table>
        </div>      
        <div style=" padding: 20px; border-radius: 4px;">
           
            <!-- Electronic items and all -->
            <?php
            if($item == 'electronics' || $item == 'all') {

                if($status == 'all') {
                    $electronics_sql = "SELECT * FROM electronics WHERE seizure_id = '$seizure_id'";
                } else {
                    $electronics_sql = "SELECT * FROM electronics WHERE seizure_id = '$seizure_id' AND status = '$status'";
                }

                $electronics_result = $conn->query($electronics_sql);
                if($electronics_result->num_rows > 0) { 
                    $item_count = 1; $counter = 0;
                    ?>
                    <h3 class="text text-primary page-header">Electronics Items </h3>
                    <table class="table table-striped table-bordered">
                        <thead style="background-color: #337AB7; color: #fff;">
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Storage Location</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row_item = $electronics_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo ++$counter; ?></td>
                                <td><?php echo $row_item["type"]; ?></td>
                                <td><?php echo $row_item["location"]; ?></td>
                                <td><?php echo $row_item["status"]; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } 
            }
            // Land and all items
            if($item == 'land' || $item == 'all') {

                if($status == 'all') {
                    $land_sql = "SELECT * FROM land WHERE seizure_id = '$seizure_id'";
                } else {
                    $land_sql = "SELECT * FROM land WHERE seizure_id = '$seizure_id' AND status = '$status'";
                }

                $land_result = $conn->query($land_sql);
                if($land_result->num_rows > 0) { 
                    $item_count = 1; $counter = 0;
                    ?>
                    <h3 class="text text-primary page-header">Land Items </h3>
                    <table class="table table-striped table-bordered">
                        <thead style="background-color: #337AB7; color: #fff;">
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row_item = $land_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo ++$counter; ?></td>  
                                <td><?php echo $row_item["land_type"]; ?></td>
                                <td><?php echo $row_item["location"]; ?></td>
                                <td><?php echo $row_item["status"]; ?></td>
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php 
                } 
                }


                //buildings and all items
                if($item == 'buildings' || $item == 'all') {

                if($status == 'all') {
                    $build_sql = "SELECT * FROM buildings WHERE seizure_id = '$seizure_id'";
                } else {
                    $build_sql = "SELECT * FROM buildings WHERE seizure_id = '$seizure_id' AND status = '$status'";
                }

                $build_result = $conn->query($build_sql);
                if($build_result->num_rows > 0) { 
                    $item_count = 1;  $counter = 0;
                    ?>
                    <h3 class="text text-primary page-header">Building Items</h3>
                    <table class="table table-striped table-bordered">
                        <thead style="background-color: #337AB7; color: #fff;">
                            <tr>
                                <th>#</th>
                                <th>Building Address</th>
                                <th>Description</th>
                                <th>Status</th>
                             </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row_item = $build_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo ++$counter; ?> </td>
                                <td><?php echo $row_item["address"]; ?> </td>
                                <td><?php echo $row_item["description"]; ?> </td>
                                <td><?php echo $row_item["status"]; ?> </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } 
                }

                // Jewelries and all items
                 if($item == 'jewleries' || $item == 'all') {

                if($status == 'all') {
                    $jew_sql = "SELECT * FROM jewleries WHERE seizure_id = '$seizure_id'";
                } else {
                    $jew_sql = "SELECT * FROM jewleries WHERE seizure_id = '$seizure_id' AND status = '$status'";
                }

                $jew_result = $conn->query($jew_sql);
                if($jew_result->num_rows > 0) { 
                    $item_count = 1;  $counter = 0;
                    ?>
                    <h3 class="text text-primary page-header">Jewelry Items</h3>
                    <table class="table table-striped table-bordered">
                        <thead style="background-color: #337AB7; color: #fff;">
                            <tr>
                              <th>#</th>
                              <th>Jewellry Type</th>
                              <th>Storage Location</th>
                              <th>Status</th>
                             </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row_item = $jew_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo ++$counter; ?> </td>
                                <td><?php echo $row_item["jew_type"]; ?> </td>
                                <td><?php echo $row_item["location"]; ?> </td>
                                <td><?php echo $row_item["status"]; ?> </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } 

                }

            // Firearm and all items
            if($item == 'firearms' || $item == 'all') {

                if($status == 'all') {
                    $fire_sql = "SELECT * FROM firearms WHERE seizure_id = '$seizure_id'";
                } else {
                    $fire_sql = "SELECT * FROM firearms WHERE seizure_id = '$seizure_id' AND status = '$status'";
                }

                $fire_result = $conn->query($fire_sql);
                if($fire_result->num_rows > 0) { 
                    $item_count = 1;  $counter = 0;
                    ?>
                    <h3 class="text text-primary page-header">Firearm Items </h3>
                    <table class="table table-striped table-bordered">
                        <thead style="background-color: #337AB7; color: #fff;">
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Storage Location</th>
                                <th>Status</th>
                             </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row_item = $fire_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo ++$counter; ?> </td>
                                <td><?php echo $row_item["fa_type"]; ?> </td>
                                <td><?php echo $row_item["location"]; ?> </td>                       
                                <td><?php echo $row_item["status"]; ?> </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } 
                }
                
            // Cash in hand and all items
            if($item == 'cash' || $item == 'all') {

                if($status == 'all') {
                    $cash_sql = "SELECT * FROM cash WHERE seizure_id = '$seizure_id'";
                } else {
                    $cash_sql = "SELECT * FROM cash WHERE seizure_id = '$seizure_id' AND status = '$status'";
                }

                $cash_result = $conn->query($cash_sql);
                if($cash_result->num_rows > 0) { 
                    $item_count = 1;  $counter = 0;
                    ?>
                    <h3 class="text text-primary page-header">Cash in hand Items </h3>
                    <table class="table table-striped table-bordered">
                        <thead style="background-color: #337AB7; color: #fff;">
                            <tr>
                                <th>#</th>
                                <th>Cash Amount</th>
                                <th>Storage Location</th>
                                <th>Status</th>
                             </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row_item = $cash_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo ++$counter; ?> </td>
                                <td><?php echo $row_item["cash_amount"]; ?> </td>
                                <td><?php echo $row_item["cash_location"]; ?> </td>
                                <td><?php echo $row_item["status"]; ?> </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } 
             
                }
                
            // Cash in bank and all items
             if($item == 'bank' || $item == 'all') {

                if($status == 'all') {
                    $bank_sql = "SELECT * FROM bank WHERE seizure_id = '$seizure_id'";
                } else {
                    $bank_sql = "SELECT * FROM bank WHERE seizure_id = '$seizure_id' AND status = '$status'";
                }

                $bank_result = $conn->query($bank_sql);
                if($bank_result->num_rows > 0) { 
                    $item_count = 1;  $counter = 0;
                    ?>
                    <h3 class="text text-primary page-header">Cash in bank Items </h3>
                    <table class="table table-striped table-bordered">
                        <thead style="background-color: #337AB7; color: #fff;">
                            <tr>
                                <th>#</th>
                                <th>Bank Name</th>
                                <th>Account No.</th>
                                <th>Status</th>
                             </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row_item = $bank_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo ++$counter; ?> </td>
                                <td><?php echo $row_item["bank_name"]; ?> </td>
                                <td><?php echo $row_item["acc_no"]; ?> </td>
                                <td><?php echo $row_item["status"]; ?> </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } 
             
                }
                
                // Bank Account and all items
            if($item == 'bankacc' || $item == 'all') {

                if($status == 'all') {
                    $bankacc_sql = "SELECT * FROM bankacc WHERE seizure_id = '$seizure_id'";
                } else {
                    $bankacc_sql = "SELECT * FROM bankacc WHERE seizure_id = '$seizure_id' AND status = '$status'";
                }

                $bankacc_result = $conn->query($bankacc_sql);
                if($bankacc_result->num_rows > 0) { 
                    $item_count = 1;  $counter = 0;
                    ?>
                    <h3 class="text text-primary page-header">Bank Account Items </h3>
                    <table class="table table-striped table-bordered">
                        <thead style="background-color: #337AB7; color: #fff;">
                            <tr>
                                <th>#</th>
                                <th>Bank Name</th>
                                <th>Account No.</th>
                                <th>Status</th>
                             </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row_item = $bankacc_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo ++$counter; ?> </td>
                                <td><?php echo $row_item["bank_name"]; ?> </td>
                                <td><?php echo $row_item["acc_no"]; ?> </td>
                                <td><?php echo $row_item["status"]; ?> </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } 
             
              }
                
                // Shares and all items
            if($item == 'shares' || $item == 'all') {

                if($status == 'all') {
                    $shares_sql = "SELECT * FROM shares WHERE seizure_id = '$seizure_id'";
                } else {
                    $shares_sql = "SELECT * FROM shares WHERE seizure_id = '$seizure_id' AND status = '$status'";
                }

                $shares_result = $conn->query($shares_sql);
                if($shares_result->num_rows > 0) { 
                    $item_count = 1;  $counter = 0;
                    ?>
                    <h3 class="text text-primary page-header">Shares and Stocks Items </h3>
                    <table class="table table-striped table-bordered">
                        <thead style="background-color: #337AB7; color: #fff;">
                            <tr>
                                <th>#</th>
                                <th>Shareholder Name</th>
                                <th>No of Shares</th>
                                <th>Status</th>
                             </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row_item = $shares_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo ++$counter; ?> </td>
                                <td><?php echo $row_item["name"]; ?> </td>
                                <td><?php echo $row_item["no_of_shares"]; ?> </td>
                                <td><?php echo $row_item["status"]; ?> </td>
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } 
                }


              // Emails and all items
            if($item == 'emails' || $item == 'all') {

                if($status == 'all') {
                    $email_sql = "SELECT * FROM emails WHERE seizure_id = '$seizure_id'";
                } else {
                    $email_sql = "SELECT * FROM emails WHERE seizure_id = '$seizure_id' AND status = '$status'";
                }

                $email_result = $conn->query($email_sql);
                if($email_result->num_rows > 0) { 
                        $item_count = 1;  $counter = 0;
                    ?>
                    <h3 class="text text-primary page-header">Email Items </h3>
                    <table class="table table-striped table-bordered">
                        <thead style="background-color: #337AB7; color: #fff;">
                            <tr>
                                <th>#</th>
                                <th>Email Address</th>
                                <th>Password</th>
                                <th>Reset Password</th>
                                <th>Status</th>
                             </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row_item = $email_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo ++$counter; ?> </td>
                                <td><?php echo $row_item["email_add"]; ?> </td>
                                <td><?php echo $row_item["pwd"]; ?> </td>
                                <td><?php echo $row_item["re_pwd"]; ?> </td>
                                <td><?php echo $row_item["status"]; ?> </td>
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } 
             
                }

                 // Documents and all items
            if($item == 'document' || $item == 'all') {

                if($status == 'all') {
                    $doc_sql = "SELECT * FROM document WHERE seizure_id = '$seizure_id'";
                } else {
                    $doc_sql = "SELECT * FROM document WHERE seizure_id = '$seizure_id' AND status = '$status'";
                }

                $doc_result = $conn->query($doc_sql);
                if($doc_result->num_rows > 0) { 
                    $item_count = 1;  $counter = 0;
                    ?>
                    <h3 class="text text-primary page-header">Document Items</h3>
                    <table class="table table-striped table-bordered">
                        <thead style="background-color: #337AB7; color: #fff;">
                            <tr>
                                <th>#</th>
                                <th>Document Type</th>
                                <th>Storage Location</th>
                                <th>Status</th>
                             </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row_item = $doc_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo ++$counter; ?> </td>
                                <td><?php echo $row_item["doc_type"]; ?> </td>
                                <td><?php echo $row_item["location"]; ?> </td>
                                <td><?php echo $row_item["status"]; ?> </td>
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } 
                }


              // Vehicle_machinery and all items
            if($item == 'vehicles_machineries' || $item == 'all') {

                if($status == 'all') {
                    $vm_sql = "SELECT * FROM vehicles_machineries WHERE seizure_id = '$seizure_id'";
                } else {
                    $vm_sql = "SELECT * FROM vehicles_machineries WHERE seizure_id = '$seizure_id' AND status = '$status'";
                }

                $vm_result = $conn->query($vm_sql);
                if($vm_result->num_rows > 0) { 
                    $item_count = 1;  $counter = 0;
                    ?>
                    <h3 class="text text-primary page-header">Vehicle and Machinery Items </h3>
                    <table class="table table-striped table-bordered">
                        <thead style="background-color: #337AB7; color: #fff;">
                            <tr>
                                <th>#</th>
                                <th>Model</th>
                                <th>Storage Location</th>
                                <th>Status</th>
                             </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row_item = $vm_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo ++$counter; ?> </td>
                                <td><?php echo $row_item["model"]; ?> </td>
                                <td><?php echo $row_item["location"]; ?> </td>
                                <td><?php echo $row_item["status"]; ?> </td>
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } 
             
               }

              // others and all items
            if($item == 'others' || $item == 'all') {

                if($status == 'all') {
                    $others_sql = "SELECT * FROM others WHERE seizure_id = '$seizure_id'";
                } else {
                    $others_sql = "SELECT * FROM others WHERE seizure_id = '$seizure_id' AND status = '$status'";
                }

                $others_result = $conn->query($others_sql);
                if($others_result->num_rows > 0) { 
                     $item_count = 1;  $counter = 0;
                    ?>
                    <h3 class="text text-primary page-header">Other Items </h3>
                    <table class="table table-striped table-bordered">
                        <thead style="background-color: #337AB7; color: #fff;">
                            <tr>
                                  <th>#</th>
                                  <th>Type</th>
                                  <th>Name</th>
                                  <th>Quantity</th>
                                  <th>Status</th>
                             </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row_item = $others_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo ++$counter; ?> </td>
                                <td><?php echo $row_item["type"]; ?> </td>
                                <td><?php echo $row_item["name"]; ?> </td>
                                <td><?php echo $row_item["quantity"]; ?> </td>
                                <td><?php echo $row_item["status"]; ?> </td>
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } 
            }
        ?> </div> <?php 
        } 
    } 
    ?>
    </div>
    <script type="text/javascript">
        var status = <?php echo $item_count ?>;
        if(status == 0){
            // $("#content<?php echo $i ?>").css("display", "none");
            document.getElementById("content<?php echo $i ?>").style.display = "none";
        }
    </script>
<?php
$i++;

} // end of while loop
} // end of if count > 0
} // END OF SUBMIT 
?>
</div>
    </div> <!-- /page wrapper -->
    </div>  <!-- /wrapper -->

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