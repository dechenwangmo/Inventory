<?php
require 'admin_role.php';
error_reporting( ~E_NOTICE ); 

include('connection.php');

	if(isset($_GET['others_id']) && !empty($_GET['others_id']))
	{
		$id = $_GET['others_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM others WHERE others_id =:uid');
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
			
		$type =  $_POST['type'];
		$name = $_POST['name'];
		$description = $_POST['description'];
		$quantity = $_POST['quantity'];
		$com = $_POST['com'];
		$place_of_auc = $_POST['place_of_auc'];
		$tot_amt = $_POST['tot_amt'];
		$bid_win = $_POST['bid_win'];
		$seizure_id = $_POST['seizure_id'];
		$ims_id = $_POST['ims_id'];
		$status=$_POST['status'];
		if($status == 'Returned' || $status == 'OAG') {
			$date_time = $_POST['date_time'];
			$to_whom = $_POST['to_whom'];
			$by_whom = $_POST['by_whom'];
			$witness = $_POST['witness'];
			$date_time2 = null;
			$com = null;
			$place_of_auc = null;
			$tot_amt = null;
			$bid_win = null;

		} elseif ($status == 'Auctioned') {
			$date_time2 = $_POST['date_time2'];
			$com = $_POST['com'];
			$place_of_auc = $_POST['place_of_auc'];
			$tot_amt = $_POST['tot_amt'];
			$bid_win = $_POST['bid_win'];
			$date_time = null;
			$to_whom = null;
			$by_whom = null;
			$witness = null;
		} else { // when status is under custody
			$date_time = null;
			$date_time2 = null;
			$to_whom = null;
			$by_whom = null;
			$witness = null;
			$com = null;
			$place_of_auc = null;
			$tot_amt = null;
			$bid_win = null;
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
			$stmt = $DB_con->prepare('UPDATE others 
									     SET 
										     type=:utype,
										     name=:uname, 
										     description=:udescription,
										     quantity=:uquantity,
										     com =:ucom,
										     place_of_auc =:uplace_of_auc,
										     tot_amt =:utot_amt,
										     bid_win =:ubid_win,
										     status=:ustatus,
										     date_time=:udate_time,
										     date_time2=:udate_time2,
										     to_whom=:uto_whom, 
										     by_whom=:uby_whom,
										     witness=:uwitness,
										     userPic=:upic 
								       WHERE others_id=:uid');
			
			$stmt->bindParam(':utype',$type);
			$stmt->bindParam(':uname',$name);
			$stmt->bindParam(':udescription',$description);
			$stmt->bindParam(':uquantity',$quantity);
			$stmt->bindParam(':ucom',$com);
			$stmt->bindParam(':uplace_of_auc',$place_of_auc);
			$stmt->bindParam(':utot_amt',$tot_amt);
			$stmt->bindParam(':ubid_win',$bid_win);
		    $stmt->bindParam(':ustatus',$status);
			$stmt->bindParam(':udate_time',$date_time);
			$stmt->bindParam(':udate_time2',$date_time2);
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
   <h3 align="center" class="page-header">Edit Other Items</h3>
    <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
    <div class="row">
        <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
        <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id"  >

        <div class="col-md-6 form-group">
            <label class="control-label col-md-4" for="type">Type</label>
              <div class="col-md-8">
              <input type="text" class="form-control" name="type" value="<?php echo $type;?>"  ><br>
              </div>

            <label class="control-label col-md-4" for="name">Name</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="name" value="<?php echo $name;?>"  ><br>
                    </div>
            <label class="control-label col-md-4" for="description">Description</label>
                    <div class="col-md-8">
                    <textarea class="form-control" name="description" >  <?php echo $description ?> </textarea> <br>
                      
                    </div>
           <label class="control-label col-md-4" for="quantity">Quantity</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="quantity" value="<?php echo $quantity;?>"  ><br><br>
                    </div>

          
        
        <label class="control-label col-md-4" for="status">Status</label>
            <div class="col-md-8">
            <?php $stat = $status; ?>
             <input type="radio" name="status" value="Under Custody" id="sce_hide" <?php if($stat == 'Under Custody') { ?> checked="checked" <?php } ?>  > Under Custody
            <input type="radio" name="status" value="OAG" id="oag_show" <?php if($stat == 'OAG') { ?> checked="checked" <?php } ?>  > OAG
            <input type="radio" name="status" value="Returned" id="sre_show" <?php if($stat == 'Returned') { ?> checked="checked" <?php } ?>  > Returned
            <input type="radio" name="status" value="Auctioned" id="sra_show" <?php if($stat == 'Auctioned') { ?> checked="checked" <?php } ?> > Auctioned

                <div class="status-form" id="status_returned_oag" <?php if($stat == 'Returned' || $stat == 'OAG' ) { }else{ ?> style="display: none;" <?php } ?> >
                     <div class="input-group date" id="datetimepicker14">
                            <input type="text" class="form-control" name="date_time" value="<?php echo $date_time; ?>" > <br>
                             <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div> <br>

                    <input type="text" class="form-control" name="to_whom" placeholder="to_whom" value="<?php echo $to_whom; ?>"  ><br>
                     <input type="text" class="form-control" name="by_whom" placeholder="by_whom" value="<?php echo $by_whom; ?>"  ><br>
                    <input type="text" class="form-control" name="witness" placeholder="witness" value="<?php echo $witness; ?>"  ><br>
                </div>
                <div class="status-form" id="status_auctioned" <?php if($stat == 'Auctioned') { }else{ ?> style="display: none;" <?php } ?> >
                  <div class="input-group date" id="datetimepicker15">
                      <input type="text" class="form-control" name="date_time2" value="<?php echo $date_time2; ?>" > <br>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>
                   <input type="text" class="form-control" name="com" placeholder="committee" value="<?php echo $com; ?>"  ><br>
                    <input type="text" class="form-control" name="place_of_auc" placeholder="place of auction" value="<?php echo $place_of_auc; ?>"   ><br>
                    <input type="text" class="form-control" name="tot_amt" placeholder="total amount" value="<?php echo $tot_amt; ?>"  ><br>
                     <input type="text" class="form-control" name="bid_win" placeholder="bid winner" value="<?php echo $bid_win; ?>"  ><br>
                </div>
            </div>
           
   
    </div>
                    
    <div class="row" style="padding-top:6% ">
    <div class="col-md-6 form-group">
    <label class="control-label col-md-4" for="electronics_img">Image</label>
                <div class="col-md-8">
                       <p><img src="user_images/<?php echo $userPic; ?>" height="200" width="200" data-action="zoom" /></p>
                         <input class="input-group" type="file" name="user_image" accept="image/*" />
                </div>
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
	         
	            $('#datetimepicker14').datetimepicker();
	            $('#datetimepicker15').datetimepicker();

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
        } else if(status == "Auctioned") {
        	$("#status_auctioned").show('slow');
        }
    });

});
</script>

</body>
</html>