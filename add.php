<?php
include("../config/db.php");

$student = $_POST['student_id'];
$faculty = $_POST['faculty_id'];
$department = $_POST['department_id'];
$schedule = $_POST['schedule_id'];

$stmt = mysqli_prepare($conn,
"INSERT INTO appointments (student_id, faculty_id, department_id, schedule_id)
 VALUES (?,?,?,?)");

mysqli_stmt_bind_param($stmt, "iiii",
    $student, $faculty, $department, $schedule);

mysqli_stmt_execute($stmt);

echo "Appointment added successfully";
?>
