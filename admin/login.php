<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php require_once "shared/link.php";?>
  <style>
    .login-page{
      background-image: url("../dist/img/bg.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
   }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#">
    <center> <img src="../dist/img/spes.png" alt="logo" width="110px"></center>
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <center><h3 class="text-purple">Administrator</h3></center>
    <br>
     <div id="validate"></div>
    <form action="function/login.php" method="POST">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" value="<?php if(isset($_SESSION["username"])) {
          echo $_SESSION["username"];
          unset($_SESSION["username"]);
        }?>" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?php
      if (isset($_SESSION["notFound"])){?>
        <span class="text-red">Username not found.</span>
      <?php unset($_SESSION["notFound"]);} ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" value="<?php if(isset($_SESSION["password"])) {
          echo $_SESSION["password"];
          unset($_SESSION["password"]);
        }?>" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php
      if (isset($_SESSION["invalidPass"])){?>
        <span class="text-red">Invalid password.</span>
      <?php unset($_SESSION["invalidPass"]);} ?>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" name="loginBtn" class="btn bg-purple btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php require_once "shared/script.php";?>
</body>
</html>
