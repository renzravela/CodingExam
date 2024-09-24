<?php
// Database config
$host = 'localhost';
$db = 'mydatabase'; 
$user = 'root'; 
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Validate inputs
    $fullName = trim($_POST['fullName']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $birth_date = $_POST['birth_date'];
    $gender = trim($_POST['gender']);

    // Validate each field
    if (empty($fullName) || empty($email) || empty($mobile) || empty($birth_date) || empty($gender)) {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    if (!preg_match('/^09[0-9]{9}$/', $mobile)) {
        echo "Invalid mobile number format.";
        exit;
    }

    // Insert data into database
    $stmt = $pdo->prepare("INSERT INTO users (full_name, email, mobile, date_of_birth, gender) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$fullName, $email, $mobile, $birth_date, $gender]);

    echo "Registration successful!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

