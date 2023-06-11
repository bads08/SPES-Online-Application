<?php 
 require_once "../config/config.php";
 session_start();
 require_once "session.php";
 require_once "../config/getClass.php";
 require_once "../config/spesClass.php";
 $con= new spes();
 $get_id = $_GET["id"];

 $sql = "SELECT * FROM application WHERE student_id = '$get_id'";
 $query = $con->con()->query($sql);
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
          <h3 class="box-title"><a href="pending" class="btn bg-gray btn-sm"><i class="fa fa-chevron-left"></i> Back</a> </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
            <div class="box-body">
        
      


            
            <form action="function/update_profile_app.php" method="post"> 
            <!--ROW 1-->
            <div class="row">
               <form action="update_profile.php" method="post"> 
                <input type="hidden" value="<?php echo $get_id?>" name="get-id">
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
                  <label for="">GSIS Beneficiary/Relationship:</label>
                  <input type="text" class="form-control" value="<?php echo $gsis?>" name="gsis_benefitiary">
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
          </div>    
  

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>

    <!-- /.content -->
  </div>

  
  <!-- /.content-wrapper -->
  <?php require_once "modals.php"?>
                
  <?php //require_once "shared/footer.php"?>

</div>
<!-- ./wrapper -->

<?php require_once "shared/script.php"?>

</body>
</html>
