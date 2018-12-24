<?php
session_start();
if(!isset($_SESSION["admin_user"])) {
		header( "location:login.php");
	//	exit(0);
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
    
    <!-- Connect DB -->
    
  </head>
  <body background="backgroundall.jpg">
    <!-- Start Head -->
        <style>
            img.resize  {
              width: 70px;
              height: 70px;
              border: 10px;
                 }
           img:hover.resize  {
              width: 200px;
              height: 200px;
              border: 10px;
                }

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
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th style="text-align:center;">รหัสนักศึกษา</th>
                        <th style="text-align:center;">ปัญหา</th>
                        <th style="text-align:center;">รายละเอียดปัญหา</th>
                        <th style="text-align:center;">สถานที่</th>  
                        <th style="text-align:center;">รายละเอียดสถานที่</th>
                        <th style="text-align:center;">วันที่/เวลา</th>  
                        <th style="text-align:center;">รูปภาพ</th>
                    </tr>
                    </thead>
                        <tbody>
    <?php
        $sql="SELECT * FROM Problem WHERE Problem_type = '".$_SESSION["Problem_type"]."' AND statusp = 1 ";
        $query=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
        
    ?>
    
                        <tr>
                            
                        <td> <?php echo ($row['User_ID']);?> </td>
                        <td> <?php echo $row['Problem_type'];?> </td>
                        <td> <?php echo $row['Problem_detail'];?> </td>
                        <td> <?php echo $row['Location'];?> </td>
                        <td> <?php echo $row['Location_detail'];?> </td>
                        <td> <?php echo $row['Date_Time'];?> </td>
                        <td align="center" ><img src="data:image/jpeg;base64, <?php echo  $row['Pic']; ?> " class="resize"></td>
                        
                        </tr>
        
    <?php
        }
	mysqli_close($conn);
    ?>
    
                        </tbody>
                </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
  </body>
</html>