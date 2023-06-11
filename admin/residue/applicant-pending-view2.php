<?php require_once "../config/config.php";
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPES</title>
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
        View
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

       <!--details-->
       <div class="row">
           <div class="col-md-6">
               <h4>Applicants Details</h4>
           </div>
           <div class="col-md-6">
               <table class="table table-hovered">
                   <tr>
                       <th>Name:</th>
                       <td>Bads MACALANGAN</td>
                   </tr>
                   <tr>
                       <th>Address:</th>
                       <td>Poblacion, Kabacan</td>
                   </tr>
                   <tr>
                       <th>Email:</th>
                       <td>macalangan@gmail.com</td>
                   </tr>
                   <tr>
                       <th>Contact NO:</th>
                       <td>094823865345</td>
                   </tr>
               </table>
           </div>
       </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php //require_once "shared/footer.php"?>

</div>
<!-- ./wrapper -->

<?php require_once "shared/script.php"?>
</body>
</html>
