<?php
// Database connection parameters
$host = 'localhost';
$username = 'roeweb_user';
$password = 'R0ew3b!pg0@jb';
$database = 'roe_bank'; // Replace with your database name

// Establish a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//function to print to console - Not sure if it's working
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}


// // Fetch the current allowance for a specific customer (e.g., CustomerID = 1)
// function get_current_allowance() {
//     global $conn;
// 
//     $customerID = 1; // Replace with the appropriate CustomerID
//     //$query = "SELECT Allowance FROM Customers WHERE CustomerID = ?";
//     $query = "SELECT Allowance FROM Accounts WHERE CustomerID = ?";
// 
//     $stmt = $conn->prepare($query);
//     $stmt->bind_param('i', $customerID);
//     //$stmt->bind_param('i', $accountID);
//     $stmt->execute();
//     $result = $stmt->get_result();
// 
//     if ($row = $result->fetch_assoc()) {
//     //    return number_format($row['Allowance'], 2);
//         return 'Allowance';
//     }
// 
//     return "1.00";
// }


// Function to fetch the current allowance
function get_current_allowance($conn, $customerID = 1) {
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


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'transfer_allowance') {
    echo transfer_allowance_to_balance(1); // Replace '1' with the desired CustomerID
}


function transfer_allowance_to_balance($customerID = 1) {
    global $conn;

    // Step 1: Fetch current Allowance and Balance
    $queryFetch = "SELECT Allowance, Balance FROM Accounts WHERE CustomerID = ?";
    $stmtFetch = $conn->prepare($queryFetch);
    $stmtFetch->bind_param('i', $customerID);
    $stmtFetch->execute();
    $result = $stmtFetch->get_result();

    if ($row = $result->fetch_assoc()) {
        $currentAllowance = $row['Allowance'];
        $currentBalance = $row['Balance'];

        // Step 2: Add Allowance to Balance
        $newBalance = $currentBalance + $currentAllowance;

        // Step 3: Update Balance and Reset Allowance
        $queryUpdate = "UPDATE Accounts SET Balance = ?, Allowance = 4.00 WHERE CustomerID = ?";
        $stmtUpdate = $conn->prepare($queryUpdate);
        $stmtUpdate->bind_param('di', $newBalance, $customerID);

        if ($stmtUpdate->execute()) {
                header("Location: parent_view.php");
                exit();
        } else {
            return "Error updating account: " . $stmtUpdate->error;
        }
    } else {
        return "Customer not found.";
    }
}


//manual update allowance
// Update the allowance based on the provided manual value
if ($_POST['action'] === 'update_manual_allowance') { $customerID = 1;
        // Validate and sanitize input
        $manualAllowance = filter_var($_POST['manualAllowance'], FILTER_VALIDATE_FLOAT);
        if ($manualAllowance !== false) {
            $updateQuery = "UPDATE Accounts SET Allowance = ? WHERE CustomerID = ?";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bind_param('di', $manualAllowance, $customerID); // 'd' for double (float), 'i' for integer
            if ($stmt->execute()) {
                header("Location: parent_view.php");
                exit();
            } else {
                echo "Error updating allowance: " . $conn->error;
            }
        } else {
            echo "Invalid allowance value provided.";
        }
    }



//manual update balance
// Update the balance based on the provided manual value
if ($_POST['action'] === 'update_manual_balance') { $customerID = 1;
        // Validate and sanitize input
        $manualAllowance = filter_var($_POST['manualBalance'], FILTER_VALIDATE_FLOAT);
        if ($manualAllowance !== false) {
            $updateQuery = "UPDATE Accounts SET balance = ? WHERE CustomerID = ?";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bind_param('di', $manualAllowance, $customerID); // 'd' for double (float), 'i' for integer
            if ($stmt->execute()) {
                header("Location: parent_view.php");
                exit();
            } else {
                echo "Error updating allowance: " . $conn->error;
            }
        } else {
            echo "Invalid allowance value provided.";
        }
    }




