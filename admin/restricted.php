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
   
    <!-- Main content -->
    <section class="content">

     <h3 class="text-white">RESTRICTED, Contact your Administrator</h3>
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
    $("#accounts").addClass("active");
    $("#stud").addClass("active menu-open")
</script>
</body>
</html>
