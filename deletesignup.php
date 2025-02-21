<?php

session_start();


require 'configsign.php';


if (!isset($_SESSION['username'])) {
    
    header("Location: login.php");
    exit();
}


$user_name = $_SESSION['username']; 


$sql = "DELETE FROM userprofile WHERE Username = '$user_name'";


if (mysqli_query($con, $sql)) {
    
    echo "<script>alert('Account deleted successfully.');</script>";
    
    
    session_destroy();
    
    
    header("Location: login.php");
    exit();
} else {
    
    echo "<script>alert('Error deleting your account. Please try again later.');</script>";
}


mysqli_close($con);
?>
