<?php
require_once "spesClass.php";

class getdata extends spes{

    function getusers(){
       $i=1;
        $sql = "SELECT
              users.user_id,
              users.fname,
              users.lname,
              users.username,
              users.`password`,
              users.user_type,
              user_type.type_id,
              user_type.type_name
              FROM
              users
              INNER JOIN user_type ON users.user_type = user_type.type_id
              WHERE `username` != 'admin'";
              
              $query = $this->con->query($sql);
              if ($query->num_rows > 0) {
                 while ($row = $query->fetch_assoc()) {
                
              echo  "<tr>
                        <td>".$i."</td>
                        <td>".ucfirst($row['lname'])."</td>
                        <td>".ucfirst($row['fname'])."</td>
                        <td>".$row['username']."</td>
                        <td>".$row['password']."</td>
                        <td>".ucfirst($row['type_name'])."</td>
                        <td>
                         
                                <button class='btn bg-gray btn-sm edit' id='".$row['user_id']."' data-toggle='modal' data-target='#modal-user-edit'><i class='fa fa-edit'></i> Edit</button>
                                <button class='btn bg-red btn-sm del' id='".$row['user_id']."' data-toggle='modal' data-target='#modal-user-delete'><i class='fa fa-trash'></i> Delete</button>
                         
                        </td>
                    </tr>";
                    $i=$i+1;
                 }

            }
      }

      function getusers2(){
         $i=1;
         $sql = "SELECT
         student.student_id,
         student.control_no,
         student.username,
         student.`password`,
         student.fname,
         student.mname,
         student.lname,
         student.sex,
         student.email,
         student.contact_no,
         student.`status`
         FROM
         student";
               
               $query = $this->con->query($sql);
               if ($query->num_rows > 0) {
                  while ($row = $query->fetch_assoc()) {
                 
               echo  "<tr>
                         <td>".$i."</td>
                         <td>".ucfirst($row['fname'])."</td>
                         <td>".ucfirst($row['mname'])."</td>
                         <td>".ucfirst($row['lname'])."</td>
                         <td>".$row['username']."</td>
                         <td>".$row['password']."</td>
                         <td>
                         
                                <button class='btn bg-red btn-sm del-stud' id='".$row['student_id']."' data-toggle='modal' data-target='#modal-student-delete'><i class='fa fa-trash'></i> Delete</button>
                         
                        </td>
                     </tr>";
                     $i=$i+1;
                  }
 
             }
       }

      function getUserApproved(){
         $i=1;
         $sql = "SELECT * FROM application WHERE application_status = 'Approved'";
         $query = $this->con->query($sql);
         if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
      
         echo "<tr><td>".$i."</td>
                    <td>".$row['application_id']."</td>
                   <td>".ucfirst($row["surname"]).", ".ucfirst($row["firstname"])." ".ucfirst($row["middlename"])."</td>
                   <td>".ucfirst($row["present_add"])."</td>
                   <td>".ucfirst($row["sex"])."</td>
                   <td>".date("M d, Y", strtotime($row["date_approved"]))."</td>
                   <td><span class='label label-success'>".$row["application_status"]."</span></td>
                   <td><a class='btn btn-primary btn-sm' href='view?id=".$row["student_id"]."&".md5($row["id"])."'><i class='fa fa-eye'></i> View details</a></td>

               </tr>";
               $i=$i+1;
       }
    }
}

function getUserRejected(){
   $i=1;
   $sql = "SELECT * FROM application WHERE application_status = 'Dis-Approved'";
              
   $query = $this->con->query($sql);
   if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
     
   echo "<tr><td>".$i."</td>
              <td>".$row['application_id']."</td>
             <td>".ucfirst($row["surname"]).", ".ucfirst($row["firstname"])." ".ucfirst($row["middlename"])."</td>
             <td>".ucfirst($row["present_add"])."</td>
             <td>".ucfirst($row["sex"])."</td>
             <td>".date("M d, Y", strtotime($row["date_created"]))."</td>
             <td><span class='label label-warning'>".$row["application_status"]."</span></td>
             <td><a class='btn btn-primary btn-sm' href='view?id=".$row["student_id"]."&".md5($row["id"])."'><i class='fa fa-eye'></i> Veiw details</a></td>
         </tr>";
         $i=$i+1;
 }
}
   }

   function getUserPending(){
      $i=1;
      $sql = "SELECT * FROM application WHERE application_status = 'Pending'";
              
              $query = $this->con->query($sql);
              if ($query->num_rows > 0) {
                 while ($row = $query->fetch_assoc()) {
                
              echo "<tr><td>".$i."</td>
                         <td>".$row['application_id']."</td>
                        <td>".ucfirst($row["surname"]).", ".ucfirst($row["firstname"])." ".ucfirst($row["middlename"])."</td>
                        <td>".ucfirst($row["present_add"])."</td>
                        <td>".ucfirst($row["sex"])."</td>
                        <td>".date("M d, Y", strtotime($row["date_created"]))."</td>
                        <td><span class='label label-warning'>".$row["application_status"]."</span></td>
                        <td><a class='btn btn-primary' href='applicant-pending-view?id=".$row["student_id"]."'><i class='fa fa-check-circle'></i> Verify</a></td>
                    </tr>";
                    $i=$i+1;
            }
         }
       }
       function getSalary(){
         $sql = "SELECT * FROM salary";
         
         $query = $this->con->query($sql);
         $i=1;
         if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
           
         echo "<tr>
                 <td>".$i."</td>
                 <td>".ucwords($row['salary_name'])."</td>
                 <td>".date("M d, Y", strtotime($row["date_created"]))."</td>
                 <td><a href='salary_view.php?salary_id=".$row['salary_id']."' class='btn btn-primary'><i class='fa fa-eye'></i> View</a>
                 <button id=".$row['salary_id']." class='btn btn-danger btn-delete' data-toggle='modal' data-target='#modal-delete'><i class='fa fa-trash'></i> Delete</button>
                 </td>
              </tr>";
              $i=$i+1;
       }
     }
 }
function getBeneficiary(){
   $sql = "SELECT * FROM `application` WHERE application_status = 'Approved'";
   
   $query = $this->con->query($sql);
   if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
     
   echo "<option value='".$row['student_id']."'>".ucfirst($row['surname']).", ".ucfirst($row['firstname'])." ".ucfirst($row['middlename'])."</option>";
 }
}
}
 function getApplicantDocu(){
   $sql = "SELECT
   requirements.req_id,
   requirements.applicant_id,
   GROUP_CONCAT(file_name SEPARATOR ' ') as files,
   requirements.file_name,
   application.control_no,
   application.application_id,
   application.fname,
   application.mname,
   application.lname,
   application.birthday,
   application.birth_place,
   application.address,
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
   application.date,
   requirements.uploaded_on,
   requirements.`status`
   FROM
   requirements
   INNER JOIN application ON application.control_no = requirements.applicant_id
   GROUP BY
   requirements.applicant_id
   ";
   
   $query = $this->con->query($sql);
   if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
     
   echo "<tr>
           <td class='text-maroon'>".ucfirst($row["control_no"])."</td>
           <td>".ucfirst($row["fname"])." ".ucfirst($row["mname"])." ".ucfirst($row["lname"])."</td>
           <td>".$row["files"]."</td>
        </tr>";
 }
}
}

}

?>