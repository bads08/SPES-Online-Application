<?php 
 require_once "../config/config.php";
 session_start();
 require_once "session.php";
 require_once "../config/notifyClass.php";
 require_once "../config/getClass.php";
 require_once "../config/spesClass.php";
 $con = new spes();
 $notify = new notif();
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
          <h3 class="box-title"><a href="pending" class="btn bg-gray btn-sm"><i class="fa fa-chevron-left"></i> Back</a> 
          <a href="applicant-pending-view-edit?id=<?php echo $get_id?>" class="btn bg-orange btn-sm"><i class="fa fa-edit"></i> Edit Profile</a>
          <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-approve" id="disable-approvedBtn">Approve</button> 
          <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-dis-approve" id="disable-rejectBtn">Dis-approve</button></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        
              <?php 
              $sql = "SELECT * FROM application WHERE student_id = '$get_id'";
              
              $query = $con->con()->query($sql);
              if ($query->num_rows > 0) {
                 while ($row = $query->fetch_assoc()) {?>
              
              <div class="row">
                <div class="col-lg-6">
                <h4 class="text-purple">Profile Details <span class="label" id="<?php echo $row["application_status"]?>"><?php echo $row["application_status"]?></span></h4>
              <table class="table-condensed">
                <tr>
                  <th width="30%">Full Name:</th>
                  <td><?php echo ucfirst($row["surname"])." ".ucfirst($row["firstname"])." ".ucfirst($row["middlename"])?></td>
              </tr>
              <tr>
                  <th width="30%">GSIS Benefitiary:</th>
                  <td><?php echo ucwords($row["gsis"])?></td>
              </tr>
              <tr>
                  <th width="30%">Birthday:</th>
                  <td><?php echo date("M d, Y", strtotime($row["birthday"]))?></td>
              </tr>
              <tr>
                  <th width="30%">Birth Place:</th>
                  <td><?php echo ucwords($row["place_of_birth"])?></td>
              </tr>
              <tr>
                  <th width="30%">Citizenship:</th>
                  <td><?php echo ucwords($row["citizenship"])?></td>
              </tr>
              <tr>
                  <th width="30%">Contact:</th>
                  <td><?php echo $row["contact"]?></td>
              </tr>
              <tr>
                  <th width="30%">Email:</th>
                  <td><?php echo $row["email"]?></td>
              </tr>
              <tr>
                  <th width="30%">Social Account:</th>
                  <td><?php echo ucwords($row["social_account"])?></td>
              </tr>
              <tr>
                  <th width="30%">Status:</th>
                  <td><?php echo ucwords($row["status"])?></td>
              </tr>
              <tr>
                  <th width="30%">Gender:</th>
                  <td><?php echo ucwords($row["sex"])?></td>
              </tr>
              <tr>
                  <th width="30%">Current Status of Parents:</th>
                  <td><?php echo ucwords($row["status_parents"])?></td>
              </tr>
              <tr>
                  <th width="30%">Present Address:</th>
                  <td><?php echo ucwords($row["present_add"])?></td>
              </tr>
              <tr>
                  <th width="30%">Fathers Name:</th>
                  <td><?php echo ucwords($row["fathers_name"])?></td>
              </tr>
              <tr>
                  <th width="30%">Fathers Occupation:</th>
                  <td><?php echo ucwords($row["fathers_occupation"])?></td>
              </tr>
              <tr>
                  <th width="30%">Mothers Name:</th>
                  <td><?php echo ucwords($row["mothers_name"])?></td>
              </tr>
              <tr>
                  <th width="30%">Mothers Occupation:</th>
                  <td><?php echo ucwords($row["mothers_occupation"])?></td>
              </tr>
              <tr>
                  <th width="30%">Mothers Occupation:</th>
                  <td><?php echo ucwords($row["mothers_occupation"])?></td>
              </tr>
    
             </table>
                </div>
                <div class="col-lg-6">
           <h4 class="text-purple">Education</h4> 

            <table class="table table-bordered text-md">
              <tr>
                <th>Name of School</th>
                <th>Degree earned/Course</th>
                <th>Year/Level</th>
                <th>Date of Attendance</th>
              </tr>
              <tr>
                <td><?php echo ucwords($row["elementary"])?></td>
                <td><?php echo ucwords($row["elementary_earned"])?></td>
                <td><?php echo ucwords($row["elementary_level"])?></td>
                <td><?php echo ucwords($row["elementary_attend"])?></td>
              </tr>
            </table>

            <table class="table table-bordered text-md">
              <tr>
                <th>Name of School</th>
                <th>Degree earned/Course</th>
                <th>Year/Level</th>
                <th>Date of Attendance</th>
              </tr>
              <tr>
                <td><?php echo ucwords($row["secondary"])?></td>
                <td><?php echo ucwords($row["secondary_earned"])?></td>
                <td><?php echo ucwords($row["secondary_level"])?></td>
                <td><?php echo ucwords($row["secondary_attend"])?></td>
              </tr>
            </table>

            <table class="table table-bordered text-md">
              <tr>
                <th>Name of School</th>
                <th>Degree earned/Course</th>
                <th>Year/Level</th>
                <th>Date of Attendance</th>
              </tr>
              <tr>
                <td><?php echo ucwords($row["tertiary"])?></td>
                <td><?php echo ucwords($row["tertiary_earned"])?></td>
                <td><?php echo ucwords($row["tertiary_level"])?></td>
                <td><?php echo ucwords($row["tertiary_attend"])?></td>
              </tr>
            </table>

            <table class="table table-bordered text-md">
              <tr>
                <th>Name of School</th>
                <th>Degree earned/Course</th>
                <th>Year/Level</th>
                <th>Date of Attendance</th>
              </tr>
              <tr>
                <td><?php 
                      if (!empty($row["tech_voc"])) {
                        echo ucwords($row["tech_voc"]);
                      }else{
                        echo "No data";
                      }
                    ?>
                </td>
                <td><?php 
                      if (!empty($row["tech_voc_earned"])) {
                        echo ucwords($row["tech_voc_earned"]);
                      }else{
                        echo "No data";
                      }
                    ?>
                </td>
                <td><?php 
                      if (!empty($row["tech_voc_level"])) {
                        echo ucwords($row["tech_voc_level"]);
                      }else{
                        echo "No data";
                      }
                    ?>
                </td>
                <td><?php 
                      if (!empty($row["tech_voc_ettend"])) {
                        echo ucwords($row["tech_voc_ettend"]);
                      }else{
                        echo "No data";
                      }
                    ?>
                </td>
              </tr>
            </table>



              
       
              <h4 class="text-purple">Additional Requirements</h4>


              <?php 
              $sql = "SELECT * FROM application_image WHERE student_id = '$get_id'";
              $query = $con->con()->query($sql);
              if ($query->num_rows > 0) {
                 while ($row = $query->fetch_assoc()) {?>
                  <img src="../<?php echo $row['filename']?>" alt="" width="70px" class="image-src">
              <?php }} ?>

              <?php 
              $sql = "SELECT * FROM application_documents WHERE student_id = '$get_id'";
              $query = $con->con()->query($sql);
              if ($query->num_rows > 0) {
                 while ($row = $query->fetch_assoc()) {?>
         
                  <a href="#" class="" data-toggle="modal" data-target="#<?php echo $row["id"]?>">
                    <img src="..\dist\img\pdf-image.png" alt="" width="70px">
                  </a>

              <?php }} ?>

                </div>
              </div>
          
              <?php }} ?>
     

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <section>
    <?php 
              $sql = "SELECT * FROM application_documents WHERE student_id = '$get_id'";
              
              $query = $con->con()->query($sql);
              if ($query->num_rows > 0) {
                 while ($row = $query->fetch_assoc()) {?>
                   <div class="modal fade" id="<?php echo $row["id"]?>">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content bg-purple">
                        <div class="modal-body">
                          <embed src="../<?php echo $row["filename"]?>" width="100%" height="550px">
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>

              <?php }} ?>

              
      
    </section>
    <section>
      <?php $notify->updated();?>
    </section>
    <!-- /.content -->
  </div>

  
  <!-- /.content-wrapper -->
  <?php require_once "modals.php"?>
                
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
          $("#approvedBtn").html("Approve");
          alert("Applicant Approved successfully");
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
          $("#rejectBtn").html("Dis-approve");
          alert("Applicant Dis-approved successfully");
          location.reload();
        }
      })
    });

        $(function () {
          var elem = $("span.label").html();

          if (elem == "Approved") {
            $("#disable-approvedBtn").attr("disabled","");
            $(".label").addClass("label-success");
            return;
          }else if(elem == "Dis-approved"){
            $("#disable-rejectBtn").attr("disabled","");
            $(".label").addClass("label-danger");
            return;
          }else{
            $(".label").addClass("label-warning");
          }
        });
 
  });

  $(".image-src").on("click", function () {
    var the_image = $(".image-src").attr("src");
    $(".modal-image-viewer").css("display", "block");
    $(".modal-get-image").attr("src", the_image);
    
  })
</script>
<script>
  
</script>
</body>
</html>
