<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Manage_Courses.css">
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
                        <a class="nav-link" href="Student_Records.php">
                            <img src="svg/Sidebar_StudentRecords.svg" alt="Student Records"> Student Records
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Advising_Records.php">
                            <img src="svg/Sidebar_AdvisingRecords.svg" alt="Advising Records"> Advising Records
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Manage_Courses.php">
                            <img src="svg/Hover_ManageCourses.svg" alt="Manage Courses"> Manage Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Logout.php">
                            <img src="svg/Sidebar_Logout.svg" alt="Logout"> Logout
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="container-content col-md-10 ms-sm-auto">
                <div class="d-flex align-items-center mb-4">
                    <h1 class="title_page h1 fw-bold">Manage Courses</h1>
                    <div class="btn-func">
                        <!-- Button for Add, Update, and Delete -->
                        <button class="btn btn-custom btn-add" data-bs-toggle="modal" data-bs-target="#addCourseModal">Add Course</button>
                    </div>
                </div>

                <!-- Major Courses Section -->
                <section class="mb-5">
                    <h4 class="section-title">Major Courses</h4>
                    <!-- PHP Code to Fetch and Display Courses Table -->
                    <?php
                    // Database Connection
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

                    // SQL query to select courses from the Course table
                    $sql = "SELECT * FROM Course WHERE CourseType = 'Major';";  // Assuming your table name is Course
                    $result = mysqli_query($conn, $sql);

                    // Check if any rows were returned
                    if (mysqli_num_rows($result) > 0) {
                        // Start table and header
                        echo "<table class='table table-hover'>";
                        echo "<thead class='table-header'>
                                <tr>
                                    <th>Course ID</th>
                                    <th>Description</th>
                                    <th>Units</th>
                                    <th>Course Components</th>
                                    <th>College</th>
                                    <th>Department</th>
                                    <th>Grading Basis</th>
                                    <th>Corequisite</th>
                                    <th>Actions</th> <!-- Added Actions column for buttons -->
                                </tr>
                            </thead>";
                        echo "<tbody>";

                        // Loop through the results and render each row in the table
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['CourseID'] . "</td>";
                            echo "<td>" . $row['CourseDescription'] . "</td>";
                            echo "<td>" . $row['Units'] . "</td>";
                            echo "<td>" . $row['CourseComponents'] . "</td>";
                            echo "<td>" . $row['College'] . "</td>";
                            echo "<td>" . $row['Department'] . "</td>";
                            echo "<td>" . $row['GradingBasis'] . "</td>";
                            echo "<td>" . ($row['Corequisite'] ? $row['Corequisite'] : "None") . "</td>";
                            echo "<td>
                                    <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#updateCourseModal' data-id='" . $row['CourseID'] . "' data-description='" . $row['CourseDescription'] . "' data-units='" . $row['Units'] . "' data-components='" . $row['CourseComponents'] . "' data-college='" . $row['College'] . "' data-department='" . $row['Department'] . "' data-grading='" . $row['GradingBasis'] . "' data-corequisite='" . $row['Corequisite'] . "'>Update</button>
                                    <a href='delete_course.php?courseID=" . $row['CourseID'] . "' class='btn btn-danger btn-sm'>Delete</a>
                                  </td>"; // Update and Delete buttons with courseID passed to delete
                            echo "</tr>";
                        }

                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "<p>No courses found in the database.</p>";
                    }

                    // Close the connection
                    mysqli_close($conn);
                    ?>
                </section>

                <!-- Qualified Electives -->
                <section class="mb-5">
                    <h4 class="section-title">Qualified Electives (9 Units)</h4>
                    <!-- PHP Code to Fetch and Display Courses Table -->
                    <?php
                    // Database Connection
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

                    // SQL query to select courses from the Course table
                    $sql = "SELECT * FROM Course WHERE CourseType = 'Qualified Elective';";  // Assuming your table name is Course
                    $result = mysqli_query($conn, $sql);

                    // Check if any rows were returned
                    if (mysqli_num_rows($result) > 0) {
                        // Start table and header
                        echo "<table class='table table-hover'>";
                        echo "<thead class='table-header'>
                                <tr>
                                    <th>Course ID</th>
                                    <th>Description</th>
                                    <th>Units</th>
                                    <th>Course Components</th>
                                    <th>College</th>
                                    <th>Department</th>
                                    <th>Grading Basis</th>
                                    <th>Corequisite</th>
                                    <th>Actions</th> <!-- Added Actions column for buttons -->
                                </tr>
                            </thead>";
                        echo "<tbody>";

                        // Loop through the results and render each row in the table
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['CourseID'] . "</td>";
                            echo "<td>" . $row['CourseDescription'] . "</td>";
                            echo "<td>" . $row['Units'] . "</td>";
                            echo "<td>" . $row['CourseComponents'] . "</td>";
                            echo "<td>" . $row['College'] . "</td>";
                            echo "<td>" . $row['Department'] . "</td>";
                            echo "<td>" . $row['GradingBasis'] . "</td>";
                            echo "<td>" . ($row['Corequisite'] ? $row['Corequisite'] : "None") . "</td>";
                            echo "<td>
                                    <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#updateCourseModal' data-id='" . $row['CourseID'] . "' data-description='" . $row['CourseDescription'] . "' data-units='" . $row['Units'] . "' data-components='" . $row['CourseComponents'] . "' data-college='" . $row['College'] . "' data-department='" . $row['Department'] . "' data-grading='" . $row['GradingBasis'] . "' data-corequisite='" . $row['Corequisite'] . "'>Update</button>
                                    <a href='delete_course.php?courseID=" . $row['CourseID'] . "' class='btn btn-danger btn-sm'>Delete</a>
                                  </td>"; // Update and Delete buttons with courseID passed to delete
                            echo "</tr>";
                        }

                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "<p>No courses found in the database.</p>";
                    }

                    // Close the connection
                    mysqli_close($conn);
                    ?>
                </section>
                <!-- Foundation Courses -->
                <section>
                    <h4 class="section-title">Foundation Courses (15 Units)</h4>
                    <!-- PHP Code to Fetch and Display Courses Table -->
                    <?php
                    // Database Connection
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

                    // SQL query to select courses from the Course table
                    $sql = "SELECT * FROM Course WHERE CourseType = 'Foundation';";  // Assuming your table name is Course
                    $result = mysqli_query($conn, $sql);

                    // Check if any rows were returned
                    if (mysqli_num_rows($result) > 0) {
                        // Start table and header
                        echo "<table class='table table-hover'>";
                        echo "<thead class='table-header'>
                                <tr>
                                    <th>Course ID</th>
                                    <th>Description</th>
                                    <th>Units</th>
                                    <th>Course Components</th>
                                    <th>College</th>
                                    <th>Department</th>
                                    <th>Grading Basis</th>
                                    <th>Corequisite</th>
                                    <th>Actions</th> <!-- Added Actions column for buttons -->
                                </tr>
                            </thead>";
                        echo "<tbody>";

                        // Loop through the results and render each row in the table
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['CourseID'] . "</td>";
                            echo "<td>" . $row['CourseDescription'] . "</td>";
                            echo "<td>" . $row['Units'] . "</td>";
                            echo "<td>" . $row['CourseComponents'] . "</td>";
                            echo "<td>" . $row['College'] . "</td>";
                            echo "<td>" . $row['Department'] . "</td>";
                            echo "<td>" . $row['GradingBasis'] . "</td>";
                            echo "<td>" . ($row['Corequisite'] ? $row['Corequisite'] : "None") . "</td>";
                            echo "<td>
                                    <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#updateCourseModal' data-id='" . $row['CourseID'] . "' data-description='" . $row['CourseDescription'] . "' data-units='" . $row['Units'] . "' data-components='" . $row['CourseComponents'] . "' data-college='" . $row['College'] . "' data-department='" . $row['Department'] . "' data-grading='" . $row['GradingBasis'] . "' data-corequisite='" . $row['Corequisite'] . "'>Update</button>
                                    <a href='delete_course.php?courseID=" . $row['CourseID'] . "' class='btn btn-danger btn-sm'>Delete</a>
                                  </td>"; // Update and Delete buttons with courseID passed to delete
                            echo "</tr>";
                        }

                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "<p>No courses found in the database.</p>";
                    }

                    // Close the connection
                    mysqli_close($conn);
                    ?>
                </section>

                <!-- GE Requirements -->
                <section>
                    <h4 class="section-title">GE Requirements (36 Units)</h4>
                    <!-- PHP Code to Fetch and Display Courses Table -->
                    <?php
                    // Database Connection
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

                    // SQL query to select courses from the Course table
                    $sql = "SELECT * FROM Course WHERE CourseType = 'General Elective';";  // Assuming your table name is Course
                    $result = mysqli_query($conn, $sql);

                    // Check if any rows were returned
                    if (mysqli_num_rows($result) > 0) {
                        // Start table and header
                        echo "<table class='table table-hover'>";
                        echo "<thead class='table-header'>
                                <tr>
                                    <th>Course ID</th>
                                    <th>Description</th>
                                    <th>Units</th>
                                    <th>Course Components</th>
                                    <th>College</th>
                                    <th>Department</th>
                                    <th>Grading Basis</th>
                                    <th>Corequisite</th>
                                    <th>Actions</th> <!-- Added Actions column for buttons -->
                                </tr>
                            </thead>";
                        echo "<tbody>";

                        // Loop through the results and render each row in the table
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['CourseID'] . "</td>";
                            echo "<td>" . $row['CourseDescription'] . "</td>";
                            echo "<td>" . $row['Units'] . "</td>";
                            echo "<td>" . $row['CourseComponents'] . "</td>";
                            echo "<td>" . $row['College'] . "</td>";
                            echo "<td>" . $row['Department'] . "</td>";
                            echo "<td>" . $row['GradingBasis'] . "</td>";
                            echo "<td>" . ($row['Corequisite'] ? $row['Corequisite'] : "None") . "</td>";
                            echo "<td>
                                    <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#updateCourseModal' data-id='" . $row['CourseID'] . "' data-description='" . $row['CourseDescription'] . "' data-units='" . $row['Units'] . "' data-components='" . $row['CourseComponents'] . "' data-college='" . $row['College'] . "' data-department='" . $row['Department'] . "' data-grading='" . $row['GradingBasis'] . "' data-corequisite='" . $row['Corequisite'] . "'>Update</button>
                                    <a href='delete_course.php?courseID=" . $row['CourseID'] . "' class='btn btn-danger btn-sm'>Delete</a>
                                  </td>"; // Update and Delete buttons with courseID passed to delete
                            echo "</tr>";
                        }

                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "<p>No courses found in the database.</p>";
                    }

                    // Close the connection
                    mysqli_close($conn);
                    ?>
                </section>

                <!-- Other Required Courses -->
                <section>
                    <h4 class="section-title">Other Required Courses (12 Units)</h4>
                    <!-- PHP Code to Fetch and Display Courses Table -->
                    <?php
                    // Database Connection
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

                    // SQL query to select courses from the Course table
                    $sql = "SELECT * FROM Course WHERE CourseType = 'Other Required';";  // Assuming your table name is Course
                    $result = mysqli_query($conn, $sql);

                    // Check if any rows were returned
                    if (mysqli_num_rows($result) > 0) {
                        // Start table and header
                        echo "<table class='table table-hover'>";
                        echo "<thead class='table-header'>
                                <tr>
                                    <th>Course ID</th>
                                    <th>Description</th>
                                    <th>Units</th>
                                    <th>Course Components</th>
                                    <th>College</th>
                                    <th>Department</th>
                                    <th>Grading Basis</th>
                                    <th>Corequisite</th>
                                    <th>Actions</th> <!-- Added Actions column for buttons -->
                                </tr>
                            </thead>";
                        echo "<tbody>";

                        // Loop through the results and render each row in the table
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['CourseID'] . "</td>";
                            echo "<td>" . $row['CourseDescription'] . "</td>";
                            echo "<td>" . $row['Units'] . "</td>";
                            echo "<td>" . $row['CourseComponents'] . "</td>";
                            echo "<td>" . $row['College'] . "</td>";
                            echo "<td>" . $row['Department'] . "</td>";
                            echo "<td>" . $row['GradingBasis'] . "</td>";
                            echo "<td>" . ($row['Corequisite'] ? $row['Corequisite'] : "None") . "</td>";
                            echo "<td>
                                    <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#updateCourseModal' data-id='" . $row['CourseID'] . "' data-description='" . $row['CourseDescription'] . "' data-units='" . $row['Units'] . "' data-components='" . $row['CourseComponents'] . "' data-college='" . $row['College'] . "' data-department='" . $row['Department'] . "' data-grading='" . $row['GradingBasis'] . "' data-corequisite='" . $row['Corequisite'] . "'>Update</button>
                                    <a href='delete_course.php?courseID=" . $row['CourseID'] . "' class='btn btn-danger btn-sm'>Delete</a>
                                  </td>"; // Update and Delete buttons with courseID passed to delete
                            echo "</tr>";
                        }

                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "<p>No courses found in the database.</p>";
                    }

                    // Close the connection
                    mysqli_close($conn);
                    ?>
                </section>
            </main>

            
        </div>
    </div>

    <!-- Modals for Add, Update, and Delete Course -->
    
    <!-- Add Course Modal -->
    <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCourseModalLabel">Add New Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="add_course.php" method="POST">
                    <div class="mb-3">
                        <label for="courseID" class="form-label">Course ID</label>
                        <input type="text" class="form-control" id="courseID" name="courseID" required>
                    </div>
                    <div class="mb-3">
                        <label for="courseDescription" class="form-label">Description</label>
                        <input type="text" class="form-control" id="courseDescription" name="courseDescription" required>
                    </div>
                    <div class="mb-3">
                        <label for="units" class="form-label">Units</label>
                        <input type="number" class="form-control" id="units" name="units" required>
                    </div>
                    <div class="mb-3">
                        <label for="courseComponents" class="form-label">Course Components</label>
                        <input type="text" class="form-control" id="courseComponents" name="courseComponents" required>
                    </div>
                    <div class="mb-3">
                        <label for="college" class="form-label">College</label>
                        <input type="text" class="form-control" id="college" name="college" required>
                    </div>
                    <div class="mb-3">
                        <label for="department" class="form-label">Department</label>
                        <input type="text" class="form-control" id="department" name="department" required>
                    </div>
                    <div class="mb-3">
                        <label for="gradingBasis" class="form-label">Grading Basis</label>
                        <input type="text" class="form-control" id="gradingBasis" name="gradingBasis" required>
                    </div>
                    <div class="mb-3">
                        <label for="corequisite" class="form-label">Corequisite</label>
                        <input type="text" class="form-control" id="corequisite" name="corequisite">
                    </div>
                    <!-- Course Classification Dropdown -->
                    <div class="mb-3">
                        <label for="courseType" class="form-label">Course Classification</label>
                        <select class="form-select" id="courseType" name="courseType" required>
                            <option value="" disabled selected>Select Classification</option>
                            <option value="Major">Major</option>
                            <option value="Qualified Elective">Qualified Elective</option>
                            <option value="General Elective">General Elective</option>
                            <option value="Foundation">Foundation</option>
                            <option value="Other Required">Other Required</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Course</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Update Course Modal -->
    <div class="modal fade" id="updateCourseModal" tabindex="-1" aria-labelledby="updateCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCourseModalLabel">Update Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="update_course.php" method="POST">
                        <div class="mb-3">
                            <label for="updateCourseID" class="form-label">Course ID</label>
                            <input type="text" class="form-control" id="updateCourseID" name="courseID" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="updateDescription" class="form-label">Description</label>
                            <input type="text" class="form-control" id="updateDescription" name="courseDescription" required>
                        </div>
                        <div class="mb-3">
                            <label for="updateUnits" class="form-label">Units</label>
                            <input type="number" class="form-control" id="updateUnits" name="units" required>
                        </div>
                        <div class="mb-3">
                            <label for="updateComponents" class="form-label">Course Components</label>
                            <input type="text" class="form-control" id="updateComponents" name="courseComponents" required>
                        </div>
                        <div class="mb-3">
                            <label for="updateCollege" class="form-label">College</label>
                            <input type="text" class="form-control" id="updateCollege" name="college" required>
                        </div>
                        <div class="mb-3">
                            <label for="updateDepartment" class="form-label">Department</label>
                            <input type="text" class="form-control" id="updateDepartment" name="department" required>
                        </div>
                        <div class="mb-3">
                            <label for="updateGradingBasis" class="form-label">Grading Basis</label>
                            <input type="text" class="form-control" id="updateGradingBasis" name="gradingBasis" required>
                        </div>
                        <div class="mb-3">
                            <label for="updateCorequisite" class="form-label">Corequisite</label>
                            <input type="text" class="form-control" id="updateCorequisite" name="corequisite">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Course</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

    <script>
        // Populate the Update Modal with course data
        var updateButtons = document.querySelectorAll('[data-bs-target="#updateCourseModal"]');
        updateButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var courseId = button.getAttribute('data-id');
                var description = button.getAttribute('data-description');
                var units = button.getAttribute('data-units');
                var components = button.getAttribute('data-components');
                var college = button.getAttribute('data-college');
                var department = button.getAttribute('data-department');
                var grading = button.getAttribute('data-grading');
                var corequisite = button.getAttribute('data-corequisite');

                // Pre-fill the modal inputs with the current course data
                document.getElementById('updateCourseID').value = courseId;
                document.getElementById('updateDescription').value = description;
                document.getElementById('updateUnits').value = units;
                document.getElementById('updateComponents').value = components;
                document.getElementById('updateCollege').value = college;
                document.getElementById('updateDepartment').value = department;
                document.getElementById('updateGradingBasis').value = grading;
                document.getElementById('updateCorequisite').value = corequisite;
            });
        });
    </script>
</body>

</html>