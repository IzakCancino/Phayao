<?php 

// Start the session storage
session_start();

// Connect to the database
$connection = mysqli_connect(
    "localhost",    
    "root", 
    "",
    "phayao"
);

?>