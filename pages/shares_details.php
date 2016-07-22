<?php
require 'admin_role.php';

include('connection.php');
	
	if(isset($_GET['share_id']))
	{
		$id = $_GET['share_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM shares WHERE share_id =:uid');
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

			
		<div class="container">
		
		  <h3 align="center" class="page-header"> Shares and Stocks Details</h3>
			<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
	            <div class="row">
	                <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
	                <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
	                <div class="col-md-6 form-group">
	                    <label class="control-label col-md-4" for="name">Share Holder Name</label>
	                    <div class="col-md-8">
	                      <input type="text" class="form-control" name="name" value="<?php echo $name;?>" readonly ><br>
	                    </div>
	               
	                    
	               
	                    <label class="control-label col-md-4" for="no_of_shares">No of shares</label>
	                    <div class="col-md-8">
	                      <input type="text" class="form-control" name="no_of_shares" value="<?php echo $no_of_shares; ?>" readonly ><br> 
	                    </div>
	              
	                    <label class="control-label col-md-4" for="share_value"> Share Value </label>
	                    <div class="col-md-8">
	                      <input type="text" class="form-control" name="share_value"  value="<?php echo $share_value; ?>" readonly ><br>
	                    </div>
	              
	                    <label class="control-label col-md-4" for="company"> Issuing Company </label>
	                    <div class="col-md-8">
	                      <input type="text" class="form-control" name="company"  value="<?php echo $company; ?>" readonly ><br>
	                    </div>
                         <label class="control-label col-md-4" for="status">Status</label>
                            <div class="col-md-8">
                             <?php $stat = $status; ?>
                                <input type="radio" name="status" value="Under Custody" id="sce_hide" <?php if($stat == 'Under Custody') { ?> checked="checked" <?php } ?> disabled > Under Custody
                                <input type="radio" name="status" value="OAG" id="oag_show" <?php if($stat == 'OAG') { ?> checked="checked" <?php } ?> disabled > OAG
                                <input type="radio" name="status" value="Returned" id="sre_show" <?php if($stat == 'Returned') { ?> checked="checked" <?php } ?> disabled > Returned
                                
                                  

                                  <div class="status-form" id="status_returned_oag" <?php if($stat == 'Returned' || $stat == 'OAG' ) { }else{ ?> style="display: none;" <?php } ?> >
                                    
                                  <div class="input-group date" id="datetimepicker10">
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
                  
                        <div class="col-md-6 form-group">
                        <label class="control-label col-md-4" for="electronics_img"></label>
                            <div class="col-md-6">
                             <p><img src="user_images/<?php echo $userPic; ?>" height="200" width="200" data-action ="zoom"/></p>
                            </div>
                        </div>
                </div>
            </form>
            </div>
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../build/js/moment.min.js"></script>
    <script src="../build/js/bootstrap-datetimepicker.min.js"></script>


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

</body>
</html>