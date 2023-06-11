<?php
 session_start();
 require_once "config/config.php";
 require_once "config/getClass.php";
 require_once "config/spesClass.php";
 $con = new spes();
 $get_control_no = $_SESSION["control_no"];

   $sql = "SELECT
   application.application_id,
   application.control_no,
   application.fname,
   application.mname,
   application.lname,
   application.birthday,
   application.birth_place,
   application.`address`,
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
   application.date
   FROM
   application
   WHERE control_no = '$get_control_no'";
   $query = $con->con()->query($sql);
   if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()){
        $control_no = $row["control_no"];
        $status = $row["status"];
        $fname = $row["fname"];
        $mname = $row["mname"];
        $lname = $row["lname"];
        $birthday = $row["birthday"];
        $birth_place = $row["birth_place"];
        $address = $row["address"];
        $age = $row["age"];
        $sex = $row["sex"];
        $religion = $row["religion"];
        $barangay = $row["barangay"];
        $street = $row["street"];
        $sitio = $row["sitio"];
        $father_n = $row["fathers_name"];
        $father_occu = $row["fathers_occupation"];
        $mother_n = $row["mothers_name"];
        $mother_occu = $row["mothers_occupation"];
      } 
    }else {
      header("location: pcur");
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
    <link rel="stylesheet" href="plugins\magic-master\dist\magic.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-purple layout-top-nav">
    <!--loader-->
    <div class="overlays"><span class="spin"><img src="dist/img/preloader_3.gif" alt=""></span></div>
    <div class="wrapper">

        <?php require_once "shared/header.php"?>
        <!-- Full Width Column -->
        <div class="content-wrapper">
            <div class="container">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="row">
                        <div class="col-md-12">
           
  

                            <?php if (isset($_GET["profile"])) {?>
                            <div class="box box-solid">
                                <div class="box-body">
                                    <b>Application Status:</b>
                                    <span class="labels"><?php echo $status?></span>
                                </div>
                            </div>
                            <?php }?>
                            <form action="save.php" method="post">
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Application Details <?php if (isset($_GET["profile"])) {?>
                                            <a href="profile?edit-profile" class="btn btn-primary btn-sm f-right"><i
                                                    class="fa fa-edit"></i> Edit</a>
                                            <?php }elseif(isset($_GET["edit-profile"])){?>
                                            <button type="submit" class="btn btn-success btn-sm"><i
                                                    class="fa fa-edit"></i> Save Changes</button>
                                            <?php }?>
                                        </h3>
                                    </div>
                              
                                    <?php
                                if (isset($_GET["profile"])) {?>
                                <div class="row">
                                     <div clas="col-sm-3">
                                         
                                     </div>
                                     <div class="col-sm-9">

                                     </div>
                                </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <dl class="dl-horizontal">


                                                    <dt>First Name:</dt>
                                                    <dd><?php echo $fname?></dd>

                                                    <dt>Middle Name:</dt>
                                                    <dd><?php echo $mname?></dd>

                                                    <dt>Last Name:</dt>
                                                    <dd><?php echo $lname?></dd>

                                                    <dt>Birth Day:</dt>
                                                    <dd><?php echo $birthday?></dd>

                                                    <dt>Birth Place:</dt>
                                                    <dd><?php echo $birth_place?></dd>

                                                    <dt>Address:</dt>
                                                    <dd><?php echo $address?></dd>

                                                    <dt>Age:</dt>
                                                    <dd><?php echo $age?></dd>

                                                    <dt>Gender:</dt>
                                                    <dd><?php echo $sex?></dd>

                                                    <dt>Religion:</dt>
                                                    <dd><?php echo $religion?></dd>

                                                    <dt>Brangay:</dt>
                                                    <dd><?php echo $barangay?></dd>

                                                    <dt>Street:</dt>
                                                    <dd><?php echo $street?></dd>

                                                </dl>
                                            </div>
                                            <div class="col-lg-6">
                                                <dl class="dl-horizontal">
                                                    <dt>Fathers Name:</dt>
                                                    <dd><?php echo $father_n?></dd>

                                                    <dt>Fathers Occupation:</dt>
                                                    <dd><?php echo $father_occu?></dd>

                                                    <dt>Mothers Name:</dt>
                                                    <dd><?php echo $mother_n?></dd>

                                                    <dt>Mothers Occupation:</dt>
                                                    <dd><?php echo $mother_occu?></dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>


                                    <?php }
                                    
                                    elseif(isset($_GET["edit-profile"])){?>

                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-lg-6">

                                                <dl class="dl-horizontal">
                                                    <dt>First Name:</dt>
                                                    <dd><input type="text" class="form-control"
                                                            value="<?php echo $fname?>" required></dd>

                                                    <dt>Middle Name:</dt>
                                                    <dd><input type="text" class="form-control"
                                                            value="<?php echo $mname?>" required></dd>

                                                    <dt>Last Name:</dt>
                                                    <dd><input type="text" class="form-control"
                                                            value="<?php echo $lname?>" required></dd>

                                                    <dt>Birth Day:</dt>
                                                    <dd><input type="date" class="form-control"
                                                            value="<?php echo $birthday?>" required></dd>

                                                    <dt>Birth Place:</dt>
                                                    <dd><input type="text" class="form-control"
                                                            value="<?php echo $birth_place?>" required></dd>

                                                    <dt>Address:</dt>
                                                    <dd><input type="text" class="form-control"
                                                            value="<?php echo $address?>" required></dd>

                                                    <dt>Age:</dt>
                                                    <dd><input type="text" class="form-control"
                                                            value="<?php echo $age?>" required></dd>

                                                    <dt>Gender:</dt>
                                                    <dd><input type="text" class="form-control"
                                                            value="<?php echo $sex?>" required></dd>

                                                    <dt>Religion:</dt>
                                                    <dd><input type="text" class="form-control"
                                                            value="<?php echo $religion?>" required></dd>

                                                    <dt>Brangay:</dt>
                                                    <dd><input type="text" class="form-control"
                                                            value="<?php echo $barangay?>" required></dd>

                                                    <dt>Street:</dt>
                                                    <dd><input type="text" class="form-control"
                                                            value="<?php echo $street?>" required></dd>

                                                </dl>
                                            </div>
                                            <div class="col-lg-6">
                                                <dl class="dl-horizontal">
                                                    <dt>Fathers Name:</dt>
                                                    <dd><input type="text" class="form-control"
                                                            value="<?php echo $father_n?>" required></dd>

                                                    <dt>Fathers Occupation:</dt>
                                                    <dd><input type="text" class="form-control"
                                                            value="<?php echo $father_occu?>" required></dd>

                                                    <dt>Mothers Name:</dt>
                                                    <dd><input type="text" class="form-control"
                                                            value="<?php echo $mother_n?>" required></dd>

                                                    <dt>Mothers Occupation:</dt>
                                                    <dd><input type="text" class="form-control"
                                                            value="<?php echo $mother_occu?>" required></dd>
                                                </dl>
                                            </div>

                                        </div>
                                    </div>

                                    <?php }
                                ?>

                                    <!-- /.box-body -->
                                </div>
                            </form>





                            <?php if (isset($_GET["profile"])) {?>
                                <div class="box box-solid">
                                <div class="box-body">
                                    <table class="table-condensed">
                                        <h4 class="text-purple">Requirements Uploaded</h4>
                                        <?php 
                                        $sql = "SELECT
                                        requirements.req_id,
                                        requirements.applicant_id,
                                        requirements.file_name,
                                        requirements.uploaded_on,
                                        requirements.`status`
                                        FROM
                                        requirements WHERE applicant_id = '$get_control_no'
                                        ";
                                        
                                        $query = $con->con()->query($sql);
                                        if ($query->num_rows > 0) {
                                            while ($row = $query->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td>
                                                <a><i class="fa fa-file-pdf-o fa-lg text-red"></i> <a href="#" class=""
                                                    data-toggle="modal"
                                                    data-target="#<?php echo $row["req_id"]?>"><?php echo $row["file_name"]?></a>
                                                <span></span>
                                            </td>
                                        </tr>
                                        <?php }} ?>
                                    </table>
                                </div>
                            </div>
                            <?php }?>

                            <?php if(isset($_GET["profile"])) {?>
                                <section>
    <?php 
              $sql = "SELECT
              requirements.req_id,
              requirements.applicant_id,
              requirements.file_name,
              requirements.uploaded_on,
              requirements.`status`
              FROM
              requirements WHERE applicant_id = '$get_control_no'
              ";
              
              $query = $con->con()->query($sql);
              if ($query->num_rows > 0) {
                 while ($row = $query->fetch_assoc()) {?>
              
                   <div class="modal fade" id="<?php echo $row["req_id"]?>">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content bg-purple">
                        <div class="modal-body">
                          <embed src="uploads\<?php echo $row["file_name"]?>" width="100%" height="550px">
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>

              <?php }} ?>
      
    </section>
                            <?php } ?>


                        </div>
                    </div>
                </section>
                <section>
                    <div class="modal fade" id="modal-edit">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Update profile</h4>
                                </div>
                                <form id="form-profile">
                                    <div class="modal-body">

                                        <h4 class="text-green" id="msgUpdate"></h4>
                                        <form>
                                            <div id="hide-me">
                                                <input type="hidden" class="form-control" id="control-no"
                                                    name="control_no">

                                                <div class="form-group">
                                                    <label for="">Firstname:</label>
                                                    <input type="text" class="form-control" id="fname" name="fname"
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Middle Name:</label>
                                                    <input type="text" class="form-control" id="mname" name="mname"
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Lastname:</label>
                                                    <input type="text" class="form-control" id="lname" name="lname"
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Sex:</label>
                                                    <select name="sex" id="" class="form-control">
                                                        <option value="select" disabled>Select Sex</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>



                                                <div class="form-group">
                                                    <label for="">Email:</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Contact No:</label>
                                                    <input type="number" class="form-control" id="contact_no"
                                                        name="contact_no" required>
                                                </div>


                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default pull-left"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn bg-purple"
                                                id="btnUpdateProfile">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
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
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script>
    $(window).on("load", function() {
        $(".overlays").fadeOut("slow");
    });

    $(document).ready(function() {
        //start

        $("#btnEditProfile").on("click", function() {
            var cn = $(this).val();
            $.ajax({
                url: "admin/function/get_profile.php",
                type: "POST",
                data: {
                    control_no: cn
                },
                success: function(data) {
                    let getdata = JSON.parse(data);
                    $("#control-no").val(getdata.control_no);
                    $("#fname").val(getdata.fname);
                    $("#mname").val(getdata.mname);
                    $("#lname").val(getdata.lname);
                    $("#sex").val(getdata.sex);
                    $("#email").val(getdata.email);
                    $("#contact_no").val(getdata.contact_no);
                }
            })
        });

        $("#btnUpdateProfile").on("click", function() {
            $.ajax({
                url: "admin/function/update_profile.php",
                type: "POST",
                data: $("#form-profile").serialize(),
                success: function(response) {
                    $("#hide-me").hide();
                    $("#msgUpdate").text("Success Update.");
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                }
            })
        });

        $("#btnUpdatePassword").on("click", function() {
            var newPassword = $("#newPassword").val();
            $.ajax({
                url: "admin/function/update_password.php",
                type: "POST",
                data: {
                    newPass: newPassword
                },
                success: function(response) {
                    $("#hide-me").hide();
                    $("#msgSuccess").text("Password Changed.");
                    setTimeout(() => {
                        window.location = "admin/function/logout2.php";
                    }, 2000);
                }
            })
        });


        //end
    })
    </script>
    <script>
    $(function() {
        let elementspan = $(".labels").html();
        if (elementspan == "Approved") {
            $(".labels").addClass("label bg-green");
            $(".btn-primary").hide();
        } else {
            $(".labels").addClass("label bg-red");
        }
    })
    </script>
</body>

</html>