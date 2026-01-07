<?php
include("../config/db.php");

$query = "
SELECT a.appointment_id,
       s.full_name AS student,
       f.full_name AS faculty,
       d.name AS department,
       a.status
FROM appointments a
JOIN students s ON a.student_id=s.student_id
JOIN faculty f ON a.faculty_id=f.faculty_id
JOIN departments d ON a.department_id=d.department_id";

$result = mysqli_query($conn, $query);

echo "<table>
<tr>
<th>Student</th>
<th>Faculty</th>
<th>Department</th>
<th>Status</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
    <td>{$row['student']}</td>
    <td>{$row['faculty']}</td>
    <td>{$row['department']}</td>
    <td>{$row['status']}</td>
    <td>
      <button class="btn-delete"
onclick="deleteAppointment(<?php echo $row['appointment_id']; ?>)">
Delete
</button>

    </td>
    </tr>";
}
echo "</table>";
?>
