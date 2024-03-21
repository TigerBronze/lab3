<?php 
// Start the session to allow access to session variables
session_start(); 

// Include the database connection file
include "db_conn.php";

// Check if all required form fields are set in the POST data
if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['First_name']) && isset($_POST['re_password'])) {

    // Function to validate and sanitize input data
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    // Validate and sanitize form inputs
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);
    $name = validate($_POST['First_name']);
    $Lastname = validate($_POST['Lastname']);
    $Middle_name = validate($_POST['Middle_name']);
    $email = validate($_POST['email']);
    
    // Construct user data for error redirection
    $user_data = 'uname='. $uname. '&First_name='. $name;

    // Check for empty fields
    if (empty($uname)) {
        header("Location: signup.php?error=User Name is required&$user_data");
        exit();
    } else if (empty($pass)) {
        header("Location: signup.php?error=Password is required&$user_data");
        exit();
    } else if (empty($re_pass)) {
        header("Location: signup.php?error=Re Password is required&$user_data");
        exit();
    } else if (empty($name)) {
        header("Location: signup.php?error=First Name is required&$user_data");
        exit();
    } else if ($pass !== $re_pass) {
        header("Location: signup.php?error=The confirmation password does not match&$user_data");
        exit();
    } else {
        // Hash the password for security
        $pass = md5($pass);

        // Check if the username is already taken
        $sql = "SELECT * FROM user WHERE username='$uname' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Redirect with an error message if username is already taken
            header("Location: signup.php?error=The username is taken, try another&$user_data");
            exit();
        } else {
            // Insert user data into the database
            $sql2 = "INSERT INTO user(username, password, Lastname, First_name, Middle_name, email) VALUES('$uname', '$pass', '$Lastname', '$name', '$Middle_name', '$email')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                // Redirect with success message if account creation is successful
                header("Location: signup.php?success=Your account has been created successfully");
                exit();
            } else {
                // Redirect with error message if an unknown error occurred during account creation
                header("Location: signup.php?error=Unknown error occurred&$user_data");
                exit();
            }
        }
    }
    
} else {
    // Redirect to the signup page if form fields are not properly set
    header("Location: signup.php");
    exit();
} 
