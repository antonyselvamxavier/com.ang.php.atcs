<?php
include_once('dbconfig/dbconfig.php');
$output = array();
$query  = "SELECT * FROM aircraft order by arcrType ASC, arcrSize ASC";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
?> 
