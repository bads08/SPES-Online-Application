<?php 
 session_start();
 require_once "session.php";
 require_once "../config/getClass.php";
 require_once "../config/spesClass.php";
 $pending = new getdata();
 $con = new spes();
 $limit_no ="";
 $sql = "SELECT * FROM application_limit WHERE limit_status = 'open'";
         $query = $con->con()->query($sql);
        if ($query->num_rows > 0) {
          while ($row = $query->fetch_assoc()) {
           $limit_stat = $row["limit_status"];
           $limit_no   = $row["limit_no"];
      }
    }
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
        Student Applicants
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Student Applicants</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box magictime slideRightReturn">
        <div class="box-header with-border">
          <h3 class="box-title">Pending</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-settings">
              <i class="fa fa-cogs"></i> Slot Settings</button>
          </div>
        </div>
        <div class="box-body">
          <table id="example2" class="table table-hover">
              <thead>
                <tr class="bg-gray">
           
                    <th>#</th>
                    <th>Application ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Date Created</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $pending->getUserPending();?>
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



<!-- MODAL SETTINGS -->

<?php 
 if ($limit_no <= 0) {?>
   <div class="modal fade in" id="modal-settings">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Slot Settings</h4>
              </div>
              <div class="modal-body">
                <form action="">
                  <div class="form-group">
                    <label for="">Available Slots</label>
                    <input type="number" class="form-control" id="inputlimit" min="1" placeholder="Enter no of Slots">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnlimit">Submit</button>
              </div>
            </div>
          </div>
        </div>
 <?php } elseif ($limit_no > 0) {?>
  <div class="modal fade in" id="modal-settings">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Slot Settings</h4>
              </div>
              <div class="modal-body">
                <form action="">
                  <div class="form-group">
                    <center>
                    <label for="">Available Slots</label>
                    <h3><?php echo $limit_no?></h3>
                    </center>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning" id="btnresetlimit">Reset</button>
              </div>
            </div>
          </div>
        </div>
<?php }
?>

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

    $("#pending").addClass("active");
    $("#stud-applicants").addClass("active menu-open")


    $("#btnlimit").on("click", function (e) {
      e.preventDefault();
      var data_limit= $("#inputlimit").val();
      $.ajax({
        url: "function/setlimit.php",
        method: "POST",
        data: {data: data_limit},
        cache: false,
        success: function (result) {
          alert(result);
          location.reload();
        }
      })

    })

    
    $("#btnresetlimit").on("click", function (e) {
      e.preventDefault();
      var resetlimit = 0;
      $.ajax({
        url: "function/setlimitreset.php",
        method: "POST",
        data: {data_reset: resetlimit},
        cache: false,
        success: function (result) {
          alert(result);
          location.reload();
        }
      })
    })
    
  });
    
</script>
</body>
</html>
