<?php
// Database connection
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

// Get the course ID from the URL
if (isset($_GET['courseID'])) {
    $courseID = $_GET['courseID'];

    // Sanitize the courseID to prevent SQL injection
    $courseID = mysqli_real_escape_string($conn, $courseID);

    // Delete the course from the database
    $sql = "DELETE FROM Course WHERE CourseID = '$courseID'";

    if (mysqli_query($conn, $sql)) {
        // Redirect to the manage_course.php page after deletion
        header("Location: Manage_Courses.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Course ID is missing.";
}

// Close the connection
mysqli_close($conn);
?>