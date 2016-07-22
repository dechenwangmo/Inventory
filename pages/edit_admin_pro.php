<?php
session_start();
error_reporting( ~E_NOTICE ); 

include('connection.php');

	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		$id = $_GET['id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM  profile_admin WHERE id =:uid');
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
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email_id = $_POST['email_id'];
			$contact_no = $_POST['contact_no'];
			$gender = $_POST['gender'];
			$designation = $_POST['designation'];

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
			if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE profile_admin 
									     SET fname=:ufname,
									     	 lname=:ulname,
									     	 email_id=:uemail_id,
									     	 contact_no=:ucontact_no,
									     	 gender=:ugender,
									     	 designation=:udesignation,
									     	 
									     	 userPic=:upic
									         WHERE id=:uid');

			$stmt->bindParam(':ufname', $fname);
			$stmt->bindParam(':ulname',$lname);
			$stmt->bindParam(':uemail_id',$email_id);
			$stmt->bindParam(':ucontact_no',$contact_no);
			$stmt->bindParam(':ugender',$gender);
			$stmt->bindParam(':udesignation',$designation);
			
		
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				$_SESSION["message"] = "Records updated successfully";
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
		<?php if(isset($_SESSION["message"])) { ?>
	      <div class="col-md-12 alert alert-success">  
	       <?php echo $_SESSION["message"]; ?> 
	      </div> <?php
	      } session_unset(); ?>
		  <h3 align="center"></h3> <br>
			<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                <div class="row">
               
                    <div class="col-md-6 form-group">
                        <label class="control-label col-md-4" for="fname">First Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>">
                        </div>

                        <br> <br> <br>
                        <label class="control-label col-md-4" for="material">Last Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>">
                        </div>
                   

                    </div>

                     <div class="col-md-6 form-group">
                        <label class="control-label col-md-4" for="email_id">Email Id</label>
                        <div class="col-md-6">
                          <textarea class="form-control" rows="5" name="email_id"><?php echo $email_id; ?></textarea> 
                        </div>
                    </div>

                   
                   
                    <div class="col-md-6 form-group">
                        <label class="control-label col-md-4" for="contact_no"> Contact Number</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="contact_no" value="<?php echo $contact_no; ?>">
                        </div>
                        </div>

                         <div class="col-md-6 form-group">
                        <label class="control-label col-md-4" for="gender"> Gender</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="gender" value="<?php echo $gender; ?>">
                        </div>
                        </div>

                         <div class="col-md-6 form-group">
                        <label class="control-label col-md-4" for="designation"> Designation</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="designation" value="<?php echo $designation; ?>">
                        </div>
                        <br> <br> <br>
                        <label class="control-label col-md-4" for="jew_img">Image</label>
	                    <div class="col-md-6">
	                     <p><img src="user_images/<?php echo $userPic; ?>" height="150" width="150" data-action="zoom" /></p>
        				<input class="input-group" type="file" name="user_image" accept="image/*" />
	                    </div>
                    </div>

                  <div class="col-md-12 form-group col-md-offset-3" align="center">
	                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
	                    <button type="reset" class="btn btn-default">Reset</button>
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

	<script type="text/javascript">
	        $(function () {
	            
	            $('#datetimepicker4').datetimepicker();

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