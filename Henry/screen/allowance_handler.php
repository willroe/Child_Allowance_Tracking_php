
<?php
$host = 'localhost';
$username = 'roeweb_user';
$password = 'R0ew3b!pg0@jb';
$database = 'roe_screen';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

function add_time($conn,$seconds,$CustomerID=2){
    $query="UPDATE Accounts SET Allowance = ADDTIME(Allowance, SEC_TO_TIME(?)) WHERE CustomerID=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param('ii',$seconds,$CustomerID);
    $stmt->execute();
    header("Location: parent_view.php"); exit();
}

function sub_time($conn,$seconds,$CustomerID=2){
    $query="UPDATE Accounts SET Allowance = SUBTIME(Allowance, SEC_TO_TIME(?)) WHERE CustomerID=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param('ii',$seconds,$CustomerID);
    $stmt->execute();
    header("Location: parent_view.php"); exit();
}

if(isset($_POST['add_5'])) add_time($conn,300);
if(isset($_POST['add_15'])) add_time($conn,900);
if(isset($_POST['add_30'])) add_time($conn,1800);
if(isset($_POST['add_60'])) add_time($conn,3600);

if(isset($_POST['sub_5'])) sub_time($conn,300);
if(isset($_POST['sub_15'])) sub_time($conn,900);
if(isset($_POST['sub_30'])) sub_time($conn,1800);
if(isset($_POST['sub_60'])) sub_time($conn,3600);

if($_POST['action']==='reset'){
    $stmt=$conn->prepare("UPDATE Accounts SET Allowance='10:00:00' WHERE CustomerID=2");
    $stmt->execute();
    header("Location: parent_view.php"); exit();
}

$conn->close();
?>
