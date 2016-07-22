<?php
// check if logged in and admin
require 'admin_role.php';

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
$ims_id = $_GET['ims_id'];

$sql2 = "SELECT ims_id FROM seizure WHERE ims_id='$ims_id' LIMIT 1";

$result2 = $conn->query($sql2);

if (mysqli_fetch_assoc($result2)) {
    ?>
    <script type="text/javascript">
        window.location.href = "edit.php?ims_id=<?php echo $ims_id; ?>";
    </script>
<?php
} else {
    $sql = "SELECT case_no, investigator, suspect FROM ims WHERE id=$ims_id";
    $result = $conn->query($sql);
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

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/Responsive.dataTables.css" rel="stylesheet">

   
</head>

<body>
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

                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cases <span class="caret"></span></a>
                            <ul class="dropdown-menu" >
                                <li>
                                    <a href="cases.php"> Registered Cases</a>
                                </li>
                                <li>
                                    <a href="ims.php"> Add New Cases</a>
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
                        </li>
                    </ul>
                   <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi, <?php echo $_SESSION['username']; ?> !</a>
                            <ul class="dropdown-menu">
                              <li></li>
                              <?php if($_SESSION['role'] == 'admin') { ?>
                              <li><a href="profile.php"><span class="glyphicon glyphicon-pencil"></span> Edit My Profile</a></li> 
                              <?php } ?>
                              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                              
                            </ul>
                    </li>
                  </ul>
         
</nav>

    <div class="container" style="margin-top:50px;">
            <form class="form-horizontal" role="form" method="post" action="sinsert.php">
            <div class="row" >
                <div class="col-md-6 form-group">
                    <label class="control-label col-md-4" for="seized_ref_no" >Seized Reference No.</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="seized_ref_no">
                    </div>
                  </div>
                  <?php

                    while($row = $result->fetch_assoc()) {
                                        ?>
                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4" >Case No.</label>
                    <div class="col-md-8"> 
                     <input type="text" class="form-control" name="case_no" value="<?php echo $row["case_no"]; ?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4" >Place </label>
                    <div class="col-md-8"> 
                     <textarea class="form-control" rows="5" name="place_of_search"></textarea>
                    </div>
                  </div>
                <div class="col-md-6 form-group">
                    <label class="control-label col-md-4" >Date </label>
                    <div class="col-md-8"> 
                      <input type="date" class="form-control" name="date">
                    </div>
                </div>

                <div class="col-md-6 form-group">
                    <label class="control-label col-md-4" >Time </label>
                    <div class="col-md-8"> 
                      <input type="time" class="form-control" name="time">
                    </div>
                </div>

                 
                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4" >Items seized from </label>
                    <div class="col-md-8"> 
                      <input type="text" class="form-control" name="seized_from" value="<?php echo $row["suspect"]; ?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4" >Investigator</label>
                    <div class="col-md-8"> 
                       <input type="text" class="form-control" name="investigator" value="<?php echo $row["investigator"]; ?>" readonly>
                    </div>
                  </div>
                  <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
                  <?php
              }
              ?>
                  
                                         
                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4" >Search Order</label>
                    <div class="col-md-8"> 
                      <input type="radio" name="search_order" value="Yes" id="show"> Yes
                      <input type="radio" name="search_order" value="No" id="hide" > No
                      <div id="search_order_ref" style="display:none;">
                        <input type="text" class="form-control" name="search_order_ref" placeholder="Enter Search Order Reference">
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" >Witness</label>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="5" name="witness"></textarea>
                    </div>
                  </div>

                  <div class="form-group col-md-12">  
                    <div class="col-md-offset-2 col-md-10" align="center">
                      <button type="submit" class="btn btn-primary">Save</button>
                      <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                  </div>
            </div>
        </form>
    </div>

    <!-- /#wrapper -->

    <script src="../build/js/jquery_kes.min.js"></script>

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
        $("#hide").click(function(){
            $("#search_order_ref").slideUp();
        });
        $("#show").click(function(){
            $("#search_order_ref").slideDown();
        });
    });
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
        $("#land_hide").click(function(){
            $("#freeze_order_ref").slideUp();
        });
        $("#land_show").click(function(){
            $("#freeze_order_ref").slideDown();
        });
    });

    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
        $("#b_hide").click(function(){
            $("#bfreeze_order_ref").slideUp();
        });
        $("#b_show").click(function(){
            $("#bfreeze_order_ref").slideDown();
        });
    });

    </script>
</body>

</html>
