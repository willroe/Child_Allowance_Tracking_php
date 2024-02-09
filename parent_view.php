<!DOCTYPE html>
<html>
<head>
  <title>Parent Allowance View</title>

<link rel="icon" href="favicon.ico" type="image/x-icon"/>

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

</head>
<body  style="background-color:gray;">

<center>


<?php




// File path
$filePath = 'coming.txt';

// Add .05 to Allowance 
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_05_cent'])) {
    // Open the file for reading
    $currentValue = file_get_contents($filePath);

    // Check if the file content is a valid number
    if (is_numeric($currentValue)) {
        // Add 0.05 to the current value
        $newValue = $currentValue + 0.05;

        // Open the file for writing and save the new value
        file_put_contents($filePath, $newValue);
       header("Location:http://192.168.0.111/Roe_Bank/redirect.php");

        // Display success message
//        echo "Value successfully updated to $newValue";
    } else {
        // Display an error if the file content is not a valid number
        echo "Error: File content is not a valid number";
    }
}

// Add .10 to Allowance 
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_10_cent'])) {
    // Open the file for reading
    $currentValue = file_get_contents($filePath);

    // Check if the file content is a valid number
    if (is_numeric($currentValue)) {
        // Add 0.05 to the current value
        $newValue = $currentValue + 0.10;

        // Open the file for writing and save the new value
        file_put_contents($filePath, $newValue);
       header("Location:http://192.168.0.111/Roe_Bank/redirect.php");

        // Display success message
  //      echo "Value successfully updated to $newValue";
    } else {
        // Display an error if the file content is not a valid number
        echo "Error: File content is not a valid number";
    }
}


// Add .25 to Allowance 
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_25_cent'])) {
    // Open the file for reading
    $currentValue = file_get_contents($filePath);

    // Check if the file content is a valid number
    if (is_numeric($currentValue)) {
        // Add 0.05 to the current value
        $newValue = $currentValue + 0.25;

        // Open the file for writing and save the new value
        file_put_contents($filePath, $newValue);
       header("Location:http://192.168.0.111/Roe_Bank/redirect.php");

        // Display success message
    //    echo "Value successfully updated to $newValue";
    } else {
        // Display an error if the file content is not a valid number
        echo "Error: File content is not a valid number";
    }
}



// Add 1 to Allowance 
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_1_dollar'])) {
    // Open the file for reading
    $currentValue = file_get_contents($filePath);

    // Check if the file content is a valid number
    if (is_numeric($currentValue)) {
        // Add 0.05 to the current value
        $newValue = $currentValue + 1.00;

        // Open the file for writing and save the new value
        file_put_contents($filePath, $newValue);
       header("Location:http://192.168.0.111/Roe_Bank/redirect.php");

        // Display success message
      //  echo "Value successfully updated to $newValue";
    } else {
        // Display an error if the file content is not a valid number
        echo "Error: File content is not a valid number";
    }
}




// Subtract .05 to Allowance 
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub_05_cent'])) {
    // Open the file for reading
    $currentValue = file_get_contents($filePath);

    // Check if the file content is a valid number
    if (is_numeric($currentValue)) {
        // Add 0.05 to the current value
        $newValue = $currentValue - 0.05;

        // Open the file for writing and save the new value
        file_put_contents($filePath, $newValue);
       header("Location:http://192.168.0.111/Roe_Bank/redirect.php");

        // Display success message
        //echo "Value successfully updated to $newValue";
    } else {
        // Display an error if the file content is not a valid number
        echo "Error: File content is not a valid number";
    }
}

// Subtract .10 to Allowance 
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub_10_cent'])) {
    // Open the file for reading
    $currentValue = file_get_contents($filePath);

    // Check if the file content is a valid number
    if (is_numeric($currentValue)) {
        // Add 0.05 to the current value
        $newValue = $currentValue - 0.10;

        // Open the file for writing and save the new value
        file_put_contents($filePath, $newValue);
       header("Location:http://192.168.0.111/Roe_Bank/redirect.php");

        // Display success message
       // echo "Value successfully updated to $newValue";
    } else {
        // Display an error if the file content is not a valid number
        echo "Error: File content is not a valid number";
    }
}


