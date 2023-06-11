                  
<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="home.php"><img src="dist\img\spes.png" width="50px"></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="home">Home</a></li>
            <!--<li><a href="qualification">Qualifications</a></li>-->
            <li><a href="about">About Us</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!--<li class=""><a href="register" class="bg-maroon p-0">Register</a></li>-->
            <?php
            if (isset($_SESSION["uname"])) {?>
              <li class="dropdown user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <?php
                  $session_stud_id  = $_SESSION["student_id"];
                  include "config/config.php";
                  if (isset($_SESSION["student_id"])) {
                    $sql = "SELECT * FROM application_image WHERE student_id = '$session_stud_id'";
                  $query = $con->query($sql);
                  if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {?>
                      <img src="<?php echo $row["filename"]?>" class="user-image" alt="User Image">
                  <?php }
                  }else {?>
                    <img src="dist\img\avatar5.png" class="user-image" alt="User Image">
                 <?php }
                  }
                  ?>
              
              <span class="hidden-xs"><?php echo $_SESSION["uname"]?></span>
            </a>
            <ul class="dropdown-menu" style="width: auto;">
                <li><a href="profile">Profile</a></li>
                <li><a href="docs">Required Docs</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modal-salary-view">View Salary</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modal-cp">Change Password</a></li>
                <li><a href="admin/function/logout2.php">Sign Out</a></li>
              </ul>
          </li>
            <?php }
            else {?>
               <!--<li class="bg-navy"><a href="login" class=""><i class="fa fa-arrow-circle-right"></i> Login</a></li>-->
            <?php } ?>
            
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>

  <section>
  <div class="modal fade" id="modal-cp">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Change Password</h4>
              </div>
              <div class="modal-body">
                <h3 id="msgSuccess" class="text-green"></h3>
        
                <div id="hide-me">
                 <input type="text" class="form-control" placeholder="Enter Old Password" id="oldPassword"><br>
                 <input type="text" class="form-control" placeholder="Enter new password" id="newPassword" required>
                </div>
              </div>
              <div class="modal-footer">
  
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-purple" id="btnUpdatePassword">Submit</button>
               
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-salary-view">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">View Salary</h4>
              </div>
              <div class="modal-body">
              <form id="form-search">
                <div class="form-group">
                  <select name="q" id="" class="form-control">
                    <option value="Select" selected disabled>Select Year</option>
                      <?php
                        $filter = $_SESSION["student_id"];
                        $sql = "SELECT  *, salary.date_created as sal_date
                        FROM
                        salary
                        INNER JOIN salary_beneficiary ON salary_beneficiary.salary_id = salary.salary_id
                        INNER JOIN application ON salary_beneficiary.`name` = application.student_id
                        WHERE `student_id` = '$filter' GROUP BY salary.date_created";
                
                         $query = $con->query($sql);
                         if ($query->num_rows > 0) {
                          
                           while ($row = $query->fetch_assoc()) {
                            $OldDate = date("Y",strtotime($row["sal_date"]));?>
                            <option value="<?php echo $row["sal_date"]?>" selected><?php echo $OldDate;?></option>
                          <?php }
                         }
                      ?>
                  </select>
                </div>
              </form>
              <div id="search-result">
                
              </div>
              </div>
              <div class="modal-footer">
  
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning" id="reset">Reset</button>
                <button type="button" class="btn bg-purple" id="btn-search">Submit</button>
               
              </div>
            </div>
          </div>
        </div>
  </section>
