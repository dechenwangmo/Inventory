    <?php
    session_start();

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
    $ims_id = $_GET['ims_id'];

    $sql2 = "SELECT ims_id FROM seizure WHERE ims_id='$ims_id' LIMIT 1";

    $result2 = $conn->query($sql2);
    if (mysqli_fetch_assoc($result2)) {
        ?>
        <script type="text/javascript">
            window.location.href = "edit.php?ims_id=<?php echo $ims_id; ?>";
        </script>
    <?php
    } else {
        $sql = "SELECT case_no, investigator, suspect FROM ims WHERE id=$ims_id";
        $result = $conn->query($sql);
    }
    ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="description" content="Responsive tabbed layout component built with some CSS3 and JavaScript">

    <title>Admin Home</title>

    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link href="../build/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">

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

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <a href="#">
                                    <div>
                                        <strong>Dechen</strong>
                                        <span class="pull-right text-muted">
                                            <em>Yesterday</em>
                                        </span>
                                    </div>
                                    <div>ffffffsdadasdadad...</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <strong>Kezang</strong>
                                        <span class="pull-right text-muted">
                                            <em>Yesterday</em>
                                        </span>
                                    </div>
                                    <div>sdadadsadadsadsadsadsada...</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <strong>Ugyen</strong>
                                        <span class="pull-right text-muted">
                                            <em>Yesterday</em>
                                        </span>
                                    </div>
                                    <div>yyyyyyyyyyyyy...</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>Read All Messages</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <!--
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-alerts -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
    </nav>

    <div class="container" style="margin-top:50px;">
    <?php if(isset($_SESSION["message"])) { ?>
      <div class="col-md-12 alert alert-success">  
        <?php echo $_SESSION["message"]; ?> 
      </div> <?php
      } session_unset(); ?>
        <form class="form-horizontal" role="form" method="post" action="sinsert.php">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="control-label col-md-4" for="seized_ref_no">Seized Reference No.:</label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="seized_ref_no">
                    </div>
                  </div>
                  <?php

                    while($row = $result->fetch_assoc()) {
                                        ?>
                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4">Case No.:</label>
                    <div class="col-md-8"> 
                     <input type="text" class="form-control" name="case_no" value="<?php echo $row["case_no"]; ?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4">Place :</label>
                    <div class="col-md-8"> 
                      <select name="place" id="place" class="form-control select" >
                            <option>-------</option>
                            <option>Thimphu</option>
                            <option>Paro</option>
                            <option>Punakha</option>
                            <option>Wangdue Phodrang</option>
                            <option>Chukha</option>
                            <option>Samtse</option>
                            <option>Zhemgang</option>
                            <option>Trongsa</option>
                            <option>Sarpang</option>
                            <option>Gelephu</option>
                            <option>Tsirang</option>
                            <option>Samdrup Jongkhar</option>
                            <option>Trashigang</option>
                            <option>Tashiyangtse</option>
                            <option>Lhuentse</option>
                            <option>Bumthang</option>
                            <option>Haa</option>
                            <option>Gasa</option>
                            <option>Dagana</option>
                        </select>
                    </div>
                  </div>
                <div class="col-md-6 form-group">
                    <label class="control-label col-md-4">Date and Time:</label>
                    <div class="col-md-8"> 
                      <div class="input-group date" id="datetimepicker1">
                    <input type="text" class="form-control">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                    </div>
                  </div>
                 
                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4">Items seized from :</label>
                    <div class="col-md-8"> 
                      <input type="text" class="form-control" name="seized_from" value="<?php echo $row["suspect"]; ?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4">Investigator:</label>
                    <div class="col-md-8"> 
                       <input type="text" class="form-control" name="investigator" value="<?php echo $row["investigator"]; ?>" readonly>
                    </div>
                  </div>
                  <input type="hidden" value="<?php echo $ims_id; ?>" name="ims_id">
                  <?php
              }
              ?>
                                                        
                  <div class="col-md-6 form-group">
                    <label class="control-label col-md-4">Search Order:</label>
                    <div class="col-md-8"> 
                      <input type="radio" name="search_order" value="1" id="show"> Yes
                      <input type="radio" name="search_order" value="0" id="hide" > No
                      <div id="search_order_ref" style="display:none;">
                        <input type="text" class="form-control" name="search_order_ref" placeholder="Enter Search Order Reference">
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-12 form-group">
                    <label class="control-label col-md-2">Witness:</label>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="5" name="witness"></textarea>
                    </div>
                  </div>

                  <div class="form-group col-md-12">  
                    <div class="col-md-offset-2 col-md-10" align="center">
                      <button type="submit" class="btn btn-primary">Save</button>
                      <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                  </div>
            </div>
        </form>
    </div>

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
   
 <script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../build/js/jquery_kes.min.js"></script>
<script src="../build/js/moment.min.js"></script>
<script src="../build/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
            $('#datetimepicker2').datetimepicker({
            viewMode: 'years'
        });
        $('#datetimepicker3').datetimepicker({
            viewMode: 'years',
            format: 'MM/YYYY'
        });
        });
</script>

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
    </script>

</body>
</html>