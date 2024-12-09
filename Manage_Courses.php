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
                        <a class="nav-link" href="Advising_Dashboard.html">
                            <img src="svg/Dashboard.svg" alt="Dashboard"> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Student_Records.html">
                            <img src="svg/Sidebar_StudentRecords.svg" alt="Student Records"> Student Records
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Advising_Records.html">
                            <img src="svg/Sidebar_AdvisingRecords.svg" alt="Advising Records"> Advising Records
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Manage_Courses.html">
                            <img src="svg/Hover_ManageCourses.svg" alt="Manage Courses"> Manage Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Logout.html">
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
                        <button class="btn btn-custom btn-add">Add Course</button>
                        <!-- Toggle Edit Mode -->
                        <?php $isEditMode = isset($_GET['edit']) && $_GET['edit'] === 'true'; ?>
                        <a href="?edit=<?php echo $isEditMode ? 'false' : 'true'; ?>" class="btn btn-custom btn-update">
                            <?php echo $isEditMode ? 'Finish Editing' : 'Edit'; ?>
                        </a>
                    </div>
                </div>

                <!-- Major Courses -->
                <section class="mb-5">
                    <h4 class="section-title">Major Courses</h4>
                    <table class="table table-hover">
                        <thead class="table-header">
                            <tr>
                                <td>Course Name</td>
                                <td>Description</td>
                                <td>Units</td>
                                <td>Affiliation</td>
                                <td>Prerequisite</td>
                                <td>Corequisite</td>
                                <!-- Conditionally show "Actions" column -->
                                <?php if ($isEditMode): ?>
                                    <td>Actions</td>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $courseType = 'Major';
                            include './fetch_courses.php';
                            ?>
                        </tbody>
                    </table>
                </section>

                <!-- Qualified Electives -->
                <section class="mb-5">
                    <h4 class="section-title">Qualified Electives (9 Units)</h4>
                    <table class="table table-hover">
                        <thead class="table-header">
                            <tr>
                                <td>Course Name</td>
                                <td>Description</td>
                                <td>Units</td>
                                <td>Affiliation</td>
                                <td>Prerequisite</td>
                                <td>Corequisite</td>
                                <!-- Conditionally show "Actions" column -->
                                <?php if ($isEditMode): ?>
                                    <td>Actions</td>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $isEditMode;
                            $courseType = 'Qualified Elective';
                            include './fetch_courses.php';
                            ?>
                        </tbody>
                    </table>
                </section>

                <!-- Foundation Courses -->
                <section>
                    <h4 class="section-title">Foundation Courses (15 Units)</h4>
                    <table class="table table-hover">
                        <thead class="table-header">
                            <tr>
                                <td>Course Name</td>
                                <td>Description</td>
                                <td>Units</td>
                                <td>Affiliation</td>
                                <td>Prerequisite</td>
                                <td>Corequisite</td>
                                <!-- Conditionally show "Actions" column -->
                                <?php if ($isEditMode): ?>
                                    <td>Actions</td>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $isEditMode;
                            $courseType = 'Foundation';
                            include './fetch_courses.php';
                            ?>
                        </tbody>
                    </table>
                </section>

                <!-- GE Requirements -->
                <section>
                    <h4 class="section-title">GE Requirements (36 Units)</h4>
                    <table class="table table-hover">
                        <thead class="table-header">
                            <tr>
                                <td>Course Name</td>
                                <td>Description</td>
                                <td>Units</td>
                                <td>Affiliation</td>
                                <td>Prerequisite</td>
                                <td>Corequisite</td>
                                <!-- Conditionally show "Actions" column -->
                                <?php if ($isEditMode): ?>
                                    <td>Actions</td>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $isEditMode;
                            $courseType = 'GE Requirement';
                            include './fetch_courses.php';
                            ?>
                        </tbody>
                    </table>
                </section>

                <!-- Other Required Courses -->
                <section>
                    <h4 class="section-title">Other Required Courses (12 Units)</h4>
                    <table class="table table-hover">
                        <thead class="table-header">
                            <tr>
                                <td>Course Name</td>
                                <td>Description</td>
                                <td>Units</td>
                                <td>Affiliation</td>
                                <td>Prerequisite</td>
                                <td>Corequisite</td>
                                <!-- Conditionally show "Actions" column -->
                                <?php if ($isEditMode): ?>
                                    <td>Actions</td>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $isEditMode;
                            $courseType = 'Other';
                            include './fetch_courses.php';
                            ?>
                        </tbody>
                    </table>
                </section>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>