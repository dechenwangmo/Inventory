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
    $sql = "SELECT seizure_id, case_no, investigator, suspect, place_of_search, date, time, search_order, search_order_ref, seized_ref_no, witness  
            FROM ims,seizure WHERE ims.id=seizure.ims_id AND ims.id=$ims_id LIMIT 1";
    $result = $conn->query($sql);
    $seizure = $conn->query($sql);
    while($row = $seizure->fetch_assoc()) {
      $seizure_id = $row["seizure_id"];
    }
    $sql3 = "SELECT * FROM electronics WHERE seizure_id = $seizure_id";
    $electronics = $conn->query($sql3);

    $sql4 = "SELECT * FROM land WHERE seizure_id = $seizure_id";
    $land = $conn->query($sql4);

    $sql5 = "SELECT * FROM buildings WHERE seizure_id = $seizure_id";
    $buildings = $conn->query($sql5);

    $sql6 = "SELECT * FROM jewleries WHERE seizure_id = $seizure_id";
    $jewlries = $conn->query($sql6);

    $sql7 = "SELECT * FROM firearms WHERE seizure_id = $seizure_id";
    $firearms = $conn->query($sql7);

    $sql8 = "SELECT * FROM cash WHERE seizure_id = $seizure_id";
    $cash = $conn->query($sql8);

    $sql9 = "SELECT * FROM bank WHERE seizure_id = $seizure_id";
    $bank = $conn->query($sql9);

    $sql20 = "SELECT * FROM bankacc WHERE seizure_id = $seizure_id";
    $bankacc = $conn->query($sql20);

    $sql21 = "SELECT * FROM shares WHERE seizure_id = $seizure_id";
    $share = $conn->query($sql21);

    $sql10 = "SELECT * FROM emails WHERE seizure_id = $seizure_id";
    $emails = $conn->query($sql10);

    $sql11 = "SELECT * FROM document WHERE seizure_id = $seizure_id";
    $document = $conn->query($sql11);

    $sql12 = "SELECT * FROM vehicles_machineries WHERE seizure_id = $seizure_id";
    $veh_machineries = $conn->query($sql12);

    $sql13 = "SELECT * FROM others WHERE seizure_id = $seizure_id";
    $others = $conn->query($sql13);

} else {
  ?>
    <script type="text/javascript">
        window.location.href = "add.php?ims_id=<?php echo $ims_id; ?>";
    </script>
<?php
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
    <script src="../colorbox/jquerykeswan.min.js"></script>
    <script src="../colorbox/jquery.colorbox.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
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

    <!-- popup modal colorbox -->
   
    <link rel="stylesheet" href="../colorbox/colorbox.css" />
    <link href="../build/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">
    
    <script>
      $(document).ready(function(){
        //Examples of how to assign the Colorbox event to elements
        
        $(".iframe").colorbox({iframe:true, width:"70%", height:"80%"});
        
      });
    </script>

</head>

<body style="background: #337AB7">
 <div id="wrapper" >

 <nav class="navbar navbar-inverse" role="navigation" style="margin-bottom: 0">
       
            <div class="navbar-header" style="background: #337AB7">
               <h1 align="center">
                <img src="../images/header.png"> 
                </h1> 
            </div>
      
                
            <ul class="nav navbar-nav" style="padding: 0 0 0 10% ;">
                <li>
                    <a href="index.php"><i class="fa fa-dashboard fa-fw"> </i> Dashboard</a>
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
    
    <div class="container">
            <form class="form-horizontal" role="form" method="post" action="supdate.php">
            <div class="row">
            <?php
              if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Success!</strong> <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
                </div>
              <?php } 
              
                    while($row = $result->fetch_assoc()) { ?>
                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4" for="seized_ref_no">Seized Reference No.:</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="seized_ref_no" value="<?php echo $row["seized_ref_no"]; ?>" >
                    </div>
                  </div>
                  
                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4">Case No.:</label>
                    <div class="col-md-8"> 
                     <input type="text" class="form-control" name="case_no" value="<?php echo $row["case_no"]; ?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4">Place :</label>
                    <div class="col-md-8"> 
                      <textarea class="form-control" rows="5" name="place_of_search"> <?php echo $row["place_of_search"]; ?></textarea>
                    </div>
                  </div>
                  
                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4">Date :</label>
                    <div class="col-md-8"> 
                      <input type="date" class="form-control" name="date" value="<?php echo $row["date"]; ?>" >
                    </div>
                  </div>

                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4">Time :</label>
                    <div class="col-md-8"> 
                      <input type="time" class="form-control" name="time" value="<?php echo $row["time"]; ?>">
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4">Items seized from :</label>
                    <div class="col-md-8"> 
                      <input type="text" class="form-control" name="seized_from" value="<?php echo $row["suspect"]; ?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4">Investigator:</label>
                    <div class="col-md-8"> 
                       <input type="text" class="form-control" name="investigator" value="<?php echo $row["investigator"]; ?>" readonly>
                    </div>
                  </div>
                  <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
                  
                                            
                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4">Search Order:</label>
                    <div class="col-md-8">
                      <?php $search = $row['search_order']; ?>
                      <input type="radio" name="search_order" value="Yes" <?php if($search == 'Yes') { ?> checked="checked" <?php } ?> id="show"> Yes
                      <input type="radio" name="search_order" value="No" <?php if($search == 'No') { ?> checked="checked" <?php } ?> id="hide" > No
                      <div id="search_order_ref" <?php if($search == 'No') { ?> style="display:none;" <?php } ?> >
                        <input type="text" class="form-control" name="search_order_ref" placeholder="Enter Search Order Reference" value="<?php echo $row["search_order_ref"]; ?>" >
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-12 form-group">
                    <label class="control-label col-md-2">Witness:</label>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="5" name="witness"> <?php echo $row["witness"]; ?></textarea>
                    </div>
                  </div>
              <?php
              }
              ?>
                  <div class="form-group col-md-12">  
                    <div class="col-md-offset-2 col-md-10" align="center">
                      <button type="submit" class="btn btn-primary">Save</button>
                      <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                  </div>
            </div>
        </form>
    </div>

<div class="container">
      <h3>Seized Items</h3>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#electronics">Electronics</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Real Estate<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a data-toggle="tab" href="#land">Land</a></li>
            <li><a data-toggle="tab" href="#buildings">Buildings</a></li>                        
          </ul>
        </li>
        <li><a data-toggle="tab" href="#jew">Jewelries</a></li>
        <li><a data-toggle="tab" href="#fire">Firearms</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cash<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a data-toggle="tab" href="#cash">Cash in hand</a></li>
            <li><a data-toggle="tab" href="#bank">Cash in Bank</a></li>                        
          </ul>
        </li>
        <li><a data-toggle="tab" href="#bankacc">Bank Accounts</a></li>
        <li><a data-toggle="tab" href="#shares">Shares and Stocks</a></li>
        <li><a data-toggle="tab" href="#emails">Emails</a></li>
        <li><a data-toggle="tab" href="#documents">Documents</a></li>
        <li><a data-toggle="tab" href="#veh_machineries">Vehicles and Machineries</a></li>
        <li><a data-toggle="tab" href="#others">Others</a></li>
      </ul>
    <div class="tab-content">

        <div id="electronics" class="tab-pane fade in active">
        <h3></h3>

        <?php 
        if($electronics->num_rows > 0) { 
            $counter = 0;
            ?>
          <table class="table table-bordered" id="dataTables-ele">
            <thead>
              <tr>
                <th>#</th>
                <th>Type</th>
                <th>Model</th>
                <th>Manufacturer</th>
                <th>Serial No.</th>
                <th>Capacity</th>
                <th>Storage Location</th>
                <th>Status</th>
               
                <th>Actions</th>

              </tr>
            </thead>
            <tbody>
            <?php while($row = $electronics->fetch_assoc()) { 
              $elec_id = $row["elec_id"];
              ?>
              <tr>
                <td><?php echo ++$counter; ?> </td>
                <td><?php echo $row["type"]; ?> </td>
                <td><?php echo $row["model"]; ?> </td>
                <td><?php echo $row["manufacturer"]; ?> </td>
                <td><?php echo $row["serial_no"]; ?> </td>
                <td><?php echo $row["capacity"]; ?> </td>
                <td><?php echo $row["location"]; ?> </td>
                <td><?php echo $row["status"]; ?> </td>
                
                
                <td>
                  <a href="elec_details.php?elec_id=<?php echo $elec_id ?>" class="btn btn-primary iframe"><i class="fa fa-eye"></i> Details</a>
                  <a href="elec_edit.php?elec_id=<?php echo $elec_id ?>" class='btn btn-success iframe'><i class="fa fa-pencil"></i> Edit</a>
                   <a href="delete.php?elec_id=<?php echo $elec_id ?>" class='btn btn-danger'><i class="fa fa-trash"></i> Delete</a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
          
        <?php } ?>
            <form class="form-horizontal" role="form" method="post" action="eleinsert.php" enctype="multipart/form-data">
            <div class="row">
                <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
                <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="type">Type</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="type">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="model">Model</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="model">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="manufacturer">Manufacturer</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="manufacturer">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="serial_no">Serial No.</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="serial_no">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="capacity">Capacity</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="capacity">
                    </div>
                </div>

                 <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="location"> Storage Location</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="location">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="status">Status</label>
                        <div class="col-md-8"> 
                              <input type="radio" name="status" value="Under Custody"> Under Custody
                              <input type="radio" name="status" value="OAG" > OAG
                              <input type="radio" name="status" value="Returned"> Returned
                              
                              <div id="ele-status-form"  class = "elecHide" style="display:none;">
                                
                  
                                <div class="input-group date" id="datetimepicker2">
                                      <input type="text" class="form-control" name="date_time" placeholder="date and time">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                  
                                <br>
                                <input type="text" class="form-control" name="to_whom" placeholder="to_whom"><br>
                                <input type="text" class="form-control" name="by_whom" placeholder="by_whom"><br>
                                <input type="text" class="form-control" name="witness" placeholder="witness"><br>
                              </div>
                        </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="electronics_img">Image</label>
                    <div class="col-md-8">

                      <input class="input-group" type="file" name="user_image" accept="image/*">
                    </div>
                </div>

                <div class="col-md-12 form-group col-md-offset-3" align="center">
                    <button type="submit" name="btnsave" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </div>
            </form>
        </div>

        <div id="land" class="tab-pane fade">
            <h3></h3>
            <?php 
        if($land->num_rows > 0) {
            $counter = 0;
         ?>
          <table class="table table-bordered" id="dataTables-land">
            <thead>
              <tr class="success">
                <th>#</th>
                <th>Land Type</th>
                <th>Area</th>
                <th>Thram No.</th>
                <th>Plot No.</th>
                <th>Location</th>
                <th>Registered Owner </th>
                <th>Freeze Order </th>
                <th>Status</th>
                
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php while($row = $land->fetch_assoc()) {
              $land_id = $row["land_id"];
             ?>
              <tr>
                <td><?php echo ++$counter; ?> </td>
                <td><?php echo $row["land_type"]; ?> </td>
                <td><?php echo $row["area"]; ?> </td>
                <td><?php echo $row["thram_no"]; ?> </td>
                <td><?php echo $row["house_no"]; ?> </td>
                <td><?php echo $row["location"]; ?> </td>
                <td><?php echo $row["reg_owner"]; ?> </td>
                <td><?php echo $row["freeze_order"]; ?> </td>
                <td><?php echo $row["status"]; ?> </td>
               
                
                <td>
                  <a href="land_details.php?land_id=<?php echo $land_id ?>" class="btn btn-primary iframe"><i class="fa fa-eye"></i> Details</a>
                  <a href="land_edit.php?land_id=<?php echo $land_id ?>" class='btn btn-success iframe'><i class="fa fa-pencil"></i> Edit</a>
                  <a href="delete.php?land_id=<?php echo $land_id ?>" class='btn btn-danger'><i class="fa fa-trash"></i> Delete</a>
                  
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        <?php } ?>

            <form class="form-horizontal" role="form1" method="post" action="linsert.php" enctype="multipart/form-data">
              <div class="row">
                    <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
                    <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
                    
                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="land_type">Land Type</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="land_type">
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="area">Area</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="area">
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="thram_no">Thram No.</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="thram_no">
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="house_no">Plot No.</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="house_no">
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="location">Location</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="location">
                        </div>
                    </div>

                     <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="reg_owner">Registered Owner</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="reg_owner">
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="freeze_order">Freeze Order</label>
                        <div class="col-md-8"> 
                              <input type="radio" name="freeze_order" value="Yes" id="land_show"> Yes
                              <input type="radio" name="freeze_order" value="No" id="land_hide" > No
                              <div id="freeze_order_ref" style="display:none;">
                                <input type="text" class="form-control" name="freeze_order_ref" placeholder="Enter Freeze Order Reference">
                              </div>
                        </div>
                    </div>
                 
                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="status">Status</label>
                        <div class="col-md-8"> 
                              <input type="radio" name="status" value="Under Custody"> Under Custody
                              <input type="radio" name="status" value="OAG" > OAG
                              <input type="radio" name="status" value="Returned"> Returned
                              
                              <div id="land-status-form"  class = "landHide" style="display:none;">
                               
                                <div class="input-group date" id="datetimepicker3">
                                      <input type="text" class="form-control" name="date_time" placeholder="date and time">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <br>
                                <input type="text" class="form-control" name="to_whom" placeholder="to_whom"><br>
                                <input type="text" class="form-control" name="by_whom" placeholder="by_whom"><br>
                                <input type="text" class="form-control" name="witness" placeholder="witness"><br>
                                
                              </div>
                        </div>
                    </div>

                       
                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="land_img">Image</label>
                        <div class="col-md-8">
                          <input type="file" class="form-control" name="user_image" accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-12 form-group col-md-offset-3" align="center">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>

                </div>
            </form>
        </div>

        <div id="buildings" class="tab-pane fade">
            <h3></h3>
            <?php 
        if($buildings->num_rows > 0) {
            $counter = 0;
         ?>
          <table class="table table-striped table-bordered">
            <thead>
              <tr class="success">
                <th>#</th>
                <th>Building Address</th>
                <th>Registered Owner</th>
                <th>House No.</th>
                <th>Description</th>
                <th>Freeze Order </th>
                <th>Status</th>
                
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php while($row = $buildings->fetch_assoc()) { 
              $building_id = $row["building_id"];
              ?>
              <tr>
                <td><?php echo ++$counter; ?> </td>
                <td><?php echo $row["address"]; ?> </td>
                <td><?php echo $row["reg_owner"]; ?> </td>
                <td><?php echo $row["house_no"]; ?> </td>
                <td><?php echo $row["description"]; ?> </td>
                <td><?php echo $row["freeze_order"]; ?> </td>
                <td><?php echo $row["status"]; ?> </td>
                
                
                <td>
                  <a href="build_details.php?building_id=<?php echo $building_id ?>" class="btn btn-primary iframe"><i class="fa fa-eye"></i> Details</a>
                  <a href="build_edit.php?building_id=<?php echo $building_id ?>" class='btn btn-success iframe'><i class="fa fa-pencil"></i> Edit</a>
                   <a href="delete.php?building_id=<?php echo $building_id ?>" class='btn btn-danger'><i class="fa fa-trash"></i> Delete</a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        <?php } ?>

            <form class="form-horizontal" role="form" method="post" action="buinsert.php" enctype="multipart/form-data">
                <div class="row">

                <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
                <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
                
                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="address">Building Address</label>
                        <div class="col-md-8">
                          <textarea class="form-control" rows="3" name="address"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="reg_owner">Registered Owner</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="reg_owner">
                        </div>
                    </div>

                   

                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="house_no">House No.</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="house_no">
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="description">Description</label>
                        <div class="col-md-8">
                          <textarea class="form-control" rows="5" name="description"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="bfreeze_order">Freeze Order</label>
                        <div class="col-md-8"> 
                              <input type="radio" name="bfreeze_order" value="Yes" id="b_show"> Yes
                              <input type="radio" name="bfreeze_order" value="No" id="b_hide" > No
                              <div id="bfreeze_order_ref" style="display:none;">
                                <input type="text" class="form-control" name="freeze_order_ref" placeholder="Enter Freeze Order Reference">
                                 
                              </div>
                              
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="status">Status</label>
                        <div class="col-md-8"> 
                              <input type="radio" name="status" value="Under Custody"> Under Custody
                              <input type="radio" name="status" value="OAG" > OAG
                              <input type="radio" name="status" value="Returned"> Returned
                              
                              <div id="bu-status-form"  class = "buHide" style="display:none;">
                                <div class="input-group date" id="datetimepicker4">
                                      <input type="text" class="form-control" name="date_time" placeholder="date and time">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <br>
                                <input type="text" class="form-control" name="to_whom" placeholder="to_whom"><br>
                                <input type="text" class="form-control" name="by_whom" placeholder="by_whom"><br>
                                <input type="text" class="form-control" name="witness" placeholder="witness"><br>
                                
                              </div>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="build_img">Image</label>
                        <div class="col-md-8">
                          <input type="file" class="form-control" name="user_image" accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-12 form-group col-md-offset-3" align="center">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
            </form>
        </div>


         <div id="jew" class="tab-pane fade">
            <h3></h3>
            <?php 
              if($jewlries->num_rows > 0) {
                $counter = 0;
               ?>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr class="success">
                      <th>#</th>
                      <th>Jewellry Type</th>
                      <th>Material</th>
                      <th>Description</th>
                      <th>Storage Location</th>
                      <th>Status</th>
                      <th>Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php while($row = $jewlries->fetch_assoc()) { 
                    $jew_id = $row["jew_id"];
                    ?>
                    <tr>
                      <td><?php echo ++$counter; ?> </td>
                      <td><?php echo $row["jew_type"]; ?> </td>
                      <td><?php echo $row["material"]; ?> </td>
                      <td><?php echo $row["description"]; ?> </td>
                      <td><?php echo $row["location"]; ?> </td>
                      <td><?php echo $row["status"]; ?> </td>
                      
                      <td>
                     
                        <a href="jew_details.php?jew_id=<?php echo $jew_id ?>" class="btn btn-primary iframe"><i class="fa fa-eye"></i> Details</a>
                        <a href="jew_edit.php?jew_id=<?php echo $jew_id ?>" class='btn btn-success iframe'><i class="fa fa-pencil"></i> Edit</a>
                         <a href="delete.php?jew_id=<?php echo $jew_id ?>" class='btn btn-danger'><i class="fa fa-trash"></i> Delete</a>
                        
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              <?php } ?>

            <form class="form-horizontal" role="form" method="post" action="jinsert.php" enctype="multipart/form-data">
                <div class="row">
                <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
                <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="jew_type">Jewelries Type</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="jew_type">
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="material">Material</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="material">
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="description">Description</label>
                        <div class="col-md-8">
                          <textarea class="form-control" rows="5" name="description"></textarea> 
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="location"> Storage Location</label>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="location">
                        </div>
                    </div>


                     <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="status">Status</label>
                        <div class="col-md-8"> 
                              <input type="radio" name="status" value="Under Custody"> Under Custody
                              <input type="radio" name="status" value="OAG" > OAG
                              <input type="radio" name="status" value="Returned"> Returned
                              
                              <div id="jew-status-form"  class = "jewHide" style="display:none;">
                                <div class="input-group date" id="datetimepicker5">
                                      <input type="text" class="form-control" name="date_time" placeholder="date and time">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <br>
                                <input type="text" class="form-control" name="to_whom" placeholder="to_whom"><br>
                                <input type="text" class="form-control" name="by_whom" placeholder="by_whom"><br>
                                <input type="text" class="form-control" name="witness" placeholder="witness"><br>
                                
                              </div>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="jew_image">Image</label>
                        <div class="col-md-8">
                          <input type="file" class="form-control" name="user_image" accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-12 form-group col-md-offset-3" align="center">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
            </form>
        </div>
        
        <div id="fire" class="tab-pane fade">
            <h3></h3>
            <?php 
        if($firearms->num_rows > 0) { 
            $counter = 0;
            ?>
          <table class="table table-striped table-bordered">
            <thead>
              <tr class="success">
                <th>#</th>
                <th>Type</th>
                <th>Model</th>
                <th>Manufacturer</th>
                <th>Serial No.</th>
                <th> Storage Location</th>
                <th>Remarks</th>
                <th>Status</th>
                
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php while($row = $firearms->fetch_assoc()) { 
              $fa_id = $row["fa_id"];
              ?>
              <tr>
                <td><?php echo  ++$counter;  ?> </td>
                <td><?php echo $row["fa_type"]; ?> </td>
                <td><?php echo $row["model"]; ?> </td>
                <td><?php echo $row["manufacturer"]; ?> </td>
                <td><?php echo $row["serial_no"]; ?> </td>
                <td><?php echo $row["location"]; ?> </td>
                <td><?php echo $row["location"]; ?> </td>
                <td><?php echo $row["status"]; ?> </td>
                
                <td>
              <a href="fire_details.php?fa_id=<?php echo $fa_id ?>" class="btn btn-primary iframe"><i class="fa fa-eye"></i> Details</a>
              <a href="fire_edit.php?fa_id=<?php echo $fa_id ?>" class='btn btn-success iframe'><i class="fa fa-pencil"></i> Edit</a>
               <a href="delete.php?fa_id=<?php echo $fa_id ?>" class='btn btn-danger'><i class="fa fa-trash"></i> Delete</a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        <?php } ?>
            <form class="form-horizontal" role="form" method="post" action="finsert.php" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
                    <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
                    <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="fa_type">Type</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="fa_type">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="model">Model</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="model">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="manufacturer">Manufacturer</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="manufacturer">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="serial_no">Serial No.</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="serial_no">
                    </div>
                </div>


                 <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="location"> Storage Location</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="location">
                    </div>
                </div>

                 <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="remarks">Remarks</label>
                    <div class="col-md-8">
                      <textarea class="form-control" rows="3" name="remarks"></textarea> 
                    </div>
                </div>

                <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="status">Status</label>
                        <div class="col-md-8"> 
                              <input type="radio" name="status" value="Under Custody"> Under Custody
                              <input type="radio" name="status" value="OAG" > OAG
                              <input type="radio" name="status" value="Returned"> Returned
                              
                              <div id="fire-status-form"  class = "fireHide" style="display:none;">
                                
                                <div class="input-group date" id="datetimepicker6">
                                      <input type="text" class="form-control" name="date_time" placeholder="date and time">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <br>
                                <input type="text" class="form-control" name="to_whom" placeholder="to_whom"><br>
                                <input type="text" class="form-control" name="by_whom" placeholder="by_whom"><br>
                                <input type="text" class="form-control" name="witness" placeholder="witness"><br>
                                
                              </div>
                        </div>
                    </div>
                 
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="fire_img">Image</label>
                    <div class="col-md-8">
                      <input type="file" class="form-control" name="user_image" accept="image/*">
                    </div>
                </div>
                <div class="col-md-12 form-group col-md-offset-3" align="center">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
                </div>
            </form>
        </div>

         <div id="cash" class="tab-pane fade">
            <h3></h3>
            <?php 
        if($cash->num_rows > 0) { 
            $counter = 0;
            ?>
          <table class="table table-striped table-bordered">
            <thead>
              <tr class="success">
                <th>ID #</th>
                <th>Cash Amount</th>
                <th>Currency</th>
                <th>Description</th>
                <th>Storage Location</th>
                <th>Status</th>
                
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php while($row = $cash->fetch_assoc()) { 
              $cash_id = $row["cash_id"];
              ?>
              <tr>
                <td><?php echo  ++$counter;  ?> </td>
                <td><?php echo $row["cash_amount"]; ?> </td>
                <td><?php echo $row["currency"]; ?> </td>
                <td><?php echo $row["description"]; ?></td>
                <td><?php echo $row["cash_location"]; ?> </td>
                <td><?php echo $row["status"]; ?> </td>
                
                <td>
                  <a href="cash_details.php?cash_id=<?php echo $cash_id ?>" class="btn btn-primary iframe"><i class="fa fa-eye"></i> Details</a>
              <a href="cash_edit.php?cash_id=<?php echo $cash_id ?>" class='btn btn-success iframe'><i class="fa fa-pencil"></i> Edit</a>
               <a href="delete.php?cash_id=<?php echo $cash_id ?>" class='btn btn-danger'><i class="fa fa-trash"></i> Delete</a>
                  
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        <?php } ?>
            <form class="form-horizontal" role="form" method="post" action="cinsert.php" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
                    <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
                    <input type="hidden" value="<?php echo $cash_id; ?>" name="cash_id">
                      <div class="col-md-12 form-group">
                      <label class="control-label col-md-2" for="amount">Amount</label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" name="cash_amount">
                      </div>
                  </div>
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="currency">Currency</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="currency">
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="description">Description</label>
                   
                    <div class="col-md-8">
                    <textarea class="form-control" name="description"></textarea> 
                      
                    </div>
                </div>
                 <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="cash_location"> Storage Location</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="cash_location">
                    </div>
                </div>
                <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="status">Status</label>
                        <div class="col-md-8"> 
                              <input type="radio" name="status" value="Under Custody"> Under Custody
                              <input type="radio" name="status" value="OAG" > OAG
                              <input type="radio" name="status" value="Returned"> Returned
                              
                              <div id="cash-status-form"  class = "cashHide" style="display:none;">
                                  <div class="input-group date" id="datetimepicker7">
                                      <input type="text" class="form-control" name="date_time" placeholder="date and time">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <br>
                                <input type="text" class="form-control" name="to_whom" placeholder="to_whom"><br>
                                <input type="text" class="form-control" name="by_whom" placeholder="by_whom"><br>
                                <input type="text" class="form-control" name="witness" placeholder="witness"><br>
                                
                              </div>
                        </div>
                </div>
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="user_image">Image</label>
                    <div class="col-md-8">
                      <input type="file" class="form-control" name="user_image" accept="image/*">
                    </div>
                </div>
                <div class="col-md-12 form-group col-md-offset-3" align="center">
                    <button type="submit" name="btnsave" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
                </div>
            </form>
        </div>

        <div id="bank" class="tab-pane fade">
            <h3></h3>
             <?php 
        if($bank->num_rows > 0) { 
            $counter = 0;
            ?>
          <table class="table table-striped table-bordered">
            <thead>
              <tr class="success">
                <th>#</th>
                <th>Bank Name</th>
                <th>Account No.</th>
                <th>Account Holder Name</th>
                <th>Total Amount</th>
                <th>Bank Address</th>
                <th>Status</th>
                
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php while($row = $bank->fetch_assoc()) { 
              $bank_id = $row["bank_id"];
              ?>
              <tr>
                <td><?php echo  ++$counter;  ?> </td>
                <td><?php echo $row["bank_name"]; ?> </td>
                <td><?php echo $row["acc_no"]; ?> </td>
                <td><?php echo $row["acc_holder_name"]; ?> </td>
                <td><?php echo $row["tot_amt"]; ?> </td>
                <td><?php echo $row["b_add"]; ?> </td>
                <td><?php echo $row["status"]; ?> </td>
                
                <td>
                  <a href="bank_details.php?bank_id=<?php echo $bank_id ?>" class="btn btn-primary iframe"><i class="fa fa-eye"></i> Details</a>
                  <a href="bank_edit.php?bank_id=<?php echo $bank_id ?>" class='btn btn-success iframe'><i class="fa fa-pencil"></i> Edit</a></a>
                   <a href="delete.php?bank_id=<?php echo $bank_id ?>" class='btn btn-danger'><i class="fa fa-trash"></i> Delete</a>
                  
                  
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        <?php } ?>
            <form class="form-horizontal" role="form" method="post" action="binsert.php" enctype="multipart/form-data">
                <div class="row">
                <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
                <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
                
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="bank_name">Bank Name</label>
                   
                      <div class="col-md-8">
                        <select name="bank_name" id="bank_name" class="form-control select" >
                            <option>-----</option>
                            <option>T-Bank</option>
                            <option>BOB</option>
                            <option>BNB</option>
                            <option>BDBL</option>
                            <option>PNB</option>
                        </select>
                    </div>
                    
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="acc_no">Account No.</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="acc_no">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="acc_holder_name">Account Holder Name</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="acc_holder_name">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="tot_amt">Total Amount</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="tot_amt">
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="b_add">Bank Address</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="b_add">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="status">Status</label>
                        <div class="col-md-8"> 
                              <input type="radio" name="status" value="Under Custody"> Under Custody
                              <input type="radio" name="status" value="OAG" > OAG
                              <input type="radio" name="status" value="Returned"> Returned
                              
                              <div id="bank-status-form"  class = "bankHide" style="display:none;">
                                <div class="input-group date" id="datetimepicker8">
                                      <input type="text" class="form-control" name="date_time" placeholder="date and time">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <br>
                                <input type="text" class="form-control" name="to_whom" placeholder="to_whom"><br>
                                <input type="text" class="form-control" name="by_whom" placeholder="by_whom"><br>
                                <input type="text" class="form-control" name="witness" placeholder="witness"><br>
                                
                              </div>
                        </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="user_image">Image</label>
                    <div class="col-md-8">
                      <input type="file" class="form-control" name="user_image" accept="image/*">
                    </div>
                </div>

                <div class="col-md-12 form-group col-md-offset-3" align="center">
                    <button type="submit" name="btnsave" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
              </div>
            </form>
        </div>

        <div id="bankacc" class="tab-pane fade">
            <h3></h3>
            <?php 
        if($bankacc->num_rows > 0) { 
            $counter = 0;
            ?>
          <table class="table table-striped table-bordered">
            <thead>
              <tr class="success">
                <th>#</th>
                <th>Bank Name</th>
                <th>Account Holder Name</th>
                <th>Account No.</th>
                <th>Address</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Actions</th>

              </tr>
            </thead>
            <tbody>
            <?php while($row = $bankacc->fetch_assoc()) { 
              $acc_id = $row["acc_id"];
              ?>
            
              <tr>
                <td><?php echo  ++$counter;  ?> </td>
                <td><?php echo $row["bank_name"]; ?> </td>
                <td><?php echo $row["acc_holder_name"]; ?> </td>
                <td><?php echo $row["acc_no"]; ?> </td>
                <td><?php echo $row["address"]; ?> </td>
                <td><?php echo $row["tot_amt"]; ?> </td>
                <td><?php echo $row["status"]; ?> </td>
               
                <td>
                  <a href="bankacc_details.php?acc_id=<?php echo $acc_id ?>" class="btn btn-primary iframe"><i class="fa fa-eye"></i> Details</a>
                  <a href="bankacc_edit.php?acc_id=<?php echo $acc_id ?>" class='btn btn-success iframe'><i class="fa fa-pencil"></i> Edit</a>
                   <a href="delete.php?acc_id=<?php echo $acc_id ?>" class='btn btn-danger'><i class="fa fa-trash"></i> Delete</a>
                  
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        <?php } ?>
            <form class="form-horizontal" role="form" method="post" action="bankaccinsert.php" enctype="multipart/form-data">
                <div class="row">
                <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
                <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
                
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="bank_name">Bank Name</label>
                   
                      <div class="col-md-8">
                        <select name="bank_name" id="bank_name" class="form-control select" >
                            <option>-----</option>
                            <option>T-Bank</option>
                            <option>BOB</option>
                            <option>BNB</option>
                            <option>BDBL</option>
                            <option>PNB</option>
                        </select>
                    </div>
                    
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="acc_holder_name">Account Holder Name</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="acc_holder_name">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="acc_no">Account No</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="acc_no">
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="address">Bank Address </label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="address">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="tot_amt">Total Amount</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="tot_amt">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="status">Status</label>
                        <div class="col-md-8"> 
                              <input type="radio" name="status" value="Under Custody"> Under Custody
                              <input type="radio" name="status" value="OAG" > OAG
                              <input type="radio" name="status" value="Returned"> Returned
                              
                              <div id="acc-status-form"  class = "accHide" style="display:none;">
                                <div class="input-group date" id="datetimepicker9">
                                      <input type="text" class="form-control" name="date_time" placeholder="date and time">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <br>
                                <input type="text" class="form-control" name="to_whom" placeholder="to_whom"><br>
                                <input type="text" class="form-control" name="by_whom" placeholder="by_whom"><br>
                                <input type="text" class="form-control" name="witness" placeholder="witness"><br>
                                
                              </div>
                        </div>
                </div>


                 <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="user_image">Image</label>
                    <div class="col-md-8">
                      <input type="file" class="form-control" name="user_image" accept="image/*">
                    </div>
                </div>
                <div class="col-md-12 form-group col-md-offset-3" align="center">
                    <button type="submit" name="btnsave" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>

               
            </div>
            </form>
        </div>
        <div id="shares" class="tab-pane fade">
            <h3></h3>
            <?php 
        if($share->num_rows > 0) { 
         $counter = 0;
          ?>
          <table class="table table-striped table-bordered">
            <thead>
              <tr class="success">
                <th>#</th>
                <th>Shareholder Name</th>
                <th>No of Shares</th>
                <th>Share Value</th>
                <th>Issuing Company</th>
                <th>Status</th>
                
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php while($row = $share->fetch_assoc()) { 
                
              $share_id = $row["share_id"];
              ?>
              <tr>
                <td><?php echo  ++$counter;  ?> </td>
                <td><?php echo $row["name"]; ?> </td>
                <td><?php echo $row["no_of_shares"]; ?> </td>
                <td><?php echo $row["share_value"]; ?> </td>
                <td><?php echo $row["company"]; ?> </td>
                <td><?php echo $row["status"]; ?> </td>
                
              <td>
                  <a href="shares_details.php?share_id=<?php echo $share_id ?>" class="btn btn-primary iframe"><i class="fa fa-eye"></i> Details</a>
                  <a href="share_edit.php?share_id=<?php echo $share_id ?>" class='btn btn-success iframe'><i class="fa fa-pencil"></i> Edit</a>
                   <a href="delete.php?share_id=<?php echo $share_id ?>" class='btn btn-danger'><i class="fa fa-trash"></i> Delete</a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        <?php } ?>

            <form class="form-horizontal" role="form" method="post" action="shareinsert.php" enctype="multipart/form-data">
              <div class="row">
                <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
                <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="name">Shareholder Name</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="name">
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="no_of_shares">No of Shares</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="no_of_shares">
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="share_value">Share Value</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="share_value">
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="company">Issuing Company</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="company">
                    </div>
                </div>

                
                <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="status">Status</label>
                        <div class="col-md-8"> 
                              <input type="radio" name="status" value="Under Custody"> Under Custody
                              <input type="radio" name="status" value="OAG" > OAG
                              <input type="radio" name="status" value="Returned"> Returned
                              
                              <div id="sha-status-form"  class = "shaHide" style="display:none;">
                                <div class="input-group date" id="datetimepicker10">
                                      <input type="text" class="form-control" name="date_time" placeholder="date and time">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <br>
                                <input type="text" class="form-control" name="to_whom" placeholder="to_whom"><br>
                                <input type="text" class="form-control" name="by_whom" placeholder="by_whom"><br>
                                <input type="text" class="form-control" name="witness" placeholder="witness"><br>
                                
                              </div>
                        </div>
                </div>
                 <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="user_image">Image</label>
                    <div class="col-md-8">
                      <input type="file" class="form-control" name="user_image" accept="image/*">
                    </div>
                </div>
                <div class="col-md-12 form-group col-md-offset-3" align="center">
                    <button type="submit" name="btnsave" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>

               
            </div>
            </form>
        </div>

        <div id="emails" class="tab-pane fade">
            <h3></h3>
            <?php 
        if($emails->num_rows > 0) { 
            $counter = 0;
            ?>
          <table class="table table-striped table-bordered">
            <thead>
              <tr class="success">
                <th>#</th>
                <th>Email Address</th>
                <th>Password</th>
                <th>Reset Password</th>
                <th>Status</th>
                
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php while($row = $emails->fetch_assoc()) { 

              $email_id = $row["email_id"];
              ?>
              <tr>
                <td><?php echo  ++$counter;  ?> </td>
                <td><?php echo $row["email_add"]; ?> </td>
                <td><?php echo $row["pwd"]; ?> </td>
                <td><?php echo $row["re_pwd"]; ?> </td>
                <td><?php echo $row["status"]; ?> </td>
                
              <td>
                  <a href="email_details.php?email_id=<?php echo $email_id ?>" class="btn btn-primary iframe"><i class="fa fa-eye"></i> Details</a>
                  <a href="email_edit.php?email_id=<?php echo $email_id ?>" class='btn btn-success iframe'><i class="fa fa-pencil"></i> Edit</a></a>
                   <a href="delete.php?email_id=<?php echo $email_id ?>" class='btn btn-danger'><i class="fa fa-trash"></i> Delete</a>
                  
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        <?php } ?>

            <form class="form-horizontal" role="form" method="post" action="einsert.php" enctype="multipart/form-data">
              <div class="row">
                <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
                <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="email_add">Email Address</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="email_add">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="pwd">Password</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="pwd">
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="">Reset Password</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="re_pwd">
                    </div>
                </div>
                <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="status">Status</label>
                        <div class="col-md-8"> 
                              <input type="radio" name="status" value="Under Custody"> Under Custody
                              <input type="radio" name="status" value="OAG" > OAG
                              <input type="radio" name="status" value="Returned"> Returned
                              
                              <div id="em-status-form"  class = "emHide" style="display:none;">
                                <div class="input-group date" id="datetimepicker11">
                                      <input type="text" class="form-control" name="date_time" placeholder="date and time">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <br>
                                <input type="text" class="form-control" name="to_whom" placeholder="to_whom"><br>
                                <input type="text" class="form-control" name="by_whom" placeholder="by_whom"><br>
                                <input type="text" class="form-control" name="witness" placeholder="witness"><br>
                                
                              </div>
                        </div>
                </div>
                 <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="user_image">Image</label>
                    <div class="col-md-8">
                      <input type="file" class="form-control" name="user_image" accept="image/*">
                    </div>
                </div>
                <div class="col-md-12 form-group col-md-offset-3" align="center">
                    <button type="submit" name="btnsave" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>

               
            </div>
            </form>
        </div>

        <div id="documents" class="tab-pane fade">
            <h3></h3>
            <?php 
            if($document->num_rows > 0) { 
                $counter = 0;
                ?>
              <table class="table table-striped table-bordered">
                <thead>
                  <tr class="success">
                    <th>#</th>
                    <th>Document Type</th>
                    <th>No.of Pages</th>
                    <th>Remarks</th>
                    <th>Storage Location</th>
                    <th>Status</th>
                    
                    <th >Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php while($row = $document->fetch_assoc()) { 
                  $doc_id = $row ['doc_id'];

                  ?>
                  <tr>
                    <td><?php echo  ++$counter; ?> </td>
                    <td><?php echo $row["doc_type"]; ?> </td>
                    <td><?php echo $row["no_of_pages"]; ?> </td>
                    <td><?php echo $row["remarks"]; ?> </td>
                    <td><?php echo $row["location"]; ?> </td>
                    <td><?php echo $row["status"]; ?> </td>
                    
                  <td>
                      <a href="doc_details.php?doc_id=<?php echo $doc_id ?>" class="btn btn-primary iframe"><i class="fa fa-eye"></i> Details</a>
                  <a href="doc_edit.php?doc_id=<?php echo $doc_id ?>" class='btn btn-success iframe'><i class="fa fa-pencil"></i> Edit</a></a>
                   <a href="delete.php?doc_id=<?php echo $doc_id ?>" class='btn btn-danger'><i class="fa fa-trash"></i> Delete</a>
                      
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            <?php } ?>
            <form class="form-horizontal" role="form" method="post" action="docinsert.php" enctype="multipart/form-data">
              <div class="row">
                <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
                <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
                
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="doc_type">Document Type</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="doc_type">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="no_of_pages">No.of Pages</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="no_of_pages">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="remarks">Remarks</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="remarks">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="location">Location</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="location">
                    </div>
                </div>

                  

                <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="status">Status</label>
                        <div class="col-md-8"> 
                              <input type="radio" name="status" value="Under Custody"> Under Custody
                              <input type="radio" name="status" value="OAG" > OAG
                              <input type="radio" name="status" value="Returned"> Returned
                              
                              <div id="doc-status-form"  class = "docHide" style="display:none;">
                                <div class="input-group date" id="datetimepicker12">
                                      <input type="text" class="form-control" name="date_time" placeholder="date and time">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <br>
                                <input type="text" class="form-control" name="to_whom" placeholder="to_whom"><br>
                                <input type="text" class="form-control" name="by_whom" placeholder="by_whom"><br>
                                <input type="text" class="form-control" name="witness" placeholder="witness"><br>
                                
                              </div>
                        </div>
                </div>


                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="electronics_img">Image</label>
                    <div class="col-md-8">
                      <input type="file" class="form-control" name="user_image" accept="image/*">
                    </div>
                </div>

                <div class="col-md-12 form-group col-md-offset-3" align="center">
                    <button type="submit" name="btnsave" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
              </div>
            </form>
        </div>

         <div id="veh_machineries" class="tab-pane fade">
            <h3></h3>
            <?php 
        if($veh_machineries->num_rows > 0) { 
            $counter = 0;
          ?>
          <table class="table table-striped table-bordered ">
            <thead>
              <tr class="success">
                <th>#</th>
                <th>Model</th>
                <th>Manufacturer</th>
                <th>Registered No.</th>
                <th>Registered Owner</th>
                <th> Storage Location</th>
                <th>Description</th>
                <th>Status</th>
                
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php while($row = $veh_machineries->fetch_assoc()) { 
              $vm_id = $row["vm_id"];
              ?>
              <tr>
                <td><?php echo  ++$counter;  ?> </td>
                <td><?php echo $row["model"]; ?> </td>
                <td><?php echo $row["manufacturer"]; ?> </td>
                <td><?php echo $row["reg_no"]; ?> </td>
                <td><?php echo $row["reg_owner"]; ?> </td>
                <td><?php echo $row["location"]; ?> </td>
                <td><?php echo $row["description"]; ?> </td>
                <td><?php echo $row["status"]; ?> </td>
                
                <td>
                  <a href="vm_details.php?vm_id=<?php echo $vm_id ?>" class="btn btn-primary iframe"><i class="fa fa-eye"></i> Details</a>
                  <a href="vm_edit.php?vm_id=<?php echo $vm_id ?>" class='btn btn-success iframe'><i class="fa fa-pencil"></i> Edit</a>
                   <a href="delete.php?vm_id=<?php echo $vm_id ?>" class='btn btn-danger'><i class="fa fa-trash"></i> Delete</a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        <?php } ?>

            <form class="form-horizontal" role="form" method="post" action="vinsert.php" enctype="multipart/form-data">
              <div class="row">
                <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
                <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
                
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="model">Model</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="model">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="manufacturer">Manufacturer</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="manufacturer">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="reg_no">Registered No.</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="reg_no">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="reg_owner">Registered Owner</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="reg_owner">
                    </div>
                </div>

                 <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="location"> Storage Location</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="location">
                    </div>
                </div>  

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="description">Description</label>
                    <div class="col-md-8">
                      <textarea class="form-control" rows="5" name="description"> </textarea>
                    </div>
                </div>

                 <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="status">Status</label>
                        <div class="col-md-8"> 
                              <input type="radio" name="status" value="Under Custody"> Under Custody
                              <input type="radio" name="status" value="OAG" > OAG
                              <input type="radio" name="status" value="Returned"> Returned
                              
                              <div id="vm-status-form"  class = "vmHide" style="display:none;">
                                <div class="input-group date" id="datetimepicker13">
                                      <input type="text" class="form-control" name="date_time" placeholder="date and time">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <br>
                                <input type="text" class="form-control" name="to_whom" placeholder="to_whom"><br>
                                <input type="text" class="form-control" name="by_whom" placeholder="by_whom"><br>
                                <input type="text" class="form-control" name="witness" placeholder="witness"><br>
                                
                              </div>
                        </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="electronics_img">Image</label>
                    <div class="col-md-8">
                      <input type="file" class="form-control" name="user_image" accept="image/*">
                    </div>
                </div>

                <div class="col-md-12 form-group col-md-offset-3" align="center">
                    <button type="submit" name="btnsave" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
              </div>
            </form>
        </div>

        <div id="others" class="tab-pane fade">
            <h3></h3>
            <?php 
              if($others->num_rows > 0) { 
                $counter = 0;
                ?>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr class="success">
                      <th>#</th>
                      <th>Type</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Quantity</th>
                      <th>Status</th>
                      
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php while($row = $others->fetch_assoc()) { 
                      $others_id = $row['others_id'];
                    ?>
                    <tr>
                      <td><?php echo  ++$counter;  ?> </td>
                      <td><?php echo $row["type"]; ?> </td>
                      <td><?php echo $row["name"]; ?> </td>
                      <td><?php echo $row["description"]; ?> </td>
                      <td><?php echo $row["quantity"]; ?> </td>
                      <td><?php echo $row["status"]; ?> </td>
                      

                      <td>
                        <a href="other_details.php?others_id=<?php echo $others_id ?>" class="btn btn-primary iframe"><i class="fa fa-eye"></i> Details</a>
                  <a href="other_edit.php?others_id=<?php echo $others_id ?>" class='btn btn-success iframe'><i class="fa fa-pencil"></i> Edit</a>
                   <a href="delete.php?others_id=<?php echo $others_id ?>" class='btn btn-danger'><i class="fa fa-trash"></i> Delete</a>
                        
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
            <?php } ?>

            <form class="form-horizontal" role="form" method="post" action="oinsert.php" enctype="multipart/form-data">
                <div class="row">
                <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
                <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
                
               <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="type">Type</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="type"><br>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="name">Name</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="name"><br>
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="description">Description</label>
                    <div class="col-md-8">
                    <textarea class="form-control" name="description"></textarea> 
                      
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="quantity">Quantity</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="quantity"><br>
                    </div>
                </div>
                   
                     <div class="col-md-12 form-group">
                        <label class="control-label col-md-2" for="status">Status</label>
                        <div class="col-md-8"> 
                              <input type="radio" name="status" value="Under Custody"> Under Custody
                              <input type="radio" name="status" value="OAG" > OAG
                              <input type="radio" name="status" value="Returned"> Returned
                              <input type="radio" name="status" value="Auctioned"> Auctioned
                              
                              <div class="status-form" id="status_returned_oag" style="display:none;" >
                                  <div class="input-group date" id="datetimepicker14">
                                      <input type="text" class="form-control" name="date_time" placeholder="date and time">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                  <br>
                                  <input type="text" class="form-control" name="to_whom" placeholder="to_whom" > <br>
                                  <input type="text" class="form-control" name="by_whom" placeholder="by_whom" > <br>
                                  <input type="text" class="form-control" name="witness" placeholder="witness" > <br>
                                </div>

                                <div class="status-form" id="status_auctioned" style="display:none;" >
                                  <div class="input-group date" id="datetimepicker15">
                                      <input type="text" class="form-control" name="date_time2" placeholder="date and time">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                  <br>
                                  <input type="text" class="form-control" name="com" placeholder="committee" > <br>
                                  <input type="text" class="form-control" name="place_of_auc" placeholder="place of auction" > 
                                <input type="text" class="form-control" name="tot_amt" placeholder="total amount" > <br>
                                <input type="text" class="form-control" name="bid_win" placeholder="bid winner" > <br>
                                </div>
                        </div>
                </div>
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="user_image">Image</label>
                    <div class="col-md-8">
                      <input type="file" class="form-control" name="user_image" accept="image/*">
                    </div>
                </div>

                <div class="col-md-12 form-group col-md-offset-3" align="center">
                    <button type="submit" name="btnsave" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
              </div>
            </form>
        </div>
       
       
    </div>
</div>
</div>
</div>
  <footer >

        <p style="color: #fff; text-align: center; padding-top: 10px">
        Copyright © 2016 Office of the Anti-Corruption Commission, Thimphu, Post Box 1113, Phone: +975-2-334863/64/66/69 -Asset -337423, Fax: +975-2-334865
        </p>
    </footer>    
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
<script src="../build/js/moment.min.js"></script>
<script src="../build/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
            $('#datetimepicker2').datetimepicker();
            $('#datetimepicker3').datetimepicker();
            $('#datetimepicker4').datetimepicker();
            $('#datetimepicker5').datetimepicker();
            $('#datetimepicker6').datetimepicker();
            $('#datetimepicker7').datetimepicker();
            $('#datetimepicker8').datetimepicker();
            $('#datetimepicker9').datetimepicker();
            $('#datetimepicker10').datetimepicker();
            $('#datetimepicker11').datetimepicker();
            $('#datetimepicker12').datetimepicker();
            $('#datetimepicker13').datetimepicker();
            $('#datetimepicker14').datetimepicker();
            $('#datetimepicker15').datetimepicker();

        });
</script>  


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
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

       $('#dataTables-example').DataTable({
                responsive: true
        });
        $("#b_hide").click(function(){
            $("#bfreeze_order_ref").slideUp();
        });
        $("#b_show").click(function(){
            $("#bfreeze_order_ref").slideDown();
        });
        $('#dataTables-example').DataTable({
                responsive: true
        });
        $("#hide").click(function(){
            $("#search_order_ref").slideUp();
        });
        $("#show").click(function(){
            $("#search_order_ref").slideDown();
        });
    
        
   //others//
        $("[name=status]").click(function(){
        var status = $(this).val();
        $('.status-form').hide();

        if(status == "Returned" || status == "OAG") {
          $("#status_returned_oag").show('slow');
        } else if(status == "Auctioned") {
          $("#status_auctioned").show('slow');
        }
       });

        //electronics
         $("[name=status]").click(function(){
            var status = $(this).val();
            $('.elecHide').hide();

            if( status == "Returned" || status == "OAG") {
              $("#ele-status-form").show('slow');
            }
            
          });

         //land
          $("[name=status]").click(function(){
            var status = $(this).val();
            $('.landHide').hide();

            if( status == "Returned" || status == "OAG") {
              $("#land-status-form").show('slow');
            }
            
          });

          //buildings
          $("[name=status]").click(function(){
            var status = $(this).val();
            $('.buHide').hide();

            if( status == "Returned" || status == "OAG") {
              $("#bu-status-form").show('slow');
            }
            
          });


          //jewelries
          $("[name=status]").click(function(){
            var status = $(this).val();
            $('.jewHide').hide();

            if( status == "Returned" || status == "OAG") {
              $("#jew-status-form").show('slow');
            }
            
          });

          //firearms
            $("[name=status]").click(function(){
            var status = $(this).val();
            $('.fireHide').hide();

            if( status == "Returned" || status == "OAG") {
              $("#fire-status-form").show('slow');
            }
            
          });

            //cash in hand
           $("[name=status]").click(function(){
            var status = $(this).val();
            $('.cashHide').hide();

            if( status == "Returned" || status == "OAG") {
              $("#cash-status-form").show('slow');
            }
            
          });

             //cash in bank
           $("[name=status]").click(function(){
            var status = $(this).val();
            $('.bankHide').hide();

            if( status == "Returned" || status == "OAG") {
              $("#bank-status-form").show('slow');
            }
            
          });

            $("[name=status]").click(function(){
            var status = $(this).val();
            $('.accHide').hide();

            if( status == "Returned" || status == "OAG") {
              $("#acc-status-form").show('slow');
            }
            
          });

          $("[name=status]").click(function(){
            var status = $(this).val();
            $('.shaHide').hide();

            if( status == "Returned" || status == "OAG") {
              $("#sha-status-form").show('slow');
            }
            
          });
         $("[name=status]").click(function(){
            var status = $(this).val();
            $('.emHide').hide();

            if( status == "Returned" || status == "OAG") {
              $("#em-status-form").show('slow');
            }
            
          });
         $("[name=status]").click(function(){
            var status = $(this).val();
            $('.docHide').hide();

            if( status == "Returned" || status == "OAG") {
              $("#doc-status-form").show('slow');
            }
            
          });
            $("[name=status]").click(function(){
            var status = $(this).val();
            $('.vmHide').hide();

            if( status == "Returned" || status == "OAG") {
              $("#vm-status-form").show('slow');
            }
            
          });

    });
    </script>
     
    
    <script>
    $(document).ready(function() {
        $('#dataTables-ele').DataTable({
                responsive: true
        });
         $('#dataTables-land').DataTable({
                responsive: true
        });
    });
    </script>

   
   
</body>

</html>
