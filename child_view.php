<!DOCTYPE html>
<html>
<head>
<title>Children's Allowance View</title>
</head>
<body  style="background-color:gray;" >

<script>
setInterval(function() {   
 window.location.reload(); },
 10_000); // in ms
</script>

<?php
// Database connection parameters
$host = 'localhost'; // Replace with your database host
$username = 'roeweb_user'; // Replace with your MySQL username
$password = 'R0ew3b!pg0@jb'; // Replace with your MySQL password
$database = 'roe_bank'; // Replace with your database name

// Establish a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch the current allowance
function get_current_allowance($conn, $customerID) {
    $query = "SELECT Allowance FROM Accounts WHERE CustomerID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $customerID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        return number_format($row['Allowance'], 2); // Format to 2 decimal places
    }

    return "0.00"; // Default if no record is found
}

// Function to fetch the current allowance and balance
function get_current_balance($conn, $customerID) {
    $query = "SELECT Balance FROM Accounts WHERE CustomerID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $customerID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        return number_format($row['Balance'], 2); // Format to 2 decimal places
    }

    return "0.00"; // Default if no record is found
}

echo '<span style=background-color:pink>';

// Fetch and output the allowance
echo '<span style="font-size: 50px;"><center> 
    <p>Helen\'s Allowance</p>
    <p>$' . get_current_allowance($conn, 1).  '</p> </center> </span>';


echo '<span style="font-size: 50px;"><center> 
    <p>Helen\'s Balance</p>
    <p>$' . get_current_balance($conn, 1).  '</p> </center> </span>';

echo '</span>';

echo '<hr>';

// Fetch and output the allowance
echo '<span style="font-size: 50px;"><center> 
    <p>Henry\'s Allowance</p>
    <p>$' . get_current_allowance($conn, 2).  '</p> </center> </span>';


echo '<span style="font-size: 50px;"><center> 
    <p>Henry\'s Balance</p>
    <p>$' . get_current_balance($conn, 2).  '</p> </center> </span>';


// Close the database connection
$conn->close();
?>


<br>

</body>
</html>
