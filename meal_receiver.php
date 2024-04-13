<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Receiver</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        a:hover {
            color: #0056b3;
        }

        p {
            text-align: center;
            margin-top: 20px;
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>
    <h1>Meal Receiver Site</h1>

    <?php
    // Connection to MySQL database
    $conn = new mysqli('localhost', 'root', '', 'your_database_name');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Fetch and display meals with attachments
    $result = $conn->query("SELECT * FROM meals");

    if ($result) {
        if ($result->num_rows > 0) {
            echo '<table>
                <tr>
                    <th>ID</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Student Name</th>
                    <th>Enrollment</th>
                    <th>Year/Semester</th>
                    <th>Class/Division</th>
                    <th>Contact Number</th>
                    <th>Reason</th>
                    <th>Description</th>
                    <th>Attachment</th>
                </tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['start_date'] . '</td>
                    <td>' . $row['end_date'] . '</td>
                    <td>' . $row['student_name'] . '</td>
                    <td>' . $row['Enrollment'] . '</td>
                    <td>' . $row['year_semester'] . '</td>
                    <td>' . $row['class_division'] . '</td>
                    <td>' . $row['contact_number'] . '</td>
                    <td>' . $row['reason'] . '</td>
                    <td>' . $row['description'] . '</td>
                    <td>';

                // Display attachment if available
                if (!empty($row['attachment'])) {
                    echo '<a href="' . $row['attachment'] . '" target="_blank">View Attachment</a>';
                } else {
                    echo 'No Attachment';
                }

                echo '</td>
                </tr>';
            }

            echo '</table>';
        } else {
            echo '<p>No meals available</p>';
        }

        $result->free_result();
    } else {
        echo "Error retrieving meals from the database.";
    }

    $conn->close();
    ?>

    <p>Note: Click on the attachment link to view the details.</p>
</body>
</html>