// Update the allowance by adding $0.05
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_05_cent'])) {
    $customerID = 1; // Replace with the appropriate CustomerID
    $updateQuery = "UPDATE Accounts SET Allowance = Allowance + 0.05 WHERE CustomerID = ?";

    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('i', $customerID);

    if ($stmt->execute()) {
        header("Location: parent_view.php"); // Redirect back to the HTML page
        exit();
    } else {
        echo "Error updating allowance: " . $conn->error;
    }
}

// Update the allowance by adding $0.10
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_10_cent'])) {
    $customerID = 1; // Replace with the appropriate CustomerID
    $updateQuery = "UPDATE Accounts SET Allowance = Allowance + 0.10 WHERE CustomerID = ?";

    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('i', $customerID);

    if ($stmt->execute()) {
        header("Location: parent_view.php"); // Redirect back to the HTML page
        exit();
    } else {
        echo "Error updating allowance: " . $conn->error;
    }
}


// Update the allowance by adding $0.25
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_25_cent'])) {
    $customerID = 1; // Replace with the appropriate CustomerID
    $updateQuery = "UPDATE Accounts SET Allowance = Allowance + 0.25 WHERE CustomerID = ?";

    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('i', $customerID);

    if ($stmt->execute()) {
        header("Location: parent_view.php"); // Redirect back to the HTML page
        exit();
    } else {
        echo "Error updating allowance: " . $conn->error;
    }
}


// Update the allowance by adding $1.00
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_1_dollar'])) {
    $customerID = 1; // Replace with the appropriate CustomerID
    $updateQuery = "UPDATE Accounts SET Allowance = Allowance + 1.00 WHERE CustomerID = ?";

    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('i', $customerID);

    if ($stmt->execute()) {
        header("Location: parent_view.php"); // Redirect back to the HTML page
        exit();
    } else {
        echo "Error updating allowance: " . $conn->error;
    }
}


// Update the allowance by subtracting $0.05
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub_05_cent'])) {
    $customerID = 1; // Replace with the appropriate CustomerID
    $updateQuery = "UPDATE Accounts SET Allowance = Allowance - 0.05 WHERE CustomerID = ?";

    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('i', $customerID);

    if ($stmt->execute()) {
        header("Location: parent_view.php"); // Redirect back to the HTML page
        exit();
    } else {
        echo "Error updating allowance: " . $conn->error;
    }
}


// Update the allowance by subtracting $0.10
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub_10_cent'])) {
    $customerID = 1; // Replace with the appropriate CustomerID
    $updateQuery = "UPDATE Accounts SET Allowance = Allowance - 0.10 WHERE CustomerID = ?";

    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('i', $customerID);

    if ($stmt->execute()) {
        header("Location: parent_view.php"); // Redirect back to the HTML page
        exit();
    } else {
        echo "Error updating allowance: " . $conn->error;
    }
}


// Update the allowance by subtracting $0.25
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub_25_cent'])) {
    $customerID = 1; // Replace with the appropriate CustomerID
    $updateQuery = "UPDATE Accounts SET Allowance = Allowance - 0.25 WHERE CustomerID = ?";

    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('i', $customerID);

    if ($stmt->execute()) {
        header("Location: parent_view.php"); // Redirect back to the HTML page
        exit();
    } else {
        echo "Error updating allowance: " . $conn->error;
    }
}


// Update the allowance by subtracting $1.00
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub_1_dollar'])) {
    $customerID = 1; // Replace with the appropriate CustomerID
    $updateQuery = "UPDATE Accounts SET Allowance = Allowance - 1.00 WHERE CustomerID = ?";

    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('i', $customerID);

    if ($stmt->execute()) {
        header("Location: parent_view.php"); // Redirect back to the HTML page
        exit();
    } else {
        echo "Error updating allowance: " . $conn->error;
    }
}



// Close the database connection
$conn->close();
?>
