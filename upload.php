<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = $_POST['patient_name'];
    $age = $_POST['age'];
    $image_name = $_FILES['medical_image']['name'];
    $image_tmp = $_FILES['medical_image']['tmp_name'];
    $upload_dir = "../uploads/";
    $target_file = $upload_dir . basename($image_name);

    if (move_uploaded_file($image_tmp, $target_file)) {
        $sql = "INSERT INTO patients (name, age, image_path) VALUES ('$patient_name', '$age', '$target_file')";
        if ($conn->query($sql) === TRUE) {
            echo "File uploaded successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "File upload failed!";
    }
}
?>
