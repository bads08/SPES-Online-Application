<?php
 session_start();
 require_once "session.php";
 $status = $_SESSION["status"];
 $session_stud_id  = $_SESSION["student_id"];
 require_once "config/config.php";

 
  $sql = "SELECT * FROM `application` WHERE student_id = '$session_stud_id'";
  $query = $con->query($sql);
  $row = $query->fetch_assoc();
  $mydate = $row["date_approved"];
  $app_stat = $row["application_status"];
  
 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPES</title>
  <link rel="shortcut icon" href="dist\img\spes.png" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/spes.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="plugins\magic-master\dist\magic.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
     hr{
       border: 1px #8000808a solid;
     }
   </style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-purple layout-top-nav fixed bg-image">
<!--loader-->
<div class="overlays"><span class="spin"><img src="dist/img/preloader_3.gif" alt=""></span></div>
<div class="wrapper bg-image">

  <?php require_once "shared/header.php"?>
  <!-- Full Width Column -->
  <div class="">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section>
        <br>
        <br>
        <br>
        <?php
           if (isset($_SESSION["notify"])) {
               if ($_SESSION["notify"] == "replace") {?>
             <div class="alert-replace alert alert-success alert-dismissible alert-for-update">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                 <h4><i class="icon fa fa-info"></i> Replaced Successfully</h4>
               </div>
              <?php }
           unset($_SESSION["notify"]);}
          ?>
          <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Note!</h4>
                Once your Application Approved, the requirements below cannot be change.
          </div>
        

          <?php
            
          ?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Additional Requirements</h3>
            </div>
              <div class="box-body">
                
                <div class="row">
                  
                <?php
                  $sql = "SELECT * FROM application_image WHERE student_id = '$session_stud_id'";
                  $query = $con->query($sql);
                  if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {?>
                      <div class="col-lg-2">
                      <label for=""><?php echo $row["name"]?></label>
                        <a href="<?php echo $row["filename"]?>" target="_blank"><img src="<?php echo $row["filename"]?>" alt="" width="100px"></a><br>
                        <?php 
                          if(strtotime($mydate) < strtotime('-365 days') || $app_stat == "Approved") {
                            echo "<button type='button' class='btn btn-warning btn-xs' data-toggle='modal' data-target='#modal2-".$row['id']."' disabled=''><i class='fa fa-edit'></i> Replace</button>";
                          }else{
                            echo "<button type='button' class='btn btn-warning btn-xs' data-toggle='modal' data-target='#modal2-".$row['id']."'><i class='fa fa-edit'></i> Replace</button>";
                          }
                        ?>
                     </div>
                      
                     <!-- MODLS -->
                     <form action="function_crud.php" method="post" enctype="multipart/form-data">
                     <div class="modal fade in" id="modal2-<?php echo $row["id"]?>">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Replace</h4>
                            </div>
                            <div class="modal-body">
                              <input type="hidden" value="<?php echo $row["id"]?>" name="file-id">
                              <input type="file" name="filename1">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" name="btnreplace1">Submit</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      </form>

                    <?php }
                  }else{
                    echo "no data found";
                  }

                ?>
                  
                  <?php 
                   $sql2 = "SELECT * FROM application_documents WHERE student_id ='$session_stud_id'";
                   $query2 = $con->query($sql2);
                   if ($query2->num_rows > 0) {
                     while ($row2 = $query2->fetch_assoc()) {?>
                       <div class="col-lg-2">
                         <label for=""><?php echo $row2["name"]?></label>
                          <a href="<?php echo $row2["filename"]?>" target="_blank"><img src="dist\img\pdf-image.png" alt="" width="90px"></a><br>
                          <?php 
                          if(strtotime($mydate) < strtotime('-365 days') || $app_stat == "Approved") {
                            echo "<button type='button' class='btn btn-warning btn-xs' data-toggle='modal' data-target='#modal-".$row2["id"]."' disabled=''><i class='fa fa-edit'></i> Replace</button>";
                          }else{
                            echo "<button type='button' class='btn btn-warning btn-xs' data-toggle='modal' data-target='#modal-".$row2["id"]."'><i class='fa fa-edit'></i> Replace</button>";
                          }
                        ?>
                          
                        </div>
                        <!-- MODALS -->
                        <form action="function_crud2.php" method="post" enctype="multipart/form-data">
                        <div class="modal fade in" id="modal-<?php echo $row2["id"]?>">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Replace</h4>
                            </div>
                            <div class="modal-body">
                            <input type="hidden" value="<?php echo $row2["id"]?>" name="file-id2">
                              <input type="file" name="filename2">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" name="btnreplace2">Submit</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      </form>

                    <?php }
                   }else{
                    echo "no data found";
                  }
                  ?>

                </div>

              </div>
          </div>
          
      </section>
      
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <?php //require_once "shared/footer.php"?>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/validateFile.js"></script>

<script>

  $(window).on("load", function () {
    $(".overlays").fadeOut("slow");
  });


  $("#appbtn").attr("disabled","");
  $("#appbtn").on("click",function () {
    $("#appbtn").html("Submitting Please Wait...");
  });


  $('#file2').jqExtension({
   allowed: 'pdf', 
   validMessage: 'Valid', 
   invalidMessage: 'Invalid File (PDF file only allowed.)'
   });

   
   $("#btnUpdatePassword").on("click", function () {
      var newPassword = $("#newPassword").val();
      var old = $("#oldPassword").val();
      $.ajax({
        url: "admin/function/update_password.php",
        type: "POST",
        data: {newPass: newPassword, newOld: old},
        success: function (response) {
          alert(response);
        }
      })
    })

    $("#btn-search").on("click", function (e) {
      e.preventDefault();
      $.ajax({
        url: "admin/function/search.php",
        method: "POST",
        data: $("#form-search").serialize(),
        success: function (result) {
          if (result == "Empty") {
            alert("Empty field");
          }else{
            $("#search-result").html(result);
          }
        }
      })
    })

    $("#reset").on("click", function name(params) {
      $("#form-search").trigger("reset");
      $("#search-result").html("");
    })

    setTimeout(() => {
      $(".alert-replace").fadeOut();
    }, 2000);
</script>

</body>
</html>