// Subtract .25 to Allowance 
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub_25_cent'])) {
    // Open the file for reading
    $currentValue = file_get_contents($filePath);

    // Check if the file content is a valid number
    if (is_numeric($currentValue)) {
        // Add 0.05 to the current value
        $newValue = $currentValue - 0.25;

        // Open the file for writing and save the new value
        file_put_contents($filePath, $newValue);
       header("Location:http://192.168.0.111/Roe_Bank/redirect.php");

        // Display success message
        //echo "Value successfully updated to $newValue";
    } else {
        // Display an error if the file content is not a valid number
        echo "Error: File content is not a valid number";
    }
}



// Subtract 1 dollar to Allowance 
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub_1_dollar'])) {
    // Open the file for reading
    $currentValue = file_get_contents($filePath);

    // Check if the file content is a valid number
    if (is_numeric($currentValue)) {
        // Add 0.05 to the current value
        $newValue = $currentValue - 1.00;
        // Open the file for writing and save the new value
        file_put_contents($filePath, $newValue);

       //This will redirect to helen_view to prevemt a resubmittion error.
       header("Location:http://192.168.0.111/Roe_Bank/redirect.php");
       
        // Display success message
        //echo "Value successfully updated to $newValue";
    } else {
        // Display an error if the file content is not a valid number
        echo "Error: File content is not a valid number";
    }
}




// Replace these variables with your MySQL database credentials
$host = '127.0.0.1';
$user = 'roeweb';
$pass = '^D*^C7Â¡Vamos!^C';
$db   = 'roeweb';

// Create a connection
$conn = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select the amount from your database
$sql = "SELECT Allowance FROM Helen_Allowance WHERE ID = 1";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Save the amount to a variable
    $amount = $row['Allowance'];

    // Output or use the $amount variable as needed
   // echo "The amount is: " . $amount;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
              



if(isset($_POST['textdata_coming']) )
{
$data=$_POST['textdata_coming'];
$fp = fopen('coming.txt', 'w');
fwrite($fp, $data);
fclose($fp);
}

if(isset($_POST['textdata_has']))
{
$data_has=$_POST['textdata_has'];
$fp_has = fopen('has.txt', 'w');
fwrite($fp_has, $data_has);
fclose($fp_has);
}


if(isset($_POST['move']))
{
    
    
$myfile_move = fopen("coming.txt", "r") or die("Unable to open file!");
$value_move = fread($myfile_move,filesize("coming.txt"));

$myfile_has_move = fopen("has.txt", "r") or die("Unable to open file!");
$value_has_move = fread($myfile_has_move,filesize("has.txt"));


fclose($myfile_move);
fclose($myfile_has_move);
    
$data_has= $value_move + $value_has_move;
$fp_has = fopen('has.txt', 'w');
fwrite($fp_has, $data_has);
fclose($fp_has);

//******************************************************************
//This section is the default amount that Helen receives each week. 
//It should be her age divided by 2.
//At first I had it hard coded in as the $data value. See below with 3.00 as the value.
//Next I read the value from a text file "allowance.txt"
//Finally I created a MySQL database called roeweb and pulled the data from the table Helen_Allowance
//     The code above get the value from the Helen_Allowance Table and 
//     Allowance column and puts it in the $amount variable. 
//     The $amount variable is then saved into the $data variable
//*****************************************************************
//
//$data='3.00';
//$fp_allowance = fopen('allowance.txt', 'r');
//$data = fread($fp_allowance, filesize('allowance.txt'));
//fclose($fp_allowance);
$data = $amount;


$fp = fopen('coming.txt', 'w');
fwrite($fp, $data);
fclose($fp);

}


