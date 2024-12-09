<?php
include './db_connection.php';

// Check if $courseType is set from the parent file
if (!isset($courseType)) {
    $courseType = 'Major'; // Default to Major
}

// Fetch parameters dynamically
$studentProgram = 'Computer Science'; // Program to filter by

// SQL query to fetch courses for a specific program and course type
$sql = "
    SELECT 
        Course.CourseID, 
        Course.CourseDescription, 
        Course.Units, 
        Course.CourseComponents, 
        Course.College, 
        Course.Department, 
        Course.GradingBasis, 
        Course.Corequisite,
        ProgramChecklist.CourseType
    FROM Course
    JOIN ProgramChecklist ON Course.CourseID = ProgramChecklist.CourseID
    WHERE ProgramChecklist.StudentProgram = ? AND ProgramChecklist.CourseType = ?
";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $studentProgram, $courseType); // Bind program and course type
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr class='text-center'>
            <td>{$row['CourseID']}</td>
            <td>{$row['CourseDescription']}</td>
            <td>{$row['Units']}</td>
            <td>{$row['College']}</td>
            <td>";

        // Fetch prerequisites from CoursePrerequisite table
        $prerequisite_sql = 'SELECT Prerequisite FROM CoursePrerequisite WHERE CourseID = ?';
        $prerequisite_stmt = $conn->prepare($prerequisite_sql);
        $prerequisite_stmt->bind_param('s', $row['CourseID']); // Bind the CourseID to the query
        $prerequisite_stmt->execute();
        $prerequisite_result = $prerequisite_stmt->get_result();

        if ($prerequisite_result->num_rows > 0) {
            $prerequisites = []; // Array to hold prerequisites
            while ($prerequisite_row = $prerequisite_result->fetch_assoc()) {
                $prerequisites[] = $prerequisite_row['Prerequisite'];
            }
            // Join prerequisites with commas
            echo implode(", ", $prerequisites);
        } else {
            echo "No Prerequisite";
        }

        echo "</td>
              <td>{$row['Corequisite']}</td>";  // Added semicolon here to fix the error

        // Check if we are in edit mode and display the buttons
        if ($isEditMode == true) {
            echo "
            <td>
                <button class='btn btn-sm btn-warning btn-edit' data-id='{$row['CourseID']}'>Edit</button>
                <button class='btn btn-sm btn-danger btn-delete' data-id='{$row['CourseID']}'>Delete</button>
            </td>";
        }

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No $courseType courses available</td></tr>";
}

$conn->close();
