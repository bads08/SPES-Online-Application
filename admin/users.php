<?php 
 session_start();
 require_once "session.php";
 require_once "../config/getClass.php";
 require_once "../config/spesClass.php";
 $spes = new getdata();
 $con  = new spes();
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
        Admin Uers <button type="button" class="btn bg-purple" data-toggle="modal" data-target="#modal-user-add">
                <i class="fa fa-user-plus"></i> Create Admin Account
              </button>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users Admin</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box magictime slideRightReturn">
        <div class="box-header with-border">
          <h3 class="box-title">List</h3>

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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Type</th>
                    <th>Option</th>
                </tr>
              </thead>
              <tbody>
               <?php $spes->getusers();?>
             </tbody>
          </table>
        </div>
        <!-- /.box-body -->

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
    <section>
      <!--edit modal-->
    <div class="modal fade" id="modal-user-edit">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update profile</h4>
              </div>
              <div class="modal-body">
              <h3 class="success text-green"></h3>
                <form id="userform" class="hide-edit">
                    <input type="hidden" class="form-control" id="user_id" name="user_id">
                    <div class="form-group">
                    <label for="">Firstname</label>
                    <input type="text" class="form-control" id="fname" name="fname">
                    </div>
                    <div class="form-group">
                    <label for="">Lastname</label>
                    <input type="text" class="form-control" id="lname" name="lname">
                    </div>
                    <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                    <label for="">User Type</label>
                    <select type="text" class="form-control" id="user_type" name="user_type">
                      <option value="1">Admin</option>
                    </select>
                    </div>
              </div>
             </form>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-purple hide-edit" id="save">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <!--add modal-->
        <div class="modal fade" id="modal-user-add">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Create Admin Account</h4>
              </div>
              <div class="modal-body">
              <h3 class="success-add text-green"></h3>
                <form id="addform" class="hide-add">
                    <div class="form-group">
                    <label for="">Firstname</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Firstname">
                    </div>
                    <div class="form-group">
                    <label for="">Lastname</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Lastname">
                    </div>
                    <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                    <label for="">User Type</label>
                    <select type="text" class="form-control" id="user_type" name="user_type">
                      <option value="1">Admin</option>
                    </select>
                    </div>
              </div>
             </form>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-purple hide-add" id="add">Save</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!--delete modal-->
        <div class="modal fade" id="modal-user-delete">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirmation</h4>
              </div>
              <div class="modal-body">
              <h3 class="success-delete text-green"></h3>
                <form id="addform" class="hide-delete">
  
                    <input type="hidden" class="form-control" value="" id="delete-id" name="delete-id">
                    <center><h3>Proceed to Delete?</h3></center>
                   
              </div>
             </form>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-purple hide-delete" id="delete">Delete</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
    </section>
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
<script>
  $(document).ready(function () {
    $("body").on("click",".edit", function (e) {
    e.preventDefault();
    let userid = $(this).attr("id");
    $.ajax({
      url: "function/get_user.php",
      type: "POST",
      data: {userid: userid},
      cache: false,
      success: function (result) {
        let get_user = JSON.parse(result);
        $("#user_id").val(get_user.user_id);
        $("#fname").val(get_user.fname);
        $("#lname").val(get_user.lname);
        $("#username").val(get_user.username);
        $("#password").val(get_user.password);
        $("#user_type").val(get_user.user_type);
      }
    })
  });

  $("#save").on("click", function (e) {
    e.preventDefault();
    $.ajax({
      url: "function/user_save_changes.php",
      type: "POST",
      data: $("#userform").serialize(),
      cache: false,
      success: function (result) {
        $(".hide-edit").hide(function () {
          $(".success").html(result);
          setTimeout(() => {
            location.reload();
          }, 2000);
        })
      }
    })
  });

  $("#add").on("click", function (e) {
    e.preventDefault();
    $.ajax({
      url: "function/add_user.php",
      type: "POST",
      data: $("#addform").serialize(),
      cache: false,
      success: function (result) {
        $(".hide-add").hide(function () {
          $(".success-add").html(result);
        setTimeout(() => {
          location.reload();
        }, 2000);
        })
      }
    })
  });
 
 

 $("body").on("click",".del", function (e) {
   e.preventDefault();
   let delete_id = $(this).attr("id");
   $.ajax({
     url: "function/user_get_id_delete.php",
     type: "POST",
     data: {delete_id: delete_id},
     cache: false,
     success: function (resultDel) {
       $("#delete-id").val(resultDel);
     }
   });
 });

 $("#delete").on("click", function (e) {
   e.preventDefault();
   let delete_id = $("#delete-id").val();
   $.ajax({
     url: "function/user_delete.php",
     type: "POST",
     data: {delete_id: delete_id},
     cache: false,
     success: function (resultDeleted) {
       $(".hide-delete").hide(function () {
         $(".success-delete").html(resultDeleted);
         setTimeout(() => {
           location.reload();
         }, 1000);
       })
     }
   });
 });

  })
    $("#users").addClass("active");
    $("#accounts").addClass("active menu-open")
</script>
</body>
</html>
