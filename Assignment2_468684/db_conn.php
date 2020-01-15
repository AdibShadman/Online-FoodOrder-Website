<?php
//mysql connection (hostname, username, password, dbname);
$mysqli = new mysqli('localhost', 'asornob', '468684', 'asornob');

//check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>