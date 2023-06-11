<?php 
 session_start();
 require_once "session.php";
 require_once "../config/getClass.php";
 require_once "../config/spesClass.php";
 $get = new getdata();
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
        Salary
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Salary</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><button class="btn btn-primary" data-toggle="modal" data-target="#modal-create-salary"><i class="fa fa-plus-circle"></i> Create Payroll</button></h3>

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
                    <th>#</th>
                    <th>Name</th>
                    <th>Date Created</th>
                    <th width="150px">Action</th>
                </tr>
              </thead>
              <tbody>
               <?php $get->getSalary();?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <section>
    <div class="modal fade in" id="modal-create-salary">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Create</h4>
              </div>
              <div class="modal-body">
                <form id="form-create-salary">
                  <label for="">Payroll Name</label>
                  <div class="form-group"> 
                    <input type="text" class="form-control" name="name" placeholder="Salary Name">
                    <span><small>Ex. For the Month of June</small></span>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-form-create-salary">Submit</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade in" id="modal-delete">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirmation</h4>
              </div>
              <div class="modal-body">
                <input type="hidden" class="salary-id">
                <center><h3>Proceed to delete?</h3></center>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-delete-confirm">Confirm</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
    </section>

  </div>


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
    $("#salary").addClass("active");

    $("#btn-form-create-salary").on("click", function () {
      $.ajax({
        url: "function/salary_create.php",
        method: "POST",
        data: $("#form-create-salary").serialize(),
        success: function (result) {
          alert(result);
          location.reload();
        }
      })
    })
  });

  $("body").on("click",".btn-delete", function name(params) {
    let sal_id = $(this).attr("id");
    $(".salary-id").val(sal_id);
  });

  $("#btn-delete-confirm").on("click", function name(params) {
    let val_id = $(".salary-id").val();
    $.ajax({
      url: "function/delete_salary.php",
      method: "POST",
      data: {val_id: val_id},
      cache: false,
      success: function (result) {
        alert(result);
        location.reload();
      }
    })
  })
</script>
</body>
</html>
