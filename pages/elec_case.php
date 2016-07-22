<?php
require 'admin_role.php';
error_reporting( ~E_NOTICE ); 

include('connection.php');

	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		$id = $_GET['id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM ims WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		//header("Location: index.php");
	}
	
	if(isset($_POST['add']))
	{
			$case_no=$_POST['case_no'];
			$investigator=$_POST['investigator'];
			$suspect=$_POST['suspect'];
			
			
		
					
		
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE ims 
									     SET case_no=:ucase_no, 
										     investigator=:uinvestigator,
										     suspect=:ususpect, 
										      
								       WHERE id=:uid');
			$stmt->bindParam(':ucase_no',$case_no);
			$stmt->bindParam(':uinvestigator',$investigator);
			$stmt->bindParam(':ususpect',$suspect);
			
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
		
		  <h3 align="center">Edit Case Items</h3> <br>
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
	           
	               
            <div class="row" style="padding: 0 25% 0 10%">      
                <div class="col-lg-8" style="float: right;">
                   
                        <label>Case No.</label>
                        <input type="text" class="form-control" name="case_no" value="<?php echo $case_no; ?>">
                    </div>
                    
                     <div class="form-group">
                                <label>Investigator</label>
                                <input type="text" class="form-control" name="investigator" value="<?php echo $investigator; ?>">
                     </div> 

                    <div class="form-group">
                                <label>Suspect</label>
                               <input type="text" class="form-control" name="suspect" value="<?php echo $suspect; ?>">
                    </div> 
                                             
                </div>
            </div>
             <div class="row">
                    <br>

                    <div class="form-group" align="center">                         
                        <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-ok">&nbsp;</span>Add</button>
                         &nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove">&nbsp;</span>Reset</button>
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

	
</body>
</html>