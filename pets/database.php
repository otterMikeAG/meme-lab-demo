<?php
// connect to our mysql database server
function getDatabaseConnection() {
        $host = "localhost";
        $username = "Michael";
        $password = "cst336"; // best practice: define this in a separte file
        $dbname = "lab10"; 
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConn; 
}
?>