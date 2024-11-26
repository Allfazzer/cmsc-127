<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Advising_Dashboard.css">
    <link rel="stylesheet" href="Advising_Records.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar py-4">
                <div class="logo mb-4">
                    <img src="svg/Logo.svg" alt="Logo">
                </div>

                <ul class="nav flex-column px-3">
                    <li class="nav-item">
                        <a class="nav-link" href="Advising_Dashboard.php">
                            <img src="svg/Dashboard.svg" alt="Dashboard"> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Student_Records.php">
                            <img src="svg/Hover_StudentRecords.svg" alt="Student Records"> Student Records
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Advising_Records.php">
                            <img src="svg/Sidebar_AdvisingRecords.svg" alt="Advising Records"> Advising Records
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Manage_Courses.php">
                            <img src="svg/Sidebar_.ManageCourses.svg" alt="Manage Courses"> Manage Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Logout.php">
                            <img src="svg/Sidebar_Logout.svg" alt="Logout"> Logout
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- MAIN -->
            <main class="container-content col-md-10 ms-sm-auto">
                <h1 class="title_page h1 fw-bold">Add Student</h1>

                <!-- Add Student Form -->
                <div class="card card-body shadow-sm">
                    <form action="Add_Student.php" method="POST">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                        </div>
                        <div class="mb-3">
                            <label for="middleName" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middleName" name="middleName" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" required>
                        </div>
                        <div class="mb-3">
                            <label for="studentNumber" class="form-label">Student Number</label>
                            <input type="text" class="form-control" id="studentNumber" name="studentNumber" required>
                        </div>
                        <div class="mb-3">
                            <label for="program" class="form-label">Program</label>
                            <select class="form-control" id="program" name="program" required>
                                <option value="BS Mathematics">BS Mathematics</option>
                                <option value="BS Computer Science">BS Computer Science</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="standing" class="form-label">Current Standing</label>
                            <input type="text" class="form-control" id="standing" name="standing" required>
                        </div>
                        <div class="mb-3">
                            <label for="totalUnits" class="form-label">Total Units Taken</label>
                            <input type="number" class="form-control" id="totalUnits" name="totalUnits" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Student</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <!-- PHP Code to Handle Form Submission -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $studentNumber = $_POST['studentNumber'];
        $program = $_POST['program'];
        $standing = $_POST['standing'];
        $totalUnits = $_POST['totalUnits'];

        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Advising_Checklist";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check the connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Insert new student record into database
        $sql = "INSERT INTO Student (StudentNumber, S_FirstName, S_MiddleName, S_LastName, StudentProgram, CurrentStanding, TotalUnitsTaken)
                VALUES ('$studentNumber', '$firstName', '$middleName', '$lastName', '$program', '$standing', '$totalUnits')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Student added successfully!');</script>";
            // Redirect back to the student records page
            echo "<script>window.location.href = 'Student_Records.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close the connection
        mysqli_close($conn);
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>