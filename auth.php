<?php
session_start();
include 'config.php';

// REGISTER USER
if (isset($_POST['action']) && $_POST['action'] === 'register') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check if user already exists
    $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email already exists!'); window.location='index.php';</script>";
        exit();
    }

    // Hash password before storing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $insert = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $insert->bind_param("sss", $name, $email, $hashedPassword);

    if ($insert->execute()) {
        echo "<script>alert('Registration successful! Please login.'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Registration failed!'); window.location='index.php';</script>";
    }
    exit();
}

// LOGIN USER
if (isset($_POST['action']) && $_POST['action'] === 'login') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify hashed password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['name'];
            echo "<script>alert('Login successful!'); window.location='home.php';</script>";
            exit();
        } else {
            echo "<script>alert('Invalid password!'); window.location='index.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Email not found!'); window.location='index.php';</script>";
        exit();
    }
}
?>
