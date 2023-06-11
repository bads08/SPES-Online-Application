<?php
session_start();
require_once "../../config/config.php";

if (!empty($_POST["q"])) {
    $usid = $_SESSION["student_id"];

$sql = "SELECT  *, salary.date_created as sal_date
        FROM
        salary
        INNER JOIN salary_beneficiary ON salary_beneficiary.salary_id = salary.salary_id
        INNER JOIN application ON salary_beneficiary.`name` = application.student_id
        WHERE `student_id` = '$usid'";
$query = $con->query($sql);
echo "<table class='table table-bordered'>
           <tr class='bg-gray'>
              <th>Control no.</th>
              <th>Name</th>
              <th>Amount</th>
              <th>Date</th>
           </tr>
          ";
if ($query->num_rows > 0) {
    
    while ($row = $query->fetch_assoc()) {
        echo "
            <tr>
               <td>".$row['control_no']."</td>
               <td>".ucfirst($row['surname'])." ".ucfirst($row['firstname'])." ".ucfirst($row['middlename'])."</td>
               <td>".number_format($row['amount'])."</td>
               <td>".date("M d, Y", strtotime($row["sal_date"]))."</td>
             </tr>";
    }
}



else{
    echo "
            <tr>
               <td colspan='4'><center>Records not found</center></td>
             </tr>";
}
}else {
    echo "<span class='text-red'><strong>Empty Field</strong></span>";
}
echo "</table>";