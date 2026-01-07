<?php
include "../db.php";

$sql = "SELECT a.appointment_id,
               s.full_name AS student,
               f.full_name AS faculty,
               d.name AS department,
               a.status,
               a.created_at
        FROM appointments a
        JOIN students s ON a.student_id=s.student_id
        JOIN faculty f ON a.faculty_id=f.faculty_id
        JOIN departments d ON a.department_id=d.department_id";

$result = mysqli_query($conn,$sql);
$output = "";

while($row = mysqli_fetch_assoc($result)){
    $output .= "<tr>
        <td>{$row['appointment_id']}</td>
        <td>{$row['student']}</td>
        <td>{$row['faculty']}</td>
        <td>{$row['department']}</td>
        <td>{$row['status']}</td>
        <td>
          <button onclick='editAppointment({$row['appointment_id']})'>Edit</button>
          <button onclick='deleteAppointment({$row['appointment_id']})'>Delete</button>
        </td>
    </tr>";
}
echo $output;
