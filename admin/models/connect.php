<?php

/**
 * Handling database connection
 *
 * @author Mohit Jindal
 */
class DbConnect {

    private $conn;

    function __construct() {        
    }

    /**
     * Establishing database connection
     */
    function connect() {
       
        
     

        // Connecting to mysql database
        try {
//    $this->conn = new PDO("mysql:host=localhost;port=3306;dbname=aqua_pro_db", "root", "");
    $this->conn = new PDO("mysql:host=localhost;port=8888;dbname=tingting_kss_nutrients_db", "root", 'root');
    // set the PDO error mode to exception
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

        // returning connection resource
        return $this->conn;
    }

}