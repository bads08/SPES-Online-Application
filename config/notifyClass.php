<?php

require_once "spesClass.php";

class notif extends spes{
     function loginsuccess(){
     if (isset($_SESSION["success"])) {
        echo "<div id='snackbar' class='magictime slideDownReturn'>Welcome Back <span class='text-yellow'>".$_SESSION['user']."</span></div>";
        unset($_SESSION["success"]); 
      } 
    }
    function updated(){
      if (isset($_SESSION["updated"])) {
         echo "<div id='snackbar' class='magictime slideDownReturn'>Updated Successfully</div>";
         unset($_SESSION["updated"]); 
       } 
     }
}