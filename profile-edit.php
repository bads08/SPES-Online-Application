<?php
 session_start();
 require_once "session.php";
 $status = $_SESSION["status"];
 $session_stud_id  = $_SESSION["student_id"];
 require_once "config/config.php";

 $sql = "SELECT * FROM application WHERE student_id = '$session_stud_id'";
 $query = $con->query($sql);
 if ($query->num_rows > 0) {
     while ($row = $query->fetch_assoc()) {
      $surname = $row["surname"];
      $fname = $row["firstname"];
      $mname = $row["middlename"];
      $gsis = $row["gsis"];
      $gsis_relationship = $row["gsis_relationship"];
      $birthday = $row["birthday"];
      $place_birth = $row["place_of_birth"];
      $citizenship = $row["citizenship"];
      $contact = $row["contact"];
      $email = $row["email"];
      $social = $row["social_account"];
      $status = $row["status"];
      $sex = $row["sex"];
      $type = $row["applicant_type"];
      $parent_status = $row["status_parents"];
      $present_add = $row["present_add"];
      $permanent_add = $row["permanent_add"];
      $fathers_name = $row["fathers_name"];
      $fathers_occ = $row["fathers_occupation"];
      $mothers_name = $row["mothers_name"];
      $mothers_occ = $row["mothers_occupation"];
  
      $elementary = $row["elementary"];
      $elem_earned = $row["elementary_earned"];
      $elem_level = $row["elementary_level"];
      $elem_attend = $row["elementary_attend"];
  
      $secondary = $row["secondary"];
      $second_earned = $row["secondary_earned"];
      $second_level = $row["secondary_level"];
      $second_attend = $row["secondary_attend"];
  
      $tertiary = $row["tertiary"];
      $tertiary_earned = $row["tertiary_earned"];
      $tertiary_level = $row["tertiary_level"];
      $tertiary_attend = $row["tertiary_attend"];
  
      $tec_voc = $row["tech_voc"];
      $tec_voc_earned = $row["tech_voc_earned"];
      $tec_voc_level = $row["tech_voc_level"];
      $tec_voc_attend = $row["tech_voc_ettend"];
     }
 }
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
<body class="hold-transition skin-purple layout-top-nav fixed">
<!--loader-->
<div class="overlays"><span class="spin"><img src="dist/img/preloader_3.gif" alt=""></span></div>
<div class="wrapper bg-image">

  <?php require_once "shared/header.php"?>
  <!-- Full Width Column -->
  <div class="">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section>
          <h3 clas="text-white">SPES Application Form</h3>

          
          <?php
           $sql = "SELECT * FROM application WHERE student_id = '$session_stud_id'";
           $query = $con->query($sql);
           if ($query->num_rows > 0) {?>
             <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profile</h3>
            </div>
              <div class="box-body">
                
              <!--ROW 1-->
              <div class="row">
               <form action="update_profile.php" method="post"> 
                <div class="col-lg-3">
                <div class="form-group">
                  <label for="">Surname:</label>
                  <input type="text" class="form-control" value="<?php echo $surname?>" name="surname">
                </div>
                </div>
                <div class="col-lg-2">
                <div class="form-group">
                  <label for="">First Name:</label>
                  <input type="text" class="form-control" value="<?php echo $fname?>" name="fname">
                </div>
                </div>
                <div class="col-lg-3">
                <div class="form-group">
                  <label for="">Middle Name:</label>
                  <input type="text" class="form-control" value="<?php echo $mname?>" name="mname">
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                  <label for="">GSIS Beneficiary:</label>
                  <input type="text" class="form-control" value="<?php echo $gsis?>" name="gsis_benefitiary">
                </div>
                </div>
              </div>

              <!--ROW 2-->
              <div class="row">
                <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Date of Birth:</label>
                  <input type="date" class="form-control" value="<?php echo $birthday?>" name="birthday">
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Place of Birth:</label>
                  <input type="text" class="form-control" value="<?php echo $place_birth?>" name="place_birth">
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Citizenship:</label>
                  <input type="text" class="form-control" value="<?php echo $citizenship?>" name="citizenship">
                </div>
                </div>
              </div>

              <!--ROW 3-->
              <div class="row">
                <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Contact no.:</label>
                  <input type="text" class="form-control" value="<?php echo $contact?>" name="contact">
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Email Address:</label>
                  <input type="text" class="form-control" value="<?php echo $email?>" name="email">
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Social Media Account:</label><span><small>(FACEBOOK, TWITTER, INSTAGRAM etc.)</small></span>
                  <input type="text" class="form-control" value="<?php echo $social?>" name="social">
                </div>
                </div>
              </div>

              <!--ROW 4-->
              <div class="row">
                <div class="col-lg-3">
                <div class="form-group">
                 <label for="">Status</label>
                 <input type="text" class="form-control" value="<?php echo $status?>" name="status">
                </div>
                </div>
                <div class="col-lg-3">
                <label for="">Sex</label>
                 <input type="text" class="form-control" value="<?php echo $sex?>" name="sex">
                </div>
                <div class="col-lg-3">
                <label for="">Type</label>
                 <input type="text" class="form-control" value="<?php echo $type?>" name="type">
                </div>
                <div class="col-lg-3">
                <label for="">Current Status of Parents</label>
                 <input type="text" class="form-control" value="<?php echo $parent_status?>" name="parent_status">
                </div>
              </div>

              <!--ROW 5-->
              <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="">Present Address:</label>
                  <input type="text" class="form-control" value="<?php echo $present_add?>" name="present_add">
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="">Permanent Address:</label>
                  <input type="text" class="form-control" value="<?php echo $permanent_add?>" name="permanent_add">
                </div>
                </div>
              </div>

              <!--ROW 6-->
              <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="">Fathers Name:</label>
                  <input type="text" class="form-control" value="<?php echo $fathers_name?>" name="fathers_name">
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="">Mothers Name:</label>
                  <input type="text" class="form-control" value="<?php echo $mothers_name?>" name="fathers_occupation">
                </div>
                </div>
              </div>

              <!--ROW 6-->
              <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="">Occupation:</label>
                  <input type="text" class="form-control" value="<?php echo $mothers_occ?>" name="mothers_name">
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="">Occupation:</label>
                  <input type="text" class="form-control" value="<?php echo $fathers_occ?>" name="mothers_occupation">
                </div>
                </div>
              </div>
      
              
              <!--ROW 8-->
              <h4>Elementary</h4>
              <div class="row">
                <div class="col-lg-3">
                   <div class="form-group">
                     <label for="">Name of School</label>
                   <input type="text" class="form-control" value="<?php echo $elementary?>" name="elementary_school">
                   </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Degree earned/Course</label>
                    <input type="text" class="form-control" value="<?php echo $elem_earned?>" name="elementary_course">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Year/Level</label>
                    <input type="text" class="form-control" value="<?php echo $elem_level?>" name="elementary_level">
                   </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="">Date of Attendance</label>
                  <input type="date" class="form-control" value="<?php echo $elem_attend?>" name="elementary_date_attendance">
                  </div>
                </div>
              </div>

              <!--ROW 9-->
              <h4>Secondary</h4>
              <div class="row">
                <div class="col-lg-3">
                   <div class="form-group">
                     <label for="">Name of School</label>
                     <input type="text" class="form-control" value="<?php echo $secondary?>" name="secondary_school">
                   </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Degree earned/Course</label>
                      <input type="text" class="form-control" value="<?php echo $second_earned?>" name="secondary_course">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Year/Level</label>
                      <input type="text" class="form-control" value="<?php echo $second_level?>" name="secondary_level">
                   </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="">Date of Attendance</label>
                    <input type="date" class="form-control" value="<?php echo $second_attend?>" name="secondary_date_attendance">
                  </div>
                </div>
              </div>

              <!--ROW 10-->
              <h4>Tertiary</h4>
              <div class="row">
                <div class="col-lg-3">
                   <div class="form-group">
                     <label for="">Name of School</label>
                     <input type="text" class="form-control" value="<?php echo $tertiary?>" name="tertiary_school">
                   </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Degree earned/Course</label>
                      <input type="text" class="form-control" value="<?php echo $tertiary_earned?>" name="tertiary_course">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Year/Level</label>
                      <input type="text" class="form-control" value="<?php echo $tertiary_level?>" name="tertiary_level">
                   </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="">Date of Attendance</label>
                    <input type="date" class="form-control" value="<?php echo $tertiary_attend?>" name="tertiary_date_attendance">
                  </div>
                </div>
              </div>

              <!--ROW 11-->
              <h4>Tech-Voc</h4>
              <div class="row">
                <div class="col-lg-3">
                   <div class="form-group">
                     <label for="">Name of School</label>
                     <input type="text" class="form-control" value="<?php echo $tec_voc?>" name="tech_school">
                   </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Degree earned/Course</label>
                      <input type="text" class="form-control" value="<?php echo $tec_voc_earned?>" name="tech_course">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Year/Level</label>
                      <input type="text" class="form-control" value="<?php echo $tec_voc_level?>" name="tech_level">
                   </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="">Date of Attendance</label>
                    <input type="date" class="form-control" value="<?php echo $tec_voc_attend?>" name="tech_date_attendance">
                  </div>
                </div>
              </div>


              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="updateAppBtn">Update</button>
              </div>
           </form>
          </div>    
           <?php }else {?>
             <h1>No data</h1>
           <?php }
           ?>   
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

    
</script>

</body>
</html>
