<?php

$sql = "SELECT * FROM application_limit WHERE limit_status = 'open'";
         $query = $con->query($sql);
        if ($query->num_rows > 0) {
          while ($row = $query->fetch_assoc()) {
           $limit_stat = $row["limit_status"];
           $limit_no   = $row["limit_no"];
      }
    }

    if ($limit_no <= 0) {
      header("location: home.php");
    }