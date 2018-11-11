<?php
// connect to our mysql database server
function getDatabaseConnection() {
    if (strpos($_SERVER['SERVER_NAME'], "ottermike.c9users.io") !== false) {
        // running on cloud9
        $host = "localhost";
        $username = "Michael";
        $password = "cst336"; // best practice: define this in a separte file
        $dbname = "memes_v2"; 
    } else {
        // running on Heroku
        $host = "";
        $username = "";
        $password = ""; 
        $dbname = ""; 
    }
    
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConn; 
}
// temporary test code
//$dbConn = getDatabaseConnection(); 
?>