<?php
// Database connection details
$servername = "localhost";
$username   = "root";      // default MySQL user
$password   = "";          // default MySQL password (empty in XAMPP)
$dbname     = "mca_mngt";  // make sure this DB exists

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert form data if submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['fullName'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $mobile   = $_POST['mobile'];
    $course   = $_POST['course'];

    // Split full name into first and last (optional)
    $nameParts  = explode(" ", $fullName, 2);
    $first_name = $nameParts[0];
    $last_name  = isset($nameParts[1]) ? $nameParts[1] : "";

    // Insert query
    $sql = "INSERT INTO students (first_name, last_name, email, password, mobile, course)
            VALUES ('$first_name', '$last_name', '$email', '$password', '$mobile', '$course')";

    if (mysqli_query($conn, $sql)) {
        echo "<p style='color:green;'>New record added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
}

// Fetch data from students table
$sql = "SELECT id, first_name, last_name, email, mobile, course FROM students";
$result = $conn->query($sql);

echo "<h2>Registered Students</h2>";
echo "<table border='1' cellpadding='8' cellspacing='0'>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Course</th>
        </tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["first_name"]."</td>
                <td>".$row["last_name"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["mobile"]."</td>
                <td>".$row["course"]."</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No records found</td></tr>";
}
echo "</table>";

// Close connection
mysqli_close($conn);
?>
