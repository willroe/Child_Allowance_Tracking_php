<!DOCTYPE html>
<html>
<head>
  <title>Parent Allowance View</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon"/>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
</head>
<body style="background-color:gold;">

<span style="font-size: 50px">


<center>
<h2>Henry Allowance Controls</h2>

<!-- Links to index and other Child's Account - Currently Commented Out
<p>
<a href="../../index.html">Return to Homepage</a>
-
<a href="../../Helen/money/parent_view.php">Go To Helen</a>
</p>
-->

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
function get_current_allowance($conn, $customerID = 2) {
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
function get_current_balance($conn, $customerID = 2) {
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


// Fetch and output the allowance
echo "Current Allowance: ";
echo get_current_allowance($conn);
echo "<br>";
echo "Current Balance: ";
echo get_current_balance($conn);

// Close the database connection
$conn->close();
?>


<br>


  <!-- New Section below -->
  <center>



      <!-- Give and Reset Allowance Section -->
    <form action="allowance_handler.php" method="POST">
      <button type="submit"
             style="text-align : center;
                     font-size : 60px; 
                     width: 90%; height: 100px;">Give and Reset</button>
      <input type="hidden" 
             name="action" 
             value="transfer_allowance">
    </form>


<hr>


<p>
    Quick Add and Subtract Buttons <br>
    Green is Add and Red is Subtract <br>
</p>

<!--Buttons to add money from allowance-->

<form action="allowance_handler.php" method="POST">
    <input type="submit"
           name="add_05_cent" 
           value=".05"
           style="text-align : center;
                  font-size : 40px; 
                  width: 20%; height: 100px;
                  background-color: green" />


<form action="allowance_handler.php" method="POST">
    <input type="submit" 
           name="add_10_cent" 
           value=".10"
           style="text-align : center;
                  font-size : 40px; 
                  width: 20%; height: 100px;
                  background-color: green" />



<form action="allowance_handler.php" method="POST">
    <input type="submit" 
           name="add_25_cent" 
           value=".25"
           style="text-align : center;
                  font-size : 40px; 
                  width: 20%; height: 100px;
                  background-color: green" />


<form action="allowance_handler.php" method="POST">
    <input type="submit" 
           name="add_1_dollar" 
           value="1"
           style="text-align : center;
                  font-size : 41px; 
                  width: 20%; height: 100px;
                  background-color: green" />
  </form>


<br>

<!--Buttons to subtract money from allowance-->

<form action="allowance_handler.php" method="POST">
    <input type="submit" 
           name="sub_05_cent" 
           value=".05"
           style="text-align : center;
                  font-size : 40px; 
                  width: 20%; height: 100px;
                  background-color: red" />


<form action="allowance_handler.php" method="POST">
    <input type="submit" 
           name="sub_10_cent" 
           value=".10"
           style="text-align : center;
                  font-size : 40px; 
                  width: 20%; height: 100px;
                  background-color: red" />



<form action="allowance_handler.php" method="POST">
    <input type="submit" 
           name="sub_25_cent" 
           value=".25"
           style="text-align : center;
                  font-size : 40px; 
                  width: 20%; height: 100px;
                  background-color: red" />

<form action="allowance_handler.php" method="POST">
    <input type="submit" 
           name="sub_1_dollar" 
           value="1"
           style="text-align : center;
                  font-size : 40px; 
                  width: 20%; height: 100px;
                  background-color: red" />
  </form>


<hr>


      <!-- Manual Allowance Update Section -->
    <form action="allowance_handler.php" method="POST">
      <label for="manualAllowance">Enter New Allowance Amount:</label><br>
      <input type="number" step="0.01" id="manualAllowance" name="manualAllowance" 
           style="text-align : center;
                  font-size : 60px; 
                  width: 60%; height: 100px;"
            required>
    <br>
      <button type="submit"
             style="text-align : center;
                     font-size : 60px; 
                     width: 90%; height: 100px;">Update Allowance</button>
      <input type="hidden" 
             name="action" 
             value="update_manual_allowance">
    </form>

 


<hr>

      <!-- Manual Balance Update Section -->
    <form action="allowance_handler.php" method="POST">
      <label for="manualBalance">Enter New Balance Amount:</label><br>
      <input type="number" step="0.01" id="manualBalance" name="manualBalance" 
           style="text-align : center;
                  font-size : 60px; 
                  width: 60%; height: 100px;"
            required>
    <br>
      <button type="submit"
             style="text-align : center;
                     font-size : 60px; 
                     width: 90%; height: 100px;">Update Balance</button>
      <input type="hidden" 
             name="action" 
             value="update_manual_balance">
    </form>

</span>



</center>






</body>
</html>

