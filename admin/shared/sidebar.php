<style>
  span#typen {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/spes.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p id="user"><?php echo ucfirst($_SESSION["user"]);?> <div id="typen"></div></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php
         if (isset($_SESSION["type"])) {
           if ($_SESSION["type"]=="1") {?>
             <li id="dashboard"><a href="dashboard"><i class="fa fa-circle-o"></i> Dashboard</a></li>
        <li class="treeview" id="stud-applicants">
          <a href="#">
            <i class="fa fa-circle-o"></i> <span>Manage Student Applicants</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li id="pending" class="" id="pending">
          <a href="pending">
            <i class="fa fa-circle-o"></i> <span>Pending</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow"><?php
                $sql = "SELECT
                application.`application_status`
                FROM
                application WHERE `application_status` = 'Pending'
                ";
                $query = $con->con()->query($sql);
                $count = $query->num_rows;
                echo $count;
              ?></small>
            </span>
          </a>
        </li>
        <li id="approved">
          <a href="approved">
            <i class="fa fa-circle-o"></i> <span>Approved</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php
                $sql = "SELECT
                application.`application_status`
                FROM
                application WHERE application_status = 'Approved'
                ";
                $query = $con->con()->query($sql);
                $count = $query->num_rows;
                echo $count;
              ?></small>
            </span>
          </a>
        </li>
        <li id="reject">
          <a href="rejected">
            <i class="fa fa-circle-o"></i> <span>Dis-approved</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php
                $sql = "SELECT
                application.`application_status`
                FROM
                application WHERE application_status = 'Dis-approved'
                ";
                $query = $con->con()->query($sql);
                $count = $query->num_rows;
                echo $count;
              ?></small>
            </span>
          </a>
        </li>
       </ul>
        </li>

         
          <li id="salary"><a href="salary"><i class="fa fa-circle-o"></i> Salary</a></li>
          <li class="treeview" id="accounts">
          <a href="#">
            <i class="fa fa-circle-o"></i> <span>Users Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li id="users">
          <a href="users">
            <i class="fa fa-circle-o"></i> <span>Admin</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow"><?php
                $sql = "SELECT *
                FROM
                users                
                WHERE `user_type`='1' AND fname != 'default'";
                $query = $con->con()->query($sql);
                $count = $query->num_rows;
                echo $count;
              ?></small>
            </span>
          </a>
        </li>
        <li id="stud">
          <a href="user_stud">
            <i class="fa fa-circle-o"></i> <span>Student</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php
                $sql = "SELECT *
                FROM
                student                
                ";
                $query = $con->con()->query($sql);
                $count = $query->num_rows;
                echo $count;
              ?></small>
            </span>
          </a>
        </li>
          </ul>
        </li>
          <li id="report"><a href="#" data-toggle="modal" data-target="#modal-report"><i class="fa fa-circle-o"></i> Report</a></li>
          <li id="announce"><a href="#" data-toggle="modal" data-target="#modal-announce"><i class="fa fa-circle-o"></i> Announcement</a></li>
           <?php 
          }if ($_SESSION["type"]=="3") {?>
            <li class="treeview" id="accounts">
          <a href="#">
            <i class="fa fa-circle-o"></i> <span>Users Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li id="users">
          <a href="users">
            <i class="fa fa-circle-o"></i> <span>Admin</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow"><?php
                $sql = "SELECT *
                FROM
                users                
                WHERE `user_type`='1'";
                $query = $con->con()->query($sql);
                $count = $query->num_rows;
                echo $count;
              ?></small>
            </span>
          </a>
        </li>
        <li id="stud">
          <a href="user_stud">
            <i class="fa fa-circle-o"></i> <span>Student</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php
                $sql = "SELECT *
                FROM
                student                
                ";
                $query = $con->con()->query($sql);
                $count = $query->num_rows;
                echo $count;
              ?></small>
            </span>
          </a>
        </li>
          </ul>
        </li>
          <?php }
         }
        ?>
        
        <li class="header">OTHERS</li>
        <li><a href="#" data-toggle="modal" data-target="#modal-logout"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <form action="function/report.php" target="_blank" method="POST">
  <div class="modal fade" id="modal-report">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Report</h4>
              </div>
              <div class="modal-body">
              <div class="form-group">
                  <label for="" class="col-sm-2 control-label">From:</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="from">
                  </div>
                </div><br><br>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">To:</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="to">
                  </div>
                </div><br><br>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Select:</label>
                  <div class="col-sm-10">
                  <select name="status" id="report" class="form-control">
                    <option value="Pending">Pending Applicants</option>
                    <option value="Approved">Approved Applicants</option>
                    <option value="Dis-approved">Dis-approved Applicants</option>
                    </select>
                  </div>
                </div><br><br>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Select:</label>
                  <div class="col-sm-10">
                  <select name="option" id="report" class="form-control">
                    <option value="all">All</option>
                    <option value="current">Current</option>
                    </select>
                  </div>
                </div>
                <br>
              </div>
              <div class="modal-footer">
               
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-purple" name="submit">Submit</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>

<div class="modal fade" id="modal-logout">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirmation!</h4>
              </div>
              <div class="modal-body">
                <center><h3>Proceed to Logout?</h3></center>
              </div>
              <div class="modal-footer">
        
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <a href="function/logout2.php" class="btn bg-purple" name="submit">Logout</a>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>




        
        

        <?php
   

         $sql = "SELECT * FROM announcement";
         $query = $con->con()->query($sql);
         if ($query->num_rows > 0) {
           $row = $query->fetch_assoc();?>
           <div class="modal fade in" id="modal-announce">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Announcement</h4>
              </div>
              <div class="modal-body">
          
                 <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" class="form-control" value="<?php echo $row["title"]?>" disabled>
                </div>
                <div class="form-group">
                  <label for="">Announcement</label>
                  <textarea class="bgb" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="announce" disabled><?php echo $row["announce"]?></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <div class="btn-group">
                <button type="button" class="btn btn-success" id="on">Enable</button>
                <button type="button" class="btn btn-danger" id="off">Disable</button>
                </div>
                <button type="button" data-toggle="modal" data-target="#modal-announce-update" class="btn btn-primary" data-dismiss="modal">Edit Announcement</button>
              </div>
         
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
         <?php } else {?>

        <?php }?>

        <div class="modal fade in" id="modal-announce-update">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Edit Announcement</h4>
              </div>
              <div class="modal-body">
              <form id="formAnn">
                 <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" class="form-control" id="" value="<?php echo $row["title"]?>" placeholder="Enter title" name="title">
                </div>
                <div class="form-group">
                  <label for="">Announcement</label>
                  <textarea class="bgb" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="announce"><?php echo $row["announce"]?></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAnn">Update</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        