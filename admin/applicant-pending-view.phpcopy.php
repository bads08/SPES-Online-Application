<?php 
 require_once "../config/config.php";
 session_start();
 require_once "session.php";
 require_once "../config/getClass.php";
 require_once "../config/spesClass.php";
 $con = new spes();
 $get_id = $_GET["id"];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPES</title>
  <?php require_once "shared/link.php" ?>
</head>
<body class="hold-transition skin-purple sidebar-mini fixed">
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
        Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Details</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box magictime slideRightReturn">
        <div class="box-header with-border">
          <h3 class="box-title"><a href="pending" class="btn bg-gray btn-sm"><i class="fa fa-chevron-left"></i> Back</a> <button class="btn bg-purple btn-sm" id="approvedBtn" value="<?php echo $get_id;?>">Approve</button> <button class="btn bg-maroon btn-sm" id="rejectBtn" value="<?php echo $get_id;?>">Dis-approve</button></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <table class="table table-hover">
          <h4 class="text-purple">Applicant Information</h4>
              <?php 
              $sql = "SELECT
              student.student_id,
    
              student.username,
              student.`password`,
              student.fname,
              student.mname,
              student.lname,
              student.sex,
              student.email,
              student.contact_no,
              student.`status`,
              application.application_id,
              application.control_no,
              application.fname,
              application.mname,
              application.lname,
              application.birthday,
              application.birth_place,
              application.address,
              application.age,
              application.sex,
              application.religion,
              application.barangay,
              application.street,
              application.sitio,
              application.fathers_name,
              application.fathers_occupation,
              application.mothers_name,
              application.mothers_occupation,
              application.`status`,
              application.`date`
              FROM
              application
              INNER JOIN student ON student.control_no = application.control_no
              
     
              WHERE application.control_no = '$get_id'";
              
              $query = $con->con()->query($sql);
              if ($query->num_rows > 0) {
                 while ($row = $query->fetch_assoc()) {?>
              
              <tr>
                  <th width="20%">Full Name:</th>
                  <td><?php echo ucfirst($row["fname"])." ".ucfirst($row["mname"])." ".ucfirst($row["lname"])?></td>
              </tr>
              <tr>
                  <th width="20%">Current Address:</th>
                  <td><?php echo ucfirst($row["barangay"])." ".ucfirst($row["street"])." ".ucfirst($row["sitio"])?></td>
              </tr>
              <tr>
                  <th width="10%">Email:</th>
                  <td><?php echo $row["email"]?></td>
              </tr>
              <tr>
                  <th width="10%">Phone No:</th>
                  <td><?php echo $row["contact_no"]?></td>
              </tr>
              <tr>
                  <th width="10%">Status:</th>
                  <td>
                      <span class="label" id="<?php echo $row["status"]?>"><?php echo $row["status"]?></span>
                  </td>
              </tr>

              <?php }} ?>
          </table>
          
          <table class="table table-hover">
          <h4 class="text-purple">Requirements</h4>
              <?php 
              $sql = "SELECT
              requirements.req_id,
              requirements.applicant_id,
              requirements.file_name,
              requirements.uploaded_on,
              requirements.`status`
              FROM
              requirements WHERE applicant_id = '$get_id'
              ";
              
              $query = $con->con()->query($sql);
              if ($query->num_rows > 0) {
                 while ($row = $query->fetch_assoc()) {
                   $size = filesize("../uploads/".$row["file_name"]) / 1000;
              ?>
               <tr>
                 <td>
                  <i class="fa fa-file-pdf-o fa-lg text-red"></i> <a href="#" class="" data-toggle="modal" data-target="#<?php echo $row["req_id"]?>"><?php echo $row["file_name"]?></a> <span><?php echo $size." KB"?></span>
                 </td>
               </tr>
              <?php }} ?>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <section>
    <?php 
              $sql = "SELECT
              requirements.req_id,
              requirements.applicant_id,
              requirements.file_name,
              requirements.uploaded_on,
              requirements.`status`
              FROM
              requirements WHERE applicant_id = '$get_id'
              ";
              
              $query = $con->con()->query($sql);
              if ($query->num_rows > 0) {
                 while ($row = $query->fetch_assoc()) {?>
              
                   <div class="modal fade" id="<?php echo $row["req_id"]?>">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content bg-purple">
                        <div class="modal-body">
                          <embed src="..\uploads\<?php echo $row["file_name"]?>" width="100%" height="500px">
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>

              <?php }} ?>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php //require_once "shared/footer.php"?>

</div>
<!-- ./wrapper -->

<?php require_once "shared/script.php"?>
<script>
  $(document).ready(function () {
    $("#approvedBtn").on("click", function (e) {
      e.preventDefault();
      var id = $("#approvedBtn").val();
      $.ajax({
        url: "function/qualified.php",
        type: "POST",
        data: {id: id},
        cache: false,
        beforeSend: function () {
          $("#approvedBtn").html("Please wait..");
        },
        success: function (data) {
          $("#approvedBtn").html("Approved.");
          location.reload();
        }
      })
    })

    $("#rejectBtn").on("click", function (e) {
      e.preventDefault();
      var id = $("#rejectBtn").val();
      $.ajax({
        url: "function/rejected.php",
        type: "POST",
        data: {id: id},
        cache: false,
        beforeSend: function () {
          $("#rejectBtn").html("Please wait..");
        },
        success: function (data) {
          $("#rejectBtn").html("Rejected.");
          location.reload();
        }
      })
    });

        $(function () {
          var elem = $("span.label").html();

          if (elem == "Approved") {
            $("#approvedBtn").attr("disabled","");
            $(".label").addClass("label-success");
            return;
          }else if(elem == "Dis-approved"){
            $("#rejectBtn").attr("disabled","");
            $(".label").addClass("label-danger");
            return;
          }else{
            $(".label").addClass("label-warning");
          }
        });
 
  });
</script>
</body>
</html>
