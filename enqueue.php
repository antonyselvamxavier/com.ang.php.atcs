<?php
include_once('dbconfig/dbconfig.php');
$info = json_decode(file_get_contents("php://input"));
if (count($info) > 0) {
    $id     = mysqli_real_escape_string($conn, $info->id);
    $type    = mysqli_real_escape_string($conn, $info->type);
    $size      = mysqli_real_escape_string($conn, $info->size);
    $btn_name = $info->btnName;
    if ($btn_name == "Enqueue") {
        $query = "INSERT INTO aircraft(arcrID, arcrType, arcrSize) VALUES ('$id', '$type', '$size')";
        if (mysqli_query($conn, $query)) {
            echo "Aircraft Enqueued Successfully: " .$id;
        } else {
            echo 'Failed to enqueue the new aircraft';
        }
    }
    if ($btn_name == 'Modify-Enqueue') {
        $id    = $info->id;
        $query = "UPDATE aircraft SET arcrType = '$type', arcrSize = '$size' WHERE arcrID = '$id'";
        if (mysqli_query($conn, $query)) {
            echo 'Enqueue Updated Successfully:' .$id;
        } else {
            echo 'Failed to update enqueue';
        }
    }
}
?>
