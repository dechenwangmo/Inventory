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
        <?php if($_SESSION['role'] == 'admin') { ?>
        <li class="dropdown">
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
        <?php } ?>
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
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi, <?php echo $_SESSION['username']; ?> !</a>
              <ul class="dropdown-menu">
                <li></li>
                <?php if($_SESSION['role'] == 'admin') { ?>
                <li><a href="profile.php"><span class="glyphicon glyphicon-pencil"></span> Edit My Profile</a></li> 
                <?php } ?>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                
              </ul>
      </li>
    </ul>
</nav>