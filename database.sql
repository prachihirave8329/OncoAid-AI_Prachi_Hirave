CREATE DATABASE cancer_diagnosis;
USE cancer_diagnosis;

CREATE TABLE patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    diagnosis TEXT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