//Here is where the Top information of what Helen is getting and
//    how much she has populates. 

$myfile = fopen("coming.txt", "r") or die("Unable to open file!");
$value = fread($myfile,filesize("coming.txt"));

$myfile_has = fopen("has.txt", "r") or die("Unable to open file!");
$value_has = fread($myfile_has,filesize("has.txt"));


fclose($myfile);
fclose($myfile_has);


echo '<span style="font-size: 50px;">
    <p>Helen\'s Allowance is: $' .$value.  '</p> </span>';


echo '<span style="font-size: 50px;">
    <p>Helen Currently Has: $' . $value_has.  '</p> </span>';


?>


<hr>


<span style="font-size: 50px">
  <form method="post">
    Edit Helen's Future Allowance: <br>
    <input type="text" 
           name="textdata_coming" 
           style="text-align : center;
                  font-size : 60px; 
                  width: 60%; height: 100px;" />
<br>

    <input type="submit" 
           name="submit" 
           value="Update Allowance"    
           style="text-align : center;
                  font-size : 70px; 
                  width: 90%; height: 100px;" />
  </form>

<hr>
<p>
    Quick Add and Subtract Buttons <br>
    Green is Add and Red is Subtract <br>
</p>

<!-Buttons to add money from allowance-->

<form method="post">
    <input type="submit" 
           name="add_05_cent" 
           value=".05"
           style="text-align : center;
                  font-size : 40px; 
                  width: 20%; height: 100px;
                  background-color: green" />


<form method="post">
    <input type="submit" 
           name="add_10_cent" 
           value=".10"
           style="text-align : center;
                  font-size : 40px; 
                  width: 20%; height: 100px;
                  background-color: green" />



<form method="post">
    <input type="submit" 
           name="add_25_cent" 
           value=".25"
           style="text-align : center;
                  font-size : 40px; 
                  width: 20%; height: 100px;
                  background-color: green" />


<form method="post">
    <input type="submit" 
           name="add_1_dollar" 
           value="1"
           style="text-align : center;
                  font-size : 40px; 
                  width: 20%; height: 100px;
                  background-color: green" />
  </form>


<br>

<!-Buttons to subtract money from allowance-->

<form method="post">
    <input type="submit" 
           name="sub_05_cent" 
           value=".05"
           style="text-align : center;
                  font-size : 40px; 
                  width: 20%; height: 100px;
                  background-color: red" />


<form method="post">
    <input type="submit" 
           name="sub_10_cent" 
           value=".10"
           style="text-align : center;
                  font-size : 40px; 
                  width: 20%; height: 100px;
                  background-color: red" />



<form method="post">
    <input type="submit" 
           name="sub_25_cent" 
           value=".25"
           style="text-align : center;
                  font-size : 40px; 
                  width: 20%; height: 100px;
                  background-color: red" />

<form method="post">
    <input type="submit" 
           name="sub_1_dollar" 
           value="1"
           style="text-align : center;
                  font-size : 40px; 
                  width: 20%; height: 100px;
                  background-color: red" />
  </form>


<hr>

  <form method="post">
    Button to Give Allowance and Reset: <br> 
    <input type="submit" 
           name="move" 
           value="Give Allowance and Reset"
           style="text-align : center;
                  font-size : 60px; 
                  width: 90%; height: 100px;" />
  </form>
  

</span>

<hr>

<span style="font-size: 50px">
  <form method="post">
    Edit What Helen Currently Has:<br>
    <input type="text" 
           name="textdata_has"
           style="text-align : center;
                  font-size : 70px; 
                  width: 60%; height: 100px;" />
<br>
    <input type="submit" 
           name="submit" 
           value="Update Currently Has"
           style="text-align : center;
                  font-size : 70px; 
                  width: 90%; height: 100px;" />
    
  </form>
</span>



</center>




</body>
</html>



