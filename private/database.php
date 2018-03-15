<?php 

// Credentials
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'user_registration_challenge';

// 1. Create a database connection
function db_connect() {
    global $dbhost, $dbuser, $dbpass, $dbname;
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    confirm_db_connect($connection);
    return $connection;
}

// Test if connection succeeded
function confirm_db_connect($connection) {
    if(mysqli_connect_errno()) {
    $msg = "Database connection failed: ";
    $msg .= mysqli_connect_error();
    $msg .= " (" . mysqli_connect_errno() . ")";
    exit($msg);
    }
}

// Close database connection
function db_disconnect($connection) {
    if(isset($connection)) {
        mysqli_close($connection);
    }
}

// // 2. Perform database query
// $query = "SELECT * FROM subjects";
// $result_set = mysqli_query($connection, $query);

// // Test if query succeeded
// if (!$result_set) {
// 	exit("Database query failed.");
// }

// // 3. Use returned data (if any)
// while($subject = mysqli_fetch_assoc($result_set)) {
//   echo $subject["menu_name"] . "<br />";
// }

// // 4. Release returned data
// mysqli_free_result($result_set);

?>