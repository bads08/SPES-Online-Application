<?php 
session_start();
 require_once "session.php";
 require_once "../config/notifyClass.php";
 require_once "../config/getClass.php";
 require_once "../config/spesClass.php";
 $notify = new notif();
 $con    = new spes();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPES</title>
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <?php require_once "shared/link.php" ?>
</head>
<body class="hold-transition skin-purple sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <?php require_once "shared/header.php"?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php require_once "shared/sidebar.php"?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row magictime slideRightReturn">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php
                $sql = "SELECT
                student.student_id
                FROM
                student";
                $query = $con->con()->query($sql);
                $count = $query->num_rows;
                echo $count;
              ?></h3>

              <p>Student Registered</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="user_stud" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php
                $sql = "SELECT
                application.`application_status`
                FROM
                application
                WHERE `application_status` = 'Pending'
                ";
                $query = $con->con()->query($sql);
                $count = $query->num_rows;
                echo $count;
                ?></sup></h3>

              <p>Pending Applicants</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="pending" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php
                $sql = "SELECT
                application.`application_status`
                FROM
                application
                 WHERE `application_status` = 'Approved'
                ";
                $query = $con->con()->query($sql);
                $count = $query->num_rows;
                echo $count;
              ?></h3>

              <p>Approved Applicants</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="approved" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php
                $sql = "SELECT
                application.`application_status`
                FROM
                application
                WHERE `application_status` = 'Dis-Approved'
                ";
                $query = $con->con()->query($sql);
                $count = $query->num_rows;
                echo $count;
              ?></h3>

              <p>Disapproved Applicants</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="rejected" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

    </section>
    <section>
      <?php $notify->loginsuccess();?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php //require_once "shared/footer.php"?>

</div>
<!-- ./wrapper -->

<?php require_once "shared/script.php"?>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  
 $(document).ready(function () {
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .row .col-sm-6:eq(0)');
    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
  

  $("#dashboard").addClass("active");
 })

  
</script>
</body>
</html>
