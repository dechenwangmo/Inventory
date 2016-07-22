<?php
require 'admin_role.php';

include('connection.php');
	
	if(isset($_GET['bank_id']))
	{
		$id = $_GET['bank_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM bank WHERE bank_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);

	}
	?>
<html>
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
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>

    <link href="../assets/css/zoom.css" rel="stylesheet">
    <script src="../assets/js/zoom.js"></script>
    <link href="../build/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">

    
</head>

<body>

			
		<div class="container">
		
		  <h3 align="center" class="page-header"> Cash In Bank Details</h3>
			<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
	            <div class="row">
	                <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
	                <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
	                <div class="col-md-8 form-group">
	                    <label class="control-label col-md-4" for="bank_name">Type</label>
	                    <div class="col-md-6">
	                      <input type="text" class="form-control" name="bank_name" value="<?php echo $bank_name;?>" readonly ><br>
	                    </div>
	               
	                    <label class="control-label col-md-4" for="acc_no">Account No</label>
	                    <div class="col-md-6">
	                      <input type="text" class="form-control" name="acc_no" value="<?php echo $acc_no; ?>" readonly ><br> 
	                    </div>
	                
	                    <label class="control-label col-md-4" for="acc_holder_name">Account Holder Name</label>
	                    <div class="col-md-6">
	                      <input type="text" class="form-control" name="acc_holder_name" value="<?php echo $acc_holder_name;?>" readonly ><br>
	                    </div>
	                
	                    <label class="control-label col-md-4" for="tot_amt"> Total Amount </label>
	                    <div class="col-md-6">
	                      <input type="text" class="form-control" name="tot_amt"  value="<?php echo $tot_amt; ?>" readonly ><br>
	                    </div>
	               
	                    <label class="control-label col-md-4" for="b_add">Bank Address</label>
	                    <div class="col-md-6">
	                      <input type="text" class="form-control" name="b_add"  value="<?php echo $b_add; ?>" readonly ><br>
	                    </div>
	             
	                        <label class="control-label col-md-4" for="status">Status</label>
	                        <div class="col-md-6">
	                         <?php $stat = $status; ?>
	                              <input type="radio" name="status" value="Under Custody" id="sce_hide" <?php if($stat == 'Under Custody') { ?> checked="checked" <?php } ?> disabled> Under Custody
	                              <input type="radio" name="status" value="OAG" id="oag_show" <?php if($stat == 'OAG') { ?> checked="checked" <?php } ?> disabled> OAG
	                              <input type="radio" name="status" value="Returned" id="sre_show" <?php if($stat == 'Returned') { ?> checked="checked" <?php } ?> disabled> Returned
	                              
	                              <div id="statuse" <?php if($stat == 'Under Custody') { ?> style="display:none;" <?php } ?> >
	                                
	                              		<div class="input-group date" id="datetimepicker8">
                                      <input type="text" class="form-control" name="date_time" value="<?php echo $date_time; ?>" readonly>
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                	</div>
	                                <br>
	                                <input type="text" class="form-control" name="to_whom" placeholder="to_whom" value="<?php echo $to_whom; ?>" readonly><br>
	                                <input type="text" class="form-control" name="by_whom" placeholder="by_whom" value="<?php echo $by_whom; ?>" readonly><br>
	                                <input type="text" class="form-control" name="witness" placeholder="witness" value="<?php echo $witness; ?>" readonly><br>
	                              </div>

	                              
	                        </div>
	                </div>
	                
	                <div class="col-md-4 form-group">
	                    <div class="col-md-4">
	                     <p><img src="user_images/<?php echo $userPic; ?>" height="200" width="200" data-action="zoom"/></p>
        				</div>
	                </div>
	                
	            </div>
            </form>
        </div>
	

<script >
$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
    $("#sce_hide").click(function(){
        $("#statuse").slideUp();
    });
    $("#sre_show").click(function(){
        $("#statuse").slideDown();
    });
     $("#oag_show").click(function(){
        $("#statuse").slideDown();
    });
});
</script>

</body>
</html>