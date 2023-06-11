<?php
require_once "../config/config.php";
$sql = "SELECT
   salary_beneficiary.`name`,
   application.student_id,
   salary.salary_id,
   salary_beneficiary.salary_id,
   application.surname,
   application.firstname,
   application.middlename,
   salary_beneficiary.control_no,
   salary_beneficiary.amount
   FROM
   salary
   INNER JOIN salary_beneficiary ON salary.salary_id = salary_beneficiary.salary_id
   INNER JOIN application ON application.student_id = salary_beneficiary.`name`
   ";
   
   $query = $this->con->query($sql);
   if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
     
   echo "<tr>
           <td class='text-maroon'>".$row['surname']."</td>
           <td>".$row["control_no"]."</td>
           <td>".$row['amount']."</td>
        </tr>";
 }
}else {
    echo "no data";
}