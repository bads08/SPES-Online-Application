<?php
 require_once "../../config/config.php";

 if (isset($_POST["bookid"])) {
     $bookid = $_POST["bookid"];

     $sql = "SELECT
     book.book_id
     FROM
     book
     WHERE book_id = '$bookid'";
     $query = $conn->query($sql);
     if ($query->num_rows > 0) {
         while ($row = $query->fetch_assoc()) {
             echo json_encode($row);
         }
     }
 }
?>