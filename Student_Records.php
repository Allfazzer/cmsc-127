<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
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
                <h1 class="title_page h1 fw-bold">Student Records</h1>

                <!-- Search and Filter -->
                <div class="summary-container row g-3 mb-4">
                    <div class="search-container row">
                        <div class="col col-8 search-box">
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Search for student...">
                            </div>
                        </div>
                        <div class="col-4 p-0">
                            <div class="dropdown p-0">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="svg/Filter.svg" alt="Filter"> Filter
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                    <li><a class="dropdown-item" href="#">Name</a></li>
                                    <li><a class="dropdown-item" href="#">Student Number</a></li>
                                    <li><a class="dropdown-item" href="#">Last Update</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Student Button -->
                <div class="d-flex justify-content-end mb-4">
                    <a href="Add_Student.php" class="btn btn-primary">Add Student</a>
                </div>

                <!-- Student Table -->
                <div class="card-table card shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Student Number</th>
                                        <th>Standing</th>
                                        <th colspan="2">Last Update of Checklist</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php
                                    // Connection setup
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

                                    // Handle delete operation
                                    if (isset($_GET['delete_id'])) {
                                        $delete_id = $_GET['delete_id'];
                                        $delete_sql = "DELETE FROM Student WHERE StudentNumber = '$delete_id'";
                                        if (mysqli_query($conn, $delete_sql)) {
                                            echo "Record deleted successfully!";
                                        } else {
                                            echo "Error deleting record: " . mysqli_error($conn);
                                        }
                                    }

                                    // Query to get the student records
                                    $sql = "SELECT StudentNumber, StudentProgram, AdviserID, S_FirstName, S_MiddleName, S_LastName, CurrentStanding, TotalUnitsTaken FROM Student";
                                    $result = mysqli_query($conn, $sql);

                                    // Check if the query was successful
                                    if ($result === false) {
                                        die("Error executing query: " . mysqli_error($conn));
                                    }

                                    // Check if there are any results
                                    if (mysqli_num_rows($result) > 0) {
                                        // Loop through the results and display each student record in a row
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>
                                                    <td>" . $row["StudentNumber"] . "</td>
                                                    <td>" . $row["S_FirstName"] . " " . $row["S_MiddleName"] . " " . $row["S_LastName"] . "</td>
                                                    <td>" . $row["StudentProgram"] . "</td>
                                                    <td>" . $row["CurrentStanding"] . "</td>
                                                    <td>" . ($row["TotalUnitsTaken"] ? $row["TotalUnitsTaken"] : 'N/A') . "</td>
                                                    <td>
                                                        <a href='Student_Records.php?delete_id=" . $row['StudentNumber'] . "' class='btn btn-sm btn-danger'>Delete</a>
                                                    </td>
                                                </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No records found.</td></tr>";
                                    }

                                    // Close the connection
                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- JavaScript Section -->
    <script>
        function ViewChecklist() {
            window.location.href = 'Adviser_ViewChecklist.php';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>