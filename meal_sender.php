<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Sender</title>
</head>
<body>
    <h1>Meal Sender Site</h1>

    <form action="send_meal.php" method="post" enctype="multipart/form-data">

        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" required>

        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" required>

        <label for="student_name">Student Name:</label>
        <input type="text" name="student_name" required>

        <label for="Enrollment ">Enrollment</label>
        <input type="text" name="Enrollment" required>

        <label for="year_semester">Year or Semester:</label>
        <input type="text" name="year_semester" required>

        <label for="class_division">Class or Division:</label>
        <input type="text" name="class_division" required>

        <label for="contact_number">Contact Number:</label>
        <input type="tel" name="contact_number" required>

        <label for="reason">Reason to Take Leave:</label>
        <select name="reason" required>
            <option value="sick">Sick</option>
            <option value="personal">Personal</option>
            <!-- Add more options as needed -->
        </select>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>

        <label for="proof_attachment">Proof Attachment:</label>
        <input type="file" name="proof_attachment">

        <button type="submit">Send Meal</button>
    </form>
</body>
</html>

