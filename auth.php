<?php
session_start();

$error = ""; // Initialize error variable

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    require_once 'config/database.php';
    
    // Escape user inputs for security
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Query to fetch user details based on email
    $query = "SELECT * FROM admins WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Verify password
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $row['role'];
            
            // Redirect based on role
            switch ($row['role']) {
                case "admin":
                    header("Location: admin_dashboard.php");
                    exit();
                case "manager":
                    header("Location: manager_dashboard.php");
                    exit();
                case "regional manager":
                    header("Location: regional_manager_dashboard.php");
                    exit();
                case "technician":
                    header("Location: technician_dashboard.php");
                    exit();
                default:
                    // Redirect to a generic dashboard or error page
                    header("Location: generic_dashboard.php");
                    exit();
            }
            exit();
        } else {
            $error = "Invalid email or password";
        }
    } else {
        $error = "Invalid email or password";
    }
}
?>
