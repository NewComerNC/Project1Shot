<?php
session_start();
	if(!isset($_SESSION["admin_user"])) {
		header( "location:login.php");
	} 
	if($_SESSION['status'] != "HEADADMIN")	{
		echo    "<script type='text/javascript'>alert('This page for Headadmin only!');
        		window.location.href='admin_page.php';
        		</script>";
		
	}	
	
include 'connect_db.php';
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Custom Fonts -->
    <link href="../css/header.css" rel="stylesheet" type="text/css">
    <script>
    <?php
        include 'connect_db.php';
    	if (isset($_POST['submit'])) {
    		
    		$adminname = $_POST['adminname'];
    		$adminpass = $_POST['adminpass'];
    		$status = $_POST['status'];
    		$department = $_POST['department'];
    		$problem_type = $_POST['problem_type'];
    	
    		$sqli = "insert into Admin (admin_user,admin_pass,status,Department,Problem_type) 
    				 VALUES ('$adminname','$adminpass','$status','$department','$problem_type')";
    				
    		if (!mysqli_query($conn,$sqli)) 
    		{
    			die ("alert('Failed to add an Admin');");
    		} else 	{
    			echo ("alert('Add admin complete');");
    		}
    	}
?>
    </script>


  </head>
  <body>
    <!-- Start Head -->
        <style>

            .header {
              overflow: hidden;
              background-color: #161212;
              padding: 20px 10px;
            }

            
            .header a {
              float: left;
              color: white;
              text-align: center;
              padding: 12px;
              text-decoration: none;
              font-size: 18px; 
              line-height: 25px;
              border-radius: 4px;
            }
            
            .header p {
              float: left;
              color: white;
              text-align: center;
              padding: 12px;
              text-decoration: none;
              font-size: 18px; 
              line-height: 25px;
              border-radius: 4px;
            }
            
            .header p.logo {
              font-size: 25px;
              font-weight: bold;
            }
            
            .header a:hover {
              background-color: #5b5959;
              color: white;
            }
            
            .header-right {
              float: right;
            }

        </style>
        
        <div class="header">
          <p class="logo">Welcome <?php echo $_SESSION["admin_user"];?></p>
          <div class="header-right">
            <a href="admin_page.php">Report</a>
            <a href="admin_history.php">History</a>
            <a href="add_admin.php">Add Admin</a>
            <a href="logout.php">Logout</a>
          </div>
        </div>
        
    <!-- End Head -->

<!-- Start Content -->

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Admin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Admin Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method ="post" action="add_admin.php" enctype="multipart/form-data">
									<input type="hidden" name="submitted" value="true" />
									<fieldset>
										 <div class="form-group">
                                            <label>Admin Name</label>
                                            <input class="form-control" name="adminname" placeholder="Enter name">
                                        </div>
                                        
										 <div class="form-group">
                                            <label>Admin Password</label>
                                            <input class="form-control" name="adminpass" placeholder="Enter Password">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
											<select class="form-control" name="status">
											    <option>ADMIN</option>
											    <option>HEADADMIN</option>
											</select>
                                        </div>
										 <div class="form-group">
                                            <label>Department</label>
											<select class="form-control" name="department">
    											<option>Building</option>
                                                <option>Cleaning</option>
                                                <option>Maintenance</option>
											</select>
                                        </div>
										 <div class="form-group">
                                            <label>Problem type</label>
											<select class="form-control" name="problem_type">
    											<option>อาคารสถานที่</option>
                                                <option>ความสะอาด</option>
                                                <option>อุปกรณ์ชำรุด</option>
											</select>
                                        </div>
									</fieldset>
									<center><input type="submit" name="submit" value="SUBMIT" /></center>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- End Content -->

<!-- Footer -->
<style>
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #343a40;
    color: white;
    text-align: center;
}
</style>
<div class="footer" >
  <p>1Shot Project</p>
</div>
<!-- End Footer -->




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
  </body>
</html>