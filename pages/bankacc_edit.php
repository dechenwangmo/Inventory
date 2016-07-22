<?php
require 'admin_role.php';
error_reporting( ~E_NOTICE ); 

include('connection.php');

	if(isset($_GET['acc_id']) && !empty($_GET['acc_id']))
	{
		$id = $_GET['acc_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM bankacc WHERE acc_id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		//header("Location: index.php");
	}
	
	if(isset($_POST['submit']))
	{
			
			$bank_name=$_POST['bank_name'];
			$acc_holder_name=$_POST['acc_holder_name'];
			$acc_no=$_POST['acc_no'];
			$address=$_POST['address'];
			$tot_amt=$_POST['tot_amt'];
			$status=$_POST['status'];
			if($status == 'Returned' || $status == 'OAG') {
				$date_time = $_POST['date_time'];
				$to_whom = $_POST['to_whom'];
				$by_whom = $_POST['by_whom'];
				$witness = $_POST['witness'];
				

			} else { // when status is under custody
				$date_time = null;
				$to_whom = null;
				$by_whom = null;
				$witness = null;
				
			}
			
			$seizure_id=$_POST['seizure_id'];
			
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = 'user_images/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['userPic']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $edit_row['userPic']; // old image from database
		}		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE bankacc 
									     SET 
										     bank_name=:ubank_name,
										     acc_holder_name=:uacc_holder_name, 
										     acc_no=:uacc_no,
										     address=:uaddress,
										     tot_amt=:utot_amt,
										     status=:ustatus,
										     date_time=:udate_time, 
										     to_whom=:uto_whom, 
										     by_whom=:uby_whom,
										     witness=:uwitness,
										     userPic=:upic 
								       WHERE acc_id=:uid');
			
			$stmt->bindParam(':ubank_name',$bank_name);
			$stmt->bindParam(':uacc_holder_name',$acc_holder_name);
			$stmt->bindParam(':uacc_no',$acc_no);
			$stmt->bindParam(':uaddress',$address);
			$stmt->bindParam(':utot_amt',$tot_amt);
			$stmt->bindParam(':ustatus',$status);
			$stmt->bindParam(':udate_time',$date_time);
			$stmt->bindParam(':uto_whom',$to_whom);
			$stmt->bindParam(':uby_whom',$by_whom);
			$stmt->bindParam(':uwitness',$witness);
		
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				$_SESSION["message"] = "Records updated successfully";
				?>
                
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
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
		<?php
              if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Success!</strong> <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
                </div>
              <?php } ?>
		
		  <h3 align="center" class="page-header">Edit Bank Account Details</h3>
			<form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
	            <?php
					if(isset($errMSG)){
						?>
				        <div class="alert alert-danger">
				          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
				        </div>
				        <?php
					}
					 ?>
	            	<div class="row">
	                <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
	                <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
	                <div class="col-md-8 form-group">
	                    <label class="control-label col-md-4" for="bank_name">Bank Name</label>
	                    <div class="col-md-6">
	                      <input type="text" class="form-control" name="bank_name" value="<?php echo $bank_name; ?>"> <br>
	                    </div>
	                
	                    <label class="control-label col-md-4" for="acc_holder_name">Account Holder Name</label>
	                    <div class="col-md-6">
	                     <input type="text" class="form-control" name="acc_holder_name" value="<?php echo $acc_holder_name; ?>"> <br>
	                    </div>
	                
	                    <label class="control-label col-md-4" for="acc_no">Account No </label>
	                    <div class="col-md-6">
	                      <input type="text" class="form-control" name="acc_no"  value="<?php echo $acc_no; ?>"> <br>
	                    </div>
	                
	                    <label class="control-label col-md-4" for="address"> Bank Address</label>
	                    <div class="col-md-6">
	                      <input type="text" class="form-control" name="address"  value="<?php echo $address; ?>"> <br>
	                    </div>
	               
	                    <label class="control-label col-md-4" for="tot_amt"> Total Amount</label>
	                    <div class="col-md-6">
	                      <input type="text" class="form-control" name="tot_amt"  value="<?php echo $tot_amt; ?>"> <br>
	                    </div>
	               
	                        <label class="control-label col-md-4" for="status">Status</label>
	                        <div class="col-md-6">
	                         <?php $stat = $status; ?>
								<input type="radio" name="status" value="Under Custody" id="sce_hide" <?php if($stat == 'Under Custody') { ?> checked="checked" <?php } ?> > Under Custody
								<input type="radio" name="status" value="OAG" id="oag_show" <?php if($stat == 'OAG') { ?> checked="checked" <?php } ?> > OAG
								<input type="radio" name="status" value="Returned" id="sre_show" <?php if($stat == 'Returned') { ?> checked="checked" <?php } ?> > Returned
                           		
	                                <div class="status-form" id="status_returned_oag" <?php if($stat == 'Returned' || $stat == 'OAG' ) { }else{ ?> style="display: none;" <?php } ?> >
	                              	
	                               		<div class="input-group date" id="datetimepicker9">
                                      <input type="text" class="form-control" name="date_time" value="<?php echo $date_time; ?>">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                	</div>
	                              	<br>
	                                <input type="text" class="form-control" name="to_whom" placeholder="to_whom" value="<?php echo $to_whom; ?>"><br>
	                                <input type="text" class="form-control" name="by_whom" placeholder="by_whom" value="<?php echo $by_whom; ?>"><br>
	                                <input type="text" class="form-control" name="witness" placeholder="witness" value="<?php echo $witness; ?>"><br>
	                              </div>

	                              
	                              
	                        </div>
	                </div>
	             
	               
	                <div class="col-md-4 form-group">
	                    <div class="col-md-4">
	                     <p><img src="user_images/<?php echo $userPic; ?>" height="200" width="200"  data-action="zoom"/></p>
        				<input class="input-group" type="file" name="user_image" accept="image/*" />
	                    </div>
	                </div>
	               

	                <div class="col-md-12 form-group col-md-offset-4" align="center">
	                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
	                    <button type="reset" class="btn btn-default">Reset</button>
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

	<script type="text/javascript">
	        $(function () {
	         
	            $('#datetimepicker9').datetimepicker();

	        });
	</script>  

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
        } 
    });

});
</script>

</body>
</html>