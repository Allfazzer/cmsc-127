<?php
// Database connection details
$servername = "localhost";  // Database server
$username = "root";         // Database username
$password = "";             // Database password
$dbname = "Advising_Checklist"; // Database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $courseID = $_POST['courseID'];
    $courseDescription = $_POST['courseDescription'];
    $units = $_POST['units'];
    $courseComponents = $_POST['courseComponents'];
    $college = $_POST['college'];
    $department = $_POST['department'];
    $gradingBasis = $_POST['gradingBasis'];
    $corequisite = isset($_POST['corequisite']) ? $_POST['corequisite'] : NULL;
    $courseType = $_POST['courseType'];

    // SQL query to insert new course
    $sql = "INSERT INTO Course (CourseID, CourseDescription, Units, CourseComponents, College, Department, GradingBasis, Corequisite, CourseType)
            VALUES ('$courseID', '$courseDescription', '$units', '$courseComponents', '$college', '$department', '$gradingBasis', '$corequisite', '$courseType')";


    // Execute query and check for success
    if (mysqli_query($conn, $sql)) {
        header("Location: Manage_Courses.php");
        exit();
    } else {
        echo "<script>alert('Error adding course: " . mysqli_error($conn) . "');</script>";
    }

    // Close the connection
    mysqli_close($conn);
}
