<?php
include("../config/db.php");

$id = $_POST['id'];

$stmt = mysqli_prepare($conn,
"DELETE FROM appointments WHERE appointment_id=?");

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

echo "Deleted";
?>
