<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Advising_Checklist";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$courseID = $_POST['courseID'];
$courseDescription = $_POST['courseDescription'];
$units = $_POST['units'];
$courseComponents = $_POST['courseComponents'];
$college = $_POST['college'];
$department = $_POST['department'];
$gradingBasis = $_POST['gradingBasis'];
$corequisite = $_POST['corequisite'];

// Update the course details in the database
$sql = "UPDATE Course SET CourseDescription = '$courseDescription', Units = '$units', CourseComponents = '$courseComponents', College = '$college', Department = '$department', GradingBasis = '$gradingBasis', Corequisite = '$corequisite' WHERE CourseID = '$courseID'";

if (mysqli_query($conn, $sql)) {
    // Redirect to the manage_course.php page after the update
    header("Location: Manage_Courses.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>