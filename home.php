<?php 
 session_start();
 require_once "config/config.php";
 
 $sql = "SELECT * FROM application_limit WHERE limit_status = 'open'";
        $limit_no = "";
         $query = $con->query($sql);
        if ($query->num_rows > 0) {
          while ($row = $query->fetch_assoc()) {
           $limit_stat = $row["limit_status"];
           $limit_no   = $row["limit_no"];
      }
    }

    $trigger="";
    $title="";
$sql3 = "SELECT * FROM `announcement` WHERE ann_id = '1'";
$query3 = $con->query($sql3);
if ($query3->num_rows > 0) {
  while ($row3 = $query3->fetch_assoc()) {
    $trigger = $row3["ann_status"];
    $title = $row3["title"];
    $body = $row3["announce"];
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
  <link rel="stylesheet" href="plugins\magic-master\dist\magic.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="dist/css/spes.css">
  <link rel="stylesheet" href="plugins\toaster\toastr.css">
  <style>
    .announcement{
      position: absolute;
      z-index: 99;
      width: 95%;
    }
  </style>

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-purple layout-top-nav">
<div class="overlays"><span class="spin"><img src="dist/img/preloader_3.gif" alt=""></span></div>
<div class="wrapper">

  <?php require_once "shared/header.php"?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="row">
          <div class="col-md-6 magictime slideLeftReturn">
            <br>
            <br>
            <br>
            <h1 class="text-white spes">SPES</h1>
            <p class="text-white sub-title">Special Program for Employment of Students</p>
            <div id="refresh">
            <?php
            
            if (isset($_SESSION["email"])) {?>
              <!--<a href="application" class="btn btn-md bg-purple">Go to Application Form <i class="fa fa-chevron-right"></i></a>-->
            <?php } elseif ($limit_no > 0){?>
              <a href="register" class="btn btn-md btn-warning">Register SPES</a>&nbsp;<a href="login" class="btn btn-md btn-success"><i class="fa fa-sign-in"></i> Sign in</a>
            <?php }elseif($limit_no <= 0){?>
              <button class="btn btn-md btn-warning disabled"><i class="fa fa-refresh fa-spin"></i> Register SPES<span class="text-red"> (CLOSED)</span></button>&nbsp;<a href="login" class="btn btn-md btn-success"><i class="fa fa-sign-in"></i> Sign in</a>
            <?php } ?>
            </div>
          </div>
          <div class="col-md-6">


           <?php
            if(isset($_SESSION["status"])){
              if ($_SESSION["status"] == "Applied") {?>
                
             <?php }
            } elseif ($limit_no > 0) {?>
              <div class="alert alert-warning alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                 <h4><i class="icon fa fa-info"></i>Were are now open for SPES Registration</h4>
                 <span>Available Slots for 2022 - 2023 </span> <span><strong>(<?php echo $limit_no;?> Left)</strong></span> 
               </div>
             <br>
            <?php } elseif ($limit_no <= 0) {?>
             <div class="alert alert-warning alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                 <h4><i class="icon fa fa-info"></i>Sorry, SPES Registration was Temporary Closed</h4>
                 <span><i><strong>NO Slots Available</strong></i></span> 
               </div>
             <br>
            <?php }
           ?>
              


               <?php
                 if ($trigger == 1) {?>
                   <div class="alert alert-success alert-dismissible announcement">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-info"></i> Announcement</h4>
                      <label><strong><?php echo $title;?></strong></label> <br>
                      <article>
                        <p><?php echo $body;?></p>
                      </article>
                    </div>
                 <?php } else {?>

                 <?php }
                 
               ?>



            <center><img src="dist/img/1.png" width="" class="magictime slideRightReturn"></center>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once "shared/footer.php"?>
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins\toaster\toastr.min.js"></script>
<script>
  $(window).on("load", function () {
    $(".overlays").fadeOut("slow");
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
