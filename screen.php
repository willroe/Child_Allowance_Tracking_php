<!DOCTYPE html>
<html>
<head>
<title>Children's Allowance View</title>
</head>
<body  style="background-color:gray;" >


 <?php
 $host='localhost';$username='roeweb_user';$password='R0ew3b!pg0@jb';$database='roe_screen';
 $conn=new mysqli($host,$username,$password,$database);
 $res=$conn->query("SELECT TIME_FORMAT(Allowance,'%H:%i:%s') t FROM Accounts WHERE CustomerID=1");
 $row=$res->fetch_assoc();
 echo "<center><h1> Helen Screen Time: ".$row['t'];
 echo "</h1></center>";
 $conn->close();
 ?>

<br>
<hr>
<br>

 <?php
 $host='localhost';$username='roeweb_user';$password='R0ew3b!pg0@jb';$database='roe_screen';
 $conn=new mysqli($host,$username,$password,$database);
 $res=$conn->query("SELECT TIME_FORMAT(Allowance,'%H:%i:%s') t FROM Accounts WHERE CustomerID=2");
 $row=$res->fetch_assoc();
 echo "<center><h1> Henry Screen Time: ".$row['t']; 
 echo"</h1></center>";
 $conn->close();
 ?>


<br>

</body>
</html>
