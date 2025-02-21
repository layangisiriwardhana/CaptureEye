<?php
session_start();  


if (!isset($_SESSION['username'])) {
    header("Location: login.php");  
    exit();
}

require 'configsign.php';  


$name = $_POST["fname"];
$mail = $_POST["mail"];
$no = $_POST["number"];


if (empty($name) || empty($mail) || empty($no)) {
    echo "<script>alert('All fields are required.');</script>";
} else {
    
    $sql = "UPDATE userprofile SET FullName=?, email=?, number=? WHERE Username=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssss", $name, $mail, $no, $_SESSION['username']);

    if ($stmt->execute()) {
        echo "<script>alert('Profile updated successfully.');</script>";
        header("Location: profile.php");
        exit();
    } else {
        echo "<script>alert('Error updating profile.');</script>";
    }

    $stmt->close();
}

$con->close();
?>
