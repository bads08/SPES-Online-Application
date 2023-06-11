<?php
if (!isset($_SESSION["user"])) {
    header("location: ../home");
}else{
    echo "not found";
}

?>