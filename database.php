<?php

// connect to our mysql database server

function getDatabaseConnection() {
    if ($_SERVER['SERVER_NAME']=="test-ottermike.c9users.io") { // running on c9
        $host = "localhost";
        $username = "Michael";
        $password = "cst336"; // best practice: define this in a separte file
        $dbname = "meme_lab"; 
    } else { // running on Heroku
        $host = "us-cdbr-iron-east-01.cleardb.net";
        $username = "b171ae97d81d35";
        $password = "ce803cfa"; // best practice: define this in a separte file
        $dbname = "heroku_992acbb4f28e214"; 
    }
    
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}




// temporary test code
//$dbConn = getDatabaseConnection(); 

?>
