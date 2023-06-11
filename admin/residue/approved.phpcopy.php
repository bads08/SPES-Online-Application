<?php 
 session_start();
 require_once "../config/config.php";
 require_once "session.php";
 require_once "../config/getClass.php";
 require_once "../config/spesClass.php";
 $spes = new spes();
 $con = new spes();
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
        Applicants
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Applicants</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box magictime slideRightReturn">
        <div class="box-header with-border">
          <h3 class="box-title">Approved</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table id="example2" class="table table-hover">
              <thead>
                <tr class="bg-gray">
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Contact NO</th>
                    <th>Status</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              
              $sql = "SELECT
              applicant.applicant_id,
              applicant.applicant_code,
              applicant.fname,
              applicant.lname,
              applicant.gender,
              applicant.brgy,
              applicant.st,
              applicant.email,
              applicant.contact_no,
              applicant.`status` as app_status
              FROM
              applicant
              WHERE
              applicant.`status` = 'Approved'
              ";
              
              $query = $con->con()->query($sql);
              if ($query->num_rows > 0) {
                 while ($row = $query->fetch_assoc()) {?>
                
              <tr>
                  <td class=text-light-blue><?php echo ucfirst($row["fname"])." ".ucfirst($row["lname"])?></td>
                  <td><?php echo ucfirst($row["brgy"]).", ".ucfirst($row["st"])?></td>
                  <td><?php echo $row["email"]?></td>
                  <td><?php echo $row["contact_no"]?></td>
                  <td>
                    <?php if ($row["app_status"] == "Pending") {?>
                      <span class="label label-warning"><?php echo $row["app_status"]?></span>
                    <?php } elseif($row["app_status"] == "Approved") {?>
                      <span class="label label-success"><?php echo $row["app_status"]?></span>
                    <?php } else {?>
                      <span class="label label-danger"><?php echo $row["app_status"]?></span>
                    <?php } ?>
                  </td>
              </tr>

              <?php }} ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

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
</script>
</body>
</html>
