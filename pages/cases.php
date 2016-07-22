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
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM ims";
$result = $conn->query($sql);

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
<body style="background-color: #337AB7">

    <div id="wrapper">

         <nav class="navbar navbar-inverse" role="navigation" style="margin-bottom: 0">
       
            <div class="navbar-header" style="background: #337AB7">
               <h1 align="center">
                <img src="../images/header.png"> 
                </h1> 
                
            </div>
      
                
            <ul class="nav navbar-nav" style="padding: 0 0 0 10%">
                <li>
                    <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"> </i> Dashboard</a>
                </li>

                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cases <span class="caret"></span></a>
                            <ul class="dropdown-menu" >
                                <li>
                                    <a href="cases.php"> Registered Cases</a>
                                </li>
                                <li>
                                    <a href="ims.php"> Add New Cases</a>
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
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi, <?php echo $_SESSION['username']; ?> </a>
                              <ul class="dropdown-menu">
                                <li></li>
                                <li><a href="profile.php"><span class="glyphicon glyphicon-pencil"></span> Edit My Profile</a></li>
                                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                                
                              </ul>
                      </li>
                    </ul>
         
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 " >
                    <h2 class="page-header">Registered Cases</h2>
                </div>
                   
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12 " >
                   
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">#</th>
                                            <th>Case No.</th>
                                            <th>Investigator</th>
                                            <th>Suspect Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        $counter = 0;
    
                                    while($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td align="center"><?php echo ++$counter; ?></td>
                                          
                                            <td><?php echo $row["case_no"]; ?></td>
                                            <td><?php echo $row["investigator"]; ?></td>
                                            <td><?php echo $row["suspect"]; ?></td>
                                            <td>
                                           &nbsp;
                                            <a href="case_edit.php?id=<?php echo $row['id'] ?>" class='btn btn-success iframe'><i class="fa fa-pencil"></i> Edit</a>

                                           
                                            &nbsp;
                                            <a href="add.php?ims_id=<?php echo $row['id']; ?>" class='btn btn-primary'><span class="glyphicon glyphicon-plus"></span> Add Items</a>

                                            <a href="delete.php?id=<?php echo $row['id']; ?>" class='btn btn-danger'><span class="glyphicon glyphicon-trash"></span> Delete</a>

                                            </td>

                                                

                                        </tr>
                                        <?php
                                    }
                                }else
                                {
                                    echo "error";
                                }

                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        
                </div>
                <!-- /.col-lg-12 -->
            </div>
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
     <footer>
       <p style="color: #fff; text-align: center; padding-top: 10px">
                    Copyright © 2016 Office of the Anti-Corruption Commission, Thimphu, Post Box 1113, Phone: +975-2-334863/64/66/69 -Asset -337423, Fax: +975-2-334865
                    </p>
    </footer>


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

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
     
</body>

</html>