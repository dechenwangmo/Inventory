<?php
    // check if logged in and admin
    require 'login_check.php';

    include('connection.php');
    $id = $_SESSION['user_id'];
    $stmt_edit = $DB_con->prepare('SELECT * FROM users WHERE id =:uid');
    $stmt_edit->execute(array(':uid'=>$id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
  
 if(isset($_POST['submit']))
  { 
  
      $name=$_POST['name'];
      $designation=$_POST['designation'];
      $phone=$_POST['phone'];
      $email=$_POST['email'];
      
      $imgFile = $_FILES['user_image']['name'];
      $tmp_dir = $_FILES['user_image']['tmp_name'];
      $imgSize = $_FILES['user_image']['size'];
            
      if($imgFile)
      {
        $upload_dir = 'profile/'; // upload directory 
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
        $stmt = $DB_con->prepare('UPDATE users 
                         SET name=:uname, 
                           designation=:udesignation,
                           phone=:uphone, 
                           email=:uemail,
                           userPic=:upic 
                         WHERE id=:uid');
        $stmt->bindParam(':uname',$name);
        $stmt->bindParam(':udesignation',$designation);
        $stmt->bindParam(':uphone',$phone);
        $stmt->bindParam(':uemail',$email);
        $stmt->bindParam(':upic',$userpic);
        $stmt->bindParam(':uid',$id);
          
        if($stmt->execute()){
          echo "Profile Updated Successfully";
          header('Location: ' . $_SERVER["HTTP_REFERER"] );
        }
        else{
          $errMSG = "Sorry Data Could Not Updated !";
          echo $errMSG;
        }
      
      }
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

<body style="background-color: #337AB7">

    <div id="wrapper" >

        <!-- Menu -->
        <?php include('menu.php'); ?>
        <!-- .menu -->
            
        <div id="page-wrapper" style="">
          <div class="container">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
                <li><a data-toggle="tab" href="#password">Change Password</a></li>
              </ul>
            <div class="tab-content">

              <div id="profile" class="tab-pane fade in active">
              
                 <form class="" role="form" action="" method="POST" enctype="multipart/form-data">
                 <br>
                  <div class="row" style="padding: 0 25% 0 10%">      
                      <div class="col-lg-8" style="float: left;">
                          
                           <div class="form-group">
                              <label>Name:</label>
                              <input type="text" class="form-control" name="name"  value="<?php echo $edit_row['name']; ?>"/>
                          </div>

                          <div class="form-group">
                              <label>Username:</label>
                              <input type="text" class="form-control" name="username" value="<?php echo $edit_row['username']; ?>" disabled/>
                          </div>

                          <div class="form-group">
                              <label>Designation:</label>
                              <input type="text" class="form-control" name="designation" value="<?php echo $edit_row['designation']; ?>" />
                          </div>

                          <div class="form-group">
                              <label>Contact #:</label>
                              <input type="text" class="form-control" name="phone" value="<?php echo $edit_row['phone']; ?>" />
                          </div>

                          <div class="form-group">
                              <label>Email Address:</label>
                              <input type="text" class="form-control" name="email" value="<?php echo $edit_row['email']; ?>" />
                          </div>
                          
                           
                                                   
                      </div>
                      <div class="col-lg-4" style="float: right; border: 1px">
                        <div class="form-group">
                              <label></label>
                               <p><img src="profile/<?php echo $edit_row['userPic']; ?>" height="150" width="150" /></p>
                              <input class="input-group" type="file" name="user_image" accept="image/*" value="">
                          </div>
                      </div>

                  </div>

                   <div class="row">
                          <br>

                          <div class="col-lg-8" align="center">                         
                              <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok">&nbsp;</span>Update</button>
                               &nbsp;&nbsp;&nbsp;
                              <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove">&nbsp;</span>Cancel</button>
                          </div>
                     
                      </div>
               
              </form>
              </div>

              <div id="password" class="tab-pane fade">
              <br>
                    <form role="form" action="change_password.php" method="POST" name="form1" id="form1" onsubmit="return checkForm(this);">
                        <div class="row" style="padding: 0 25% 0 10%">      
                            <div class="col-lg-8" style="float: left;">
                                <div class="form-group">
                                    <label>Current Password:</label>
                                    <input type="password" class="form-control" name="password" value="<?php echo $edit_row['password']; ?>" disabled/>
                                </div>

                                <div class="form-group">
                                    <label>New Password:</label>
                                    <input type="password" class="form-control" name="password_new" />
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password:</label>
                                    <input type="password" class="form-control" name="password_confirm" />
                                </div>

                               


                                <div class="form-group" align="center">                         
                                    <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok">&nbsp;</span>Change Password</button>
                                     &nbsp;&nbsp;&nbsp;
                                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove">&nbsp;</span>Cancel</button>
                                </div>


                          </div>
             
                        </div>
                      </form>
              </div>

            </div>
          </div>
        </div> <!-- end-page-wrapper -->
    </div> <!-- end-wrapper -->
   

    <footer>
        <p style="color: #fff; text-align: center; padding-top: 10px">
        Copyright © 2016 Office of the Anti-Corruption Commission, Thimphu, Post Box 1113, Phone: +975-2-334863/64/66/69 -Asset -337423, Fax: +975-2-334865
        </p>
    </footer>
    <!--Charts -->
    <script type="text/javascript" src="../js/loader.js"></script>

    <script type="text/javascript">
      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table. --> first chart
      
        // Create the data table. --> second chart
        var data1 = new google.visualization.DataTable();
        data1.addColumn('string', 'Topping');
        data1.addColumn('number', 'Slices');
        data1.addRows([
          ['Under Custody', <?php echo $Total_Under_Custoty ; ?> ],
          ['OAG', <?php echo $Total_OAG;?>],
          ['Return', <?php echo $Total_Returned; ?>],
          ['Auctioned', <?php echo $Total_Auctioned; ?>]
         

        ]);

        // Set chart options
        var options1 = {'title':'',
                        'legend':'bottom',
                         pieHole: 0.4,
                         width: 550,
                         height: 400,
                       };
       
        var chart1 = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart1.draw(data1, options1);

        

        var data = google.visualization.arrayToDataTable([
        ['Items', 'No. of Seized Items', { role: "style" } ],
        ['Electronics', <?php echo $Total_ele ; ?>, "#247DA9"],
        ['Land', <?php echo $Total_land;?>, "#CC6764"],
        ['Buildings', <?php echo $Total_build ; ?>, "#F4B400"],
        ['Jewelries', <?php echo $Total_jew;?>, "#3E8A42"],
        ['Firearms', <?php echo $Total_firearms ; ?>,"#7A5D9C"],
        ['Cash in hand', <?php echo $Total_cash;?>, "#CCC"],
        ['Cash in Bank', <?php echo $Total_bank ; ?>,"#2E86E4"],
        ['Bank Accounts', <?php echo $Total_acc;?>, "#D89CBD"],
        ['Shares and Stocks', <?php echo $Total_share ; ?>, "#52A09A"],
        ['Emails', <?php echo $Total_email;?>,"#EC3939"],
        ['Documents', <?php echo $Total_doc ; ?>, "#EAEF3D"],
        ['Vehicles and Machineries', <?php echo $Total_Vehicles_Machineries;?>, "#524D4D"],
        ['Others', <?php echo $Total_other ;?>, "#20B5C5"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "",
        width: 1150,
        height: 400,
        bar: {groupWidth: "80%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
      }
    </script> <!--end of chart scripts -->



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
    });
    </script>

    <!-- dropdown hover-->
    <script src="../dist/js/jquery.bootstrap-dropdown-hover.js"></script>

    <script>
      //$('[data-toggle="dropdown"]').bootstrapDropdownHover();
      $.fn.bootstrapDropdownHover();
      //$('#dropdownMenu1').bootstrapDropdownHover();
      //$('.navbar [data-toggle="dropdown"]').bootstrapDropdownHover();
    </script>

    <script>
      // demo for realtime configuration and destroy
      $('[data-toggle="tooltip"]').tooltip({container: 'body'});

      $('#setSticky').on('click', function () {
        $('.setdemo [data-toggle="dropdown"]').bootstrapDropdownHover('setClickBehavior', 'sticky');
      });

      $('#setDefault').on('click', function () {
        $('.setdemo [data-toggle="dropdown"]').bootstrapDropdownHover('setClickBehavior', 'default');
      });

      $('#setDisable').on('click', function () {
        $('.setdemo [data-toggle="dropdown"]').bootstrapDropdownHover('setClickBehavior', 'disable');
      });

      $('#set1000').on('click', function () {
        $('.setdemo [data-toggle="dropdown"]').bootstrapDropdownHover('setHideTimeout', 1000);
      });

      $('#set200').on('click', function () {
        $('.setdemo [data-toggle="dropdown"]').bootstrapDropdownHover('setHideTimeout', 200);
      });

      $('#destroy').on('click', function () {
        $('[data-toggle="tooltip"]').tooltip('hide');
        $('.setdemo [data-toggle="dropdown"]').bootstrapDropdownHover('destroy');
        $('#destroy, #set200, #set1000, #setDisable, #setDefault, #setSticky').prop('disabled', 'disabled');
        $('#reinitialize').prop('disabled', false);
        $('.setdemo').addClass('destroyed');
      });

      $('#reinitialize').on('click', function () {
        $('[data-toggle="tooltip"]').tooltip('hide');
        $('.setdemo [data-toggle="dropdown"]').bootstrapDropdownHover();
        $('#destroy, #set200, #set1000, #setDisable, #setDefault, #setSticky').prop('disabled', false);
        $(this).prop('disabled', 'disabled');
        $('.setdemo').removeClass('destroyed');
      });
    </script>

    <script type="text/javascript">
      function checkForm(form1) 
      { // validation fails if the input is blank
      
    
         if(form1.password_new.value != form1.password_confirm.value) 
       {
        alert("Error: Passwords doesn't match!");
         form1.password_confirm.focus();
           return false; 
        } 
      }
</script>
</body>
</html>
