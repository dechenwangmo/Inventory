<?php
require 'admin_role.php';

include('connection.php');
	
	if(isset($_GET['email_id']))
	{
		$id = $_GET['email_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM emails WHERE email_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);

	}
	?>
<html>
<head>

    <script src="../colorbox/jquerykeswan.min.js"></script>
    <script src="../colorbox/jquery.colorbox.js"></script>
    <link href="../assets/css/zoom.css" rel="stylesheet">
    <script src="../assets/js/zoom.js"></script>


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

			
		<div class="container">
		
		  <h3 align="center" class="page-header"> Seized Email Item Details</h3>
			<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
	            <div class="row">
	                <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
	                <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
	                <div class="col-md-8 form-group">
	                    <label class="control-label col-md-4" for="email_add">Email Address</label>
	                    <div class="col-md-6">
	                      <input type="text" class="form-control" name="email_add" value="<?php echo $email_add;?>" readonly ><br>
	                    </div>
    	               
	                    <label class="control-label col-md-4" for="pwd">Password</label>
	                    <div class="col-md-6">
	                      <input type="text" class="form-control" name="pwd" value="<?php echo $pwd;?>" readonly ><br>
	                    </div>
	                
	                    <label class="control-label col-md-4" for="re_pwd"> Reset Password </label>
	                    <div class="col-md-6">
	                      <input type="text" class="form-control" name="re_pwd"  value="<?php echo $re_pwd; ?>" readonly ><br>
	                    </div>
	                
                     <label class="control-label col-md-4" for="status">Status</label>
                            <div class="col-md-6">
                             <?php $stat = $status; ?>
                                <input type="radio" name="status" value="Under Custody" id="sce_hide" <?php if($stat == 'Under Custody') { ?> checked="checked" <?php } ?> disabled > Under Custody
                                <input type="radio" name="status" value="OAG" id="oag_show" <?php if($stat == 'OAG') { ?> checked="checked" <?php } ?> disabled > OAG
                                <input type="radio" name="status" value="Returned" id="sre_show" <?php if($stat == 'Returned') { ?> checked="checked" <?php } ?> disabled > Returned
                                                          
                                <div class="status-form" id="status_returned_oag" <?php if($stat == 'Returned' || $stat == 'OAG' ) { }else{ ?> style="display: none;" <?php } ?> >
                                    
                                    <div class="input-group date" id="datetimepicker11">
                                      <input type="text" class="form-control" name="date_time" value="<?php echo $date_time; ?>" readonly>
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    <br>
                                    <input type="text" class="form-control" name="to_whom" placeholder="to_whom" value="<?php echo $to_whom; ?>" readonly ><br>
                                    <input type="text" class="form-control" name="by_whom" placeholder="by_whom" value="<?php echo $by_whom; ?>" readonly ><br>
                                    <input type="text" class="form-control" name="witness" placeholder="witness" value="<?php echo $witness; ?>" readonly ><br>
                                </div>

                                  
                                  
                            </div>
                    </div>

	                
	                	<div class="col-md-4 form-group">
	                    
	                    <div class="col-md-4">
	                     <p><img src="user_images/<?php echo $userPic; ?>" height="200" width="200" data-action="zoom" /></p>
        				</div>
	          
            </form>
            </div>
	

<script >
$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });

  	$("[name=status]").click(function(){
        var status = $(this).val();
        $('.status-form').hide();

        if(status == "Returned" || status == "OAG") {
        	$("#status_returned_oag").show('slow');
        } else if(status == "Auctioned") {
        	$("#status_auctioned").show('slow');
        }
    });

});
</script>

</script>

</body>
</html>