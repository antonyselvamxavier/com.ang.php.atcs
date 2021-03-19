<?php
include_once('dbconfig/dbconfig.php');
$data    = json_decode(file_get_contents("php://input"));
if (count($data) > 0) {
    $id    = $data->id;
    $query = "DELETE FROM aircraft WHERE arcrID='$id'";
    if (mysqli_query($conn, $query)) {
        echo 'Aircraft Dequeued Successfully: '.$id;
    } else {
        echo 'Failed to dequeue Aircraft';
    }
}
?>
