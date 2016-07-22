<?php
require 'admin_role.php';

include('connection.php');

	if(isset($_GET['cash_id'])) 
	
	{
		$id = $_GET['cash_id'];
		$stmt_edit = $DB_con->prepare('SELECT  * FROM cash WHERE cash_id = :uid' );

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
		
		
		  <h3 align="center" class="page-header"> Cash In Hand Details </h3>
			<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
	            
	            <div class="row">
	                <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
	                <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
	                <input type="hidden" value="<?php echo $cash_id; ?>" name="cash_id">

	                <div class="col-md-6 form-group">
                    <label class="control-label col-md-4" for="cash_amount">Cash Amount</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="cash_amount" value="<?php echo $edit_row["cash_amount"];?>" readonly <br><br>
                    </div>
                
                    <label class="control-label col-md-4" for="currency">Currency</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="currency" value="<?php echo $currency;?>" readonly <br><br>
                    </div>
              
                    <label class="control-label col-md-4" for="description">Description</label>
                    <div class="col-md-8">
                    <textarea class="form-control" name="description" readonly>  <?php echo $description ?> </textarea> <br>
                      
                    </div>
               
                    <label class="control-label col-md-4" for="location">Location</label>
                    <div class="col-md-8">
                    <textarea class="form-control" name="cash_location"  readonly ><?php echo $cash_location; ?></textarea> 
                      
                    </div>
                
	                        <label class="control-label col-md-4" for="status">Status</label>
	                        <div class="col-md-8">
	                         <?php $stat = $status; ?>
								<input type="radio" name="status" value="Under Custody" id="sce_hide" <?php if($stat == 'Under Custody') { ?> checked="checked" <?php } ?> disabled> Under Custody
								<input type="radio" name="status" value="OAG" id="oag_show" <?php if($stat == 'OAG') { ?> checked="checked" <?php } ?>   disabled > OAG
								<input type="radio" name="status" value="Returned" id="sre_show" <?php if($stat == 'Returned') { ?> checked="checked" <?php } ?>  disabled> Returned
                           		
	                              

	                              <div class="status-form" id="status_returned_oag" <?php if($stat == 'Returned' || $stat == 'OAG' ) { }else{ ?> style="display: none;" <?php } ?> >
	                              	<div class="input-group date" id="datetimepicker7">
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

               
	                <div class="col-md-6 form-group">
	                    <label class="control-label col-md-4" for="electronics_img"></label>
    	                    <div class="col-md-8">
    	                     <p><img src="user_images/<?php echo $userPic; ?>" height="200" width="200" data-action="zoom"/></p>
    	                     
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