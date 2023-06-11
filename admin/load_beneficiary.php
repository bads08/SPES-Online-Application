<?php
require_once "../config/config.php";
$salary_id = $_GET["salary_id"];
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
   INNER JOIN application ON application.student_id = salary_beneficiary.`name` WHERE salary_beneficiary.salary_id = '$salary_id'
   ";
   
   $query = $con->query($sql);
   echo "<table id='example2' class='table table-bordered'>
    <thead>
      <tr class='bg-gray'>
          <th>#</th>
          <th>Beneficiary Name</th>
          <th>Control no.</th>
          <th>Amount</th> 
      </tr>
    </thead>
    <tbody>";
    $i=1;
   if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
    
    echo "

    <tr>   
           <td>".$i."</td>
           <td class='text-maroon'>".$row['surname'].", ".$row['firstname']." ".$row['middlename']."</td>
           <td>".$row["control_no"]."</td>
           <td>".number_format($row['amount'])."</td>
        </tr>";
    $i=$i+1;
  
 }
}else {
    echo "<tr>
    <td colspan='4'><center>No data</center></td>
 </tr>";
}
echo "</tbody>
  </table>";