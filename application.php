<?php
 session_start();
 require_once "session.php";
 require_once "config/config.php";
 $status = $_SESSION["status"];
 $session_stud_id  = $_SESSION["student_id"];

// $mydate;
//$sqlcheckyr = "SELECT * FROM `application` WHERE student_id = '$session_stud_id'";
//$querycheckyr = $con->query($sqlcheckyr);
//$rowcheckyr = $querycheckyr->fetch_assoc();
//$mydate = $rowcheckyr["date_approved"];

//if (empty($mydate)) {
 // $mydate = "ok";
//} else {
  //$mydate = $rowcheckyr["date_approved"];
//}


//if(strtotime($mydate) < strtotime('-365 days')) {
  //  $sql3 = "UPDATE `application` SET `application_status`= 'Pending' WHERE `student_id` = '$session_stud_id'";
    //$query3 = $con->query($sql3);
  //}
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

<div class="wrapper bg-image">

  <?php require_once "shared/header.php"?>
  <!-- Full Width Column -->
  <div class="">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section>

           <?php
           if ($status == "Applied") {?>
           <br>
           <br>
           <br>
           <br>
           <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Already Applied!</h4>
                These account is already submit an Application. <a href="profile?profile">View here</a>
              </div>
              
           <?php } else{?>

          <form action="appli_function.php" method="post" enctype="multipart/form-data">
            <br>
            <br>
          <h3 clas="text-white">SPES Application Form</h3>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detailed Profile</h3>
            </div>
              <div class="box-body">
                
              <!--ROW 1-->
              <div class="row">
                <div class="col-lg-3">
                <div class="form-group">
                  <label for="">Surname:</label>
                  <input type="text" class="form-control" value="<?php echo $_SESSION["l"]?>" name="surname" required>
                </div>
                </div>
                <div class="col-lg-2">
                <div class="form-group">
                  <label for="">First Name:</label>
                  <input type="text" class="form-control" value="<?php echo $_SESSION["f"]?>" name="fname" required>
                </div>
                </div>
                <div class="col-lg-3">
                <div class="form-group">
                  <label for="">Middle Name:</label>
                  <input type="text" class="form-control" value="<?php echo $_SESSION["m"]?>" name="mname" required>
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                  <label for="">GSIS Beneficiary/Relationship:</label>
                  <input type="text" class="form-control" name="gsis_benefitiary" required>
                </div>
                </div>
              </div>

              <!--ROW 2-->
              <div class="row">
                <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Date of Birth:</label>
                  <input type="date" class="form-control" name="birthday" required>
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Place of Birth:</label>
                  <input type="text" class="form-control" name="place_birth" required>
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Citizenship:</label>
                  <input type="text" class="form-control" name="citizenship" required>
                </div>
                </div>
              </div>

              <!--ROW 3-->
              <div class="row">
                <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Contact no.:</label>
                  <input type="text" class="form-control" value="<?php echo $_SESSION["contact_no"]?>" name="contact" required>
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Email Address:</label>
                  <input type="email" value="<?php echo $_SESSION["email"]?>" class="form-control" name="email" required>
                </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                  <label for="">Social Media Account:</label><span><small>(FACEBOOK, TWITTER, INSTAGRAM etc.)</small></span>
                  <input type="text" class="form-control" name="social" required>
                </div>
                </div>
              </div>

              <!--ROW 4-->
              <div class="row">
                <div class="col-lg-3">
                <div class="form-group">
                 <label for="">Status</label>
                 <select name="status" class="form-control" required>
                   <option value="Select" disabled>Select</option>
                   <option value="Single">Single</option>
                   <option value="Married">Married</option>
                   <option value="Widow/er">Widow/er</option>
                   <option value="Separated">Separated</option>
                 </select>
                </div>
                </div>
                <div class="col-lg-3">
                <label for="">Sex</label>
                 <select name="sex" class="form-control" required>
                   <option value="Select" disabled>Select</option>
                   <option value="Male">Male</option>
                   <option value="Female">Female</option>
                 </select>
                </div>
                <div class="col-lg-3">
                <label for="">Type</label>
                 <select name="type" class="form-control" required>
                   <option value="Select" disabled>Select</option>
                   <option value="Student">Student</option>
                   <option value="ALS Student">ALS Student</option>
                   <option value="Out of School">Out of School</option>
                 </select>
                </div>
                <div class="col-lg-3">
                <label for="">Current Status of Parents</label>
                 <select name="parent_status" class="form-control" required>
                   <option value="Select" disabled>Select</option>
                   <option value="Living together">Living together</option>
                   <option value="Solo Parent">Solo Parent</option>
                   <option value="Separated">Separated</option>
                   <option value="Person with Disability">Person with Disability</option>
                   <option value="Senior Citizen">Senior Citizen</option>
                   <option value="Sugar Plantation Worker">Sugar Plantation Worker</option>
                   <option value="Indigenous People">Indigenous People</option>
                   <option value="Displace Worker">Displace Worker</option>
                   <option value="OFW">OFW</option>
                 </select>
                </div>
              </div>

              <!--ROW 5-->
              <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="">Present Address:</label>
                  <input type="text" class="form-control" name="present_add" required>
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="">Permanent Address:</label>
                  <input type="text" class="form-control" name="permanent_add" required>
                </div>
                </div>
              </div>

              <!--ROW 6-->
              <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="">Fathers Name:</label>
                  <input type="text" class="form-control" name="fathers_name" required>
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="">Mothers Name:</label>
                  <input type="text" class="form-control" name="mothers_name" required>
                </div>
                </div>
              </div>

              <!--ROW 6-->
              <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="">Occupation:</label>
                  <input type="text" class="form-control" name="fathers_occupation" required>
                </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                  <label for="">Occupation:</label>
                  <input type="text" class="form-control" name="mothers_occupation" required>
                </div>
                </div>
              </div>
      
              
              <!--ROW 8-->
              <h4>Elementary</h4>
              <div class="row">
                <div class="col-lg-3">
                   <div class="form-group">
                     <label for="">Name of School</label>
                   <input type="text" class="form-control" name="elementary_school" required>
                   </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Degree earned/Course</label>
                    <input type="text" class="form-control" name="elementary_course" required>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Year/Level</label>
                    <input type="text" class="form-control" name="elementary_level" required>
                   </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="">Date of Attendance</label>
                  <input type="date" class="form-control" name="elementary_date_attendance" required>
                  </div>
                </div>
              </div>

              <!--ROW 9-->
              <h4>Secondary</h4>
              <div class="row">
                <div class="col-lg-3">
                   <div class="form-group">
                     <label for="">Name of School</label>
                     <input type="text" class="form-control" name="secondary_school" required>
                   </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Degree earned/Course</label>
                      <input type="text" class="form-control" name="secondary_course" required>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Year/Level</label>
                      <input type="text" class="form-control" name="secondary_level" required>
                   </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="">Date of Attendance</label>
                    <input type="date" class="form-control" name="secondary_date_attendance" required>
                  </div>
                </div>
              </div>

              <!--ROW 10-->
              <h4>Tertiary</h4>
              <div class="row">
                <div class="col-lg-3">
                   <div class="form-group">
                     <label for="">Name of School</label>
                     <input type="text" class="form-control" name="tertiary_school" required>
                   </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Degree earned/Course</label>
                      <input type="text" class="form-control" name="tertiary_course" required>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Year/Level</label>
                      <input type="text" class="form-control" name="tertiary_level" required>
                   </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="">Date of Attendance</label>
                    <input type="date" class="form-control" name="tertiary_date_attendance" required>
                  </div>
                </div>
              </div>

              <!--ROW 11-->
              <h4>Tech-Voc</h4>
              <div class="row">
                <div class="col-lg-3">
                   <div class="form-group">
                     <label for="">Name of School</label>
                     <input type="text" class="form-control" name="tech_school">
                   </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Degree earned/Course</label>
                      <input type="text" class="form-control" name="tech_course">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                      <label for="">Year/Level</label>
                      <input type="text" class="form-control" name="tech_level" >
                   </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="">Date of Attendance</label>
                    <input type="date" class="form-control" name="tech_date_attendance">
                  </div>
                </div>
              </div>

              <div>
                <h4>Documentary Requirements</h4>
              <div class="form-group">
                  <label for="exampleInputFile">2x2 ID Picture (Accept jpg, jpeg, and png only)</label>
                  <input type="file" name="file1" accept=".png,.jpg,.jpeg" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Birth Certificate (Accept pdf only)</label>
                  <input type="file" name="file2" accept=".pdf" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">ITR/Cert. Indigency (Accept pdf only)</label>
                  <input type="file" name="file3" accept=".pdf" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Grades/Cert. OSY (Accept pdf only)</label>
                  <input type="file" name="file4" accept=".pdf" required>
                </div>
              </div>
             
              <hr>

              <div class="row">
                <div class="col-lg-6">
                   <div class="form-group">
                     <label for="">Skills</label>
                     <input type="text" class="form-control" name="skills" required>
                   </div>
                </div>
                <div class="col-lg-3">
            
                </div>
                <div class="col-lg-3">
     
                </div>
              </div>
                 
              <div>
                <table width="100%">
                   <tr>
                     <th></th>
                     <th>History of SPES Availment/Name of Establishment<br><br></th>                 
                     <th>Year<br><br></th>
                     <th>SPES ID NO. (if applicable)<br><br></th>
                   </tr>
                   <tr>
                     <td>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="1st" value="1st Availment" name="1st">1st Availment
                        </label>               
                     </td>
                     <td>
                       <input type="text" class="form-control" name="1history">
                     </td>
                     <td>
                     <select class="form-control" name="1year">
                         <option value="1996-1997">1996-1997</option>
                         <option value="1998-1999">1998-1999</option>
                         <option value="2000-2001">2000-2001</option>
                         <option value="2002-2003">2002-2003</option>
                         <option value="2004-2005">2004-2005</option>
                         <option value="2006-2007">2006-2007</option>
                         <option value="2008-2009">2008-2009</option>
                         <option value="2010-2011">2010-2011</option>
                         <option value="2012-2013">2012-2013</option>
                         <option value="2014-2015">2014-2015</option>
                         <option value="2016-2017">2016-2017</option>
                         <option value="2018-2019">2018-2019</option>
                         <option value="2020-2021">2020-2021</option>
                         <option value="2022-2023">2022-2023</option>
                         <option value="2024-2025">2024-2025</option>
                       </select>
                     </td>
                     <td>                  
                        <input type="text" class="form-control" name="1spesid">
                     </td>
                   </tr>
                   <tr>
                     <td>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="2nd Availment" id="2nd" name="2nd">2nd Availment
                        </label>               
                     </td>
                     <td>
                       <input type="text" class="form-control" name="2history">
                     </td>
                     <td>
                     <select class="form-control" name="2year">
                         <option value="1996-1997">1996-1997</option>
                         <option value="1998-1999">1998-1999</option>
                         <option value="2000-2001">2000-2001</option>
                         <option value="2002-2003">2002-2003</option>
                         <option value="2004-2005">2004-2005</option>
                         <option value="2006-2007">2006-2007</option>
                         <option value="2008-2009">2008-2009</option>
                         <option value="2010-2011">2010-2011</option>
                         <option value="2012-2013">2012-2013</option>
                         <option value="2014-2015">2014-2015</option>
                         <option value="2016-2017">2016-2017</option>
                         <option value="2018-2019">2018-2019</option>
                         <option value="2020-2021">2020-2021</option>
                         <option value="2022-2023">2022-2023</option>
                         <option value="2024-2025">2024-2025</option>
                       </select>
                     </td>
                     <td>                  
                        <input type="text" class="form-control" name="2spesid">
                     </td>
                   </tr>
                   <tr>
                     <td>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="3rd Availment" id="3rd" name="3rd">3rd Availment
                        </label>               
                     </td>
                     <td>
                       <input type="text" class="form-control" name="3history">
                     </td>
                     <td>
                     <select class="form-control" name="3year">
                         <option value="1996-1997">1996-1997</option>
                         <option value="1998-1999">1998-1999</option>
                         <option value="2000-2001">2000-2001</option>
                         <option value="2002-2003">2002-2003</option>
                         <option value="2004-2005">2004-2005</option>
                         <option value="2006-2007">2006-2007</option>
                         <option value="2008-2009">2008-2009</option>
                         <option value="2010-2011">2010-2011</option>
                         <option value="2012-2013">2012-2013</option>
                         <option value="2014-2015">2014-2015</option>
                         <option value="2016-2017">2016-2017</option>
                         <option value="2018-2019">2018-2019</option>
                         <option value="2020-2021">2020-2021</option>
                         <option value="2022-2023">2022-2023</option>
                         <option value="2024-2025">2024-2025</option>
                       </select>
                     </td>
                     <td>                  
                        <input type="text" class="form-control" name="3spesid">
                     </td>
                   </tr>
                   <tr>
                     <td>
                        <label class="checkbox-inline">
                            <input type="checkbox" value="4th Availment" id="4th" name="4th">4th Availment
                        </label>               
                     </td>
                     <td>
                       <input type="text" class="form-control" name="4history">
                     </td>
                     <td>
                       <select class="form-control" name="4year">
                         <option value="1996-1997">1996-1997</option>
                         <option value="1998-1999">1998-1999</option>
                         <option value="2000-2001">2000-2001</option>
                         <option value="2002-2003">2002-2003</option>
                         <option value="2004-2005">2004-2005</option>
                         <option value="2006-2007">2006-2007</option>
                         <option value="2008-2009">2008-2009</option>
                         <option value="2010-2011">2010-2011</option>
                         <option value="2012-2013">2012-2013</option>
                         <option value="2014-2015">2014-2015</option>
                         <option value="2016-2017">2016-2017</option>
                         <option value="2018-2019">2018-2019</option>
                         <option value="2020-2021">2020-2021</option>
                         <option value="2022-2023">2022-2023</option>
                         <option value="2024-2025">2024-2025</option>
                       </select>
                     </td>
                     <td>                  
                        <input type="text" class="form-control" name="4spesid">
                     </td>
                   </tr>
                </table>
              </div>
              <hr>
              <div class="checkbox">
                  <label>
                    <input type="checkbox" required> I hereby attest that the information above are true and correct to the best of my knowledge, including the attach documents/requirements which I also attest as to thier veracity. I agree that any false statement would cause the automatic disqualification/cancellation of the service/ contract/ grant/ and I shall refund ammount received and/ or pay damages to DOLE or comply with other sanctions in accordance with law. Any material change in my financial status may effect my eligibility to continue the program.
                </div>


              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="appBtn">Submit</button>
              </div>
          </div>
          </form>
           <?php } ?>
          
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
          if (result === "Empty") {
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

    setInterval(() => {
      $("#refresh").html();
    }, 1000);
</script>

</body>
</html>
