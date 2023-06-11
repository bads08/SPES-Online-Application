<?php 
 session_start();
 require_once "session.php";
 require_once "../config/getClass.php";
 require_once "../config/spesClass.php";
 $get = new getdata();
 $con = new spes();
 $salary_id = $_GET["salary_id"];
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
          <h3 class="box-title">
          <a href="salary" class="btn btn-default">Back</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus-circle"></i> Add SPES</button>
          </h3>
 
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
          <div class="refresh">

          </div>

        </div>
      </div>
    </section>
    <section>
        <!-- MODAL -->
        <div class="modal fade in" id="modal-add">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add Beneficiary</h4>
              </div>
              <div class="modal-body">
                <form id="form-add-beneficiary">
                  <div id="message-alert"></div>
                  <input type="hidden" name="salary-id" value="<?php echo $salary_id?>">
                <div class="form-group">
                    <label>Beneficiary</label>
                    <select class="form-control select2" style="width: 100%;" name="beneficiary-name">
                    
                    <?php $get->getBeneficiary();?>
                    </select>
                </div>
                <div class="form-group">
                <label>Control no</label>
                <input type="number" class="form-control" placeholder="Control no." name="beneficiary-control">
              </div>
              <div class="form-group">
                <label>Amount</label>
                <input type="number" class="form-control" min="1" placeholder="Amount" name="beneficiary-amount">
              </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-add-beneficiary">Submit</button>
              </div>
            </div>
          </div>
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

    $("#btn-add-beneficiary").on("click", function name(params) {
        $.ajax({
            url: "function/salary.php",
            method: "POST",
            data: $("#form-add-beneficiary").serialize(),
            cache: false,
            success: function name(result) {
                alert(result);
                $("#form-add-beneficiary").trigger("reset");
            }
        })
    })

    setInterval(() => {
      $(".refresh").load("load_beneficiary.php?salary_id=<?php echo $salary_id?>");
    }, 1000);
  });
</script>
</body>
</html>
