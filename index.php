<?php
// Start the session
session_start();

// Include necessary files
include("connection.php");
include("functions.php");

$user_data = check_login($con);

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Process the form data here
    // Insert data into database, send email notifications, etc.

    // Show a success message
    $_SESSION['message'] = "Leave application submitted successfully!";
    header("Location: submit_leave.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Application Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: #f4b1b1;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        input[type="tel"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        textarea {
            resize: none;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .logout-btn {
            display: inline-block;
            background-color: #ff0000;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
            margin-top: 20px;
        }

        .logout-btn:hover {
            background-color: #cc0000;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1>Leave Application Form</h1>
        <form action="send_meal.php" method="post" enctype="multipart/form-data">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" required placeholder="Select start date">

            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" required placeholder="Select end date">

            <label for="student_name">Student Name:</label>
            <input type="text" name="student_name" required placeholder="Enter student name">

            <label for="Enrollment ">Enrollment:</label>
            <input type="text" name="Enrollment" required placeholder="Enter enrollment number">

            <label for="year_semester">Year or Semester:</label>
            <input type="text" name="year_semester" required placeholder="Enter year or semester">

            <label for="class_division">Class or Division:</label>
            <input type="text" name="class_division" required placeholder="Enter class or division">

            <label for="contact_number">Contact Number:</label>
            <input type="tel" name="contact_number" required placeholder="Enter contact number">

            <label for="reason">Reason to Take Leave:</label>
            <select name="reason" required>
                <option value="sick">Sick</option>
                <option value="personal">Personal</option>
                <!-- Add more options as needed -->
            </select>

            <label for="description">Description:</label>
            <textarea name="description" required placeholder="Enter leave description"></textarea>

            <label for="proof_attachment">Proof Attachment:</label>
            <input type="file" name="proof_attachment" placeholder="Upload proof attachment">

            <input type="submit" value="Send Meal">
        </form>

        <br>
        Hello, <?php echo $user_data['user_name']; ?>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
    <!-- Add this link/button at the end of the container div in submit_leave.php -->
<a href="history.php" class="history-btn">View Leave History</a>


    <script>
        // Check if the session variable message is set
        if ('<?php echo isset($_SESSION["message"]); ?>') {
            // Display a pop-up message
            alert('<?php echo $_SESSION["message"]; ?>');
        }
    </script>
</body>
</html>
