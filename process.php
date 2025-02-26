<?php
include '../config.php';

$id = $_GET['id'];
$query = "SELECT image_path FROM patients WHERE id = $id";
$result = $conn->query($query);
$row = $result->fetch_assoc();

$image_path = $row['image_path'];
$python_cmd = "python3 ../ai_model/analyze.py " . escapeshellarg($image_path);
$diagnosis = shell_exec($python_cmd);

$update_query = "UPDATE patients SET diagnosis = '$diagnosis' WHERE id = $id";
$conn->query($update_query);

echo "Diagnosis: " . $diagnosis;
?>
