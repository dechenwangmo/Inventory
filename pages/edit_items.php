<?php
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- primary: Respond.js doesn't work if you view the page via file:// -->
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
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-home"></i></a>
            </div>
</nav>
    
    <div class="tab-content">
    <?php
    if(isset($_GET['elec_id']))
        {
        $elec_id=$_GET['elec_id'];
        if(isset($_POST['submit']))
        {
        $type=$_POST['type'];
        $model=$_POST['model'];
        $manufacturer=$_POST['manufacturer'];
        $serial_no=$_POST['serial_no'];
        $capacity=$_POST['capacity'];
        $location=$_POST['location'];
        $status=$_POST['status'];
        $seizure_id=$_POST['seizure_id'];

        $query3=mysql_query("UPDATE electronics SET type='$type', model='$model',manufacturer='$manufacturer', serial_no='$serial_no',location='$location', status='$status' WHERE elec_id=$elec_id");
        if($query3)
        {
        header('location:edit.php?seizure_id=$seizure_id');
        }

        }
        $query1=mysql_query("SELECT * FROM electronics WHERE elec_id=$elec_id");
        $query2=mysql_fetch_array($query1);
        ?>

        <div id="electronics" class="tab-pane fade in active">
        <h3></h3>

        <form class="form-horizontal" role="form" method="post" action="eleinsert.php" enctype="multipart/form-data">
            <div class="row">
                <input type="hidden" value="<?php echo $seizure_id; ?>" name="seizure_id">
                <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="type">Type</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="type" value="<?php echo $query2['type']; ?>">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="model">Model</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="model" value="<?php echo $query2['model']; ?>">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="manufacturer">Manufacturer</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="manufacturer" value="<?php echo $query2['manufacturer']; ?>">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="serial_no">Serial No.</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="serial_no" value="<?php echo $query2['serial_no']; ?>">
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="capacity">Capacity</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="capacity" value="<?php echo $query2['capacity']; ?>" >
                    </div>
                </div>

                 <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="location">Storage Location</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="location" value="<?php echo $query2['location']; ?>">
                    </div>
                </div>

                 <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="electronics_status">Status</label>
                    <div class="col-md-8">
                        <select name="status" id="electronics_status" class="form-control select" value="<?php echo $query2['status']; ?>">
                            <option>-----</option>
                            <option>Under Custody</option>
                            <option>Returned</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label class="control-label col-md-2" for="electronics_img">Image</label>
                    <div class="col-md-8">
                      <input type="file" class="form-control" name="electronics_img" accept="image/*">
                    </div>
                </div>

                <div class="col-md-12 form-group col-md-offset-3" align="center">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </div>
            </form>

        </div> 
        <?php
}


?>

       
       
       
    </div>
</div>
     
    <!-- /#wrapper -->

    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

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

/*
    $('#dataTables-example').DataTable({
                responsive: true
        });
        $("#land_hide").click(function(){
            $("#freeze_order_ref").slideUp();
        });
        $("#land_show").click(function(){
            $("#freeze_order_ref").slideDown();
        });
    });*/
    </script>

      <script type="text/javascript" src="http://ajax.googleapis.com/
        ajax/libs/jquery/1.5/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function()
        {
        $(".edit_tr").click(function()
        {
        var ID=$(this).attr('id');
        $("#first_"+ID).hide();
        $("#last_"+ID).hide();
        $("#first_input_"+ID).show();
        $("#last_input_"+ID).show();
        }).change(function()
        {
        var ID=$(this).attr('id');
        var first=$("#first_input_"+ID).val();
        var last=$("#last_input_"+ID).val();
        var dataString = 'id='+ ID +'&firstname='+first+'&lastname='+last;
        $("#first_"+ID).html('<img src="load.gif" />'); // Loading image

        if(first.length>0&& last.length>0)
        {

        $.ajax({
        type: "POST",
        url: "table_edit_ajax.php",
        data: dataString,
        cache: false,
        success: function(html)
        {
        $("#first_"+ID).html(first);
        $("#last_"+ID).html(last);
        }
        });
        }
        else
        {
        alert('Enter something.');
        }

        });

        // Edit input box click action
        $(".editbox").mouseup(function() 
        {
        return false
        });

        // Outside click action
        $(document).mouseup(function()
        {
        $(".editbox").hide();
        $(".text").show();
        });

        });
        </script>
    
</body>

</html>
