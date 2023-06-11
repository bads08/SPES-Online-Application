<?php

class spes{
    public $servername = "localhost";
    public $username   = "root";
    public $password   = "";
    public $dbname     = "spesDB";

    public function __construct(){
      $this->con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }
    function con(){
        return $this->con;
    }
    
}