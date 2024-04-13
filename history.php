<?php
/*// Start the session
session_start();

// Include necessary files
include("connection.php");
include("functions.php");

$user_data = check_login($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Application History</title>
    <!-- Add your CSS styles here -->
</head>
<body>
    <div class="container">
        <h1>Leave Application History</h1>

        <!-- Display a table to show leave application history -->
        <table>
            <thead>
                <tr>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Student Name</th>
                    <th>Enrollment</th>
                    <th>Year/Semester</th>
                    <th>Class/Division</th>
                    <th>Contact Number</th>
                    <th>Reason</th>
                    <th>Description</th>
                    <th>Proof Attachment</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch leave applications from the database
                $result = mysqli_query($con, "SELECT * FROM meals");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['start_date']}</td>";
                    echo "<td>{$row['end_date']}</td>";
                    echo "<td>{$row['student_name']}</td>";
                    echo "<td>{$row['Enrollment']}</td>";
                    echo "<td>{$row['year_semester']}</td>";
                    echo "<td>{$row['class_division']}</td>";
                    echo "<td>{$row['contact_number']}</td>";
                    echo "<td>{$row['reason']}</td>";
                    echo "<td>{$row['description']}</td>";
                    echo "<td><a href='{$row['attachment']}' target='_blank'>View Attachment</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <br>
        <a href="index.php">Back to Dashboard</a>
        <br>
        Hello, <?php echo $user_data['user_name']; ?>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
*/
/*
// Start the session
session_start();

// Include necessary files
include("connection.php");
include("functions.php");

// Check if the user is logged in
$user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Application History</title>
    <!-- Add your CSS styles here -->
</head>
<body>
    <div class="container">
        <h1>Leave Application History</h1>

        <!-- Display a table to show leave application history -->
        <table>
            <thead>
                <tr>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Student Name</th>
                    <th>Enrollment</th>
                    <th>Year/Semester</th>
                    <th>Class/Division</th>
                    <th>Contact Number</th>
                    <th>Reason</th>
                    <th>Description</th>
                    <th>Proof Attachment</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch leave applications from the database using prepared statement
                $query = "SELECT * FROM meals";
                $stmt = mysqli_prepare($con, $query);
                
                if ($stmt) {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['start_date']}</td>";
                        echo "<td>{$row['end_date']}</td>";
                        echo "<td>{$row['student_name']}</td>";
                        echo "<td>{$row['Enrollment']}</td>";
                        echo "<td>{$row['year_semester']}</td>";
                        echo "<td>{$row['class_division']}</td>";
                        echo "<td>{$row['contact_number']}</td>";
                        echo "<td>{$row['reason']}</td>";
                        echo "<td>{$row['description']}</td>";
                        echo "<td><a href='{$row['attachment']}' target='_blank'>View Attachment</a></td>";
                        echo "</tr>";
                    }
                } else {
                    // Display an error message if the query fails
                    echo "<tr><td colspan='10'>Error fetching leave applications: " . mysqli_error($con) . "</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <br>
        <a href="index.php">Back to Dashboard</a>
        <br>
        Hello, <?php echo $user_data['user_name']; ?>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>

*/
// Start the session
session_start();

// Include necessary files
include("connection.php");
include("functions.php");

// Check if the user is logged in
$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Application History</title>
    <!-- Add your CSS styles here -->
</head>

<body>
    <div class="container">
        <h1>Leave Application History</h1>

        <!-- Display a table to show leave application history -->
        <table>
            <thead>
                <tr>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Student Name</th>
                    <th>Enrollment</th>
                    <th>Year/Semester</th>
                    <th>Class/Division</th>
                    <th>Contact Number</th>
                    <th>Reason</th>
                    <th>Description</th>
                    <th>Proof Attachment</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch leave applications for the current user from the database using prepared statement
                
                $query = "SELECT * FROM users WHERE user_id = ?";
                $stmt = mysqli_prepare($con, $query);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "i", $user_data['user_id']);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['start_date']}</td>";
                        echo "<td>{$row['end_date']}</td>";
                        echo "<td>{$row['student_name']}</td>";
                        echo "<td>{$row['enrollment']}</td>";
                        echo "<td>{$row['year_semester']}</td>";
                        echo "<td>{$row['class_division']}</td>";
                        echo "<td>{$row['contact_number']}</td>";
                        echo "<td>{$row['reason']}</td>";
                        echo "<td>{$row['description']}</td>";
                        echo "<td><a href='{$row['attachment']}' target='_blank'>View Attachment</a></td>";
                        echo "</tr>";
                    }
                } else {
                    // Display an error message if the query fails
                    echo "<tr><td colspan='10'>Error fetching leave applications: " . mysqli_error($con) . "</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <br>
        <a href="index.php">Back to Dashboard</a>
        <br>
        Hello, <?php echo $user_data['user_name']; ?>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>

</html>
