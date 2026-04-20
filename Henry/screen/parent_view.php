
<!DOCTYPE html>
<html>
<head><title>Screen Time</title></head>
<body style="background-color:gold;text-align:center;font-size:40px">

<h2>Henry Screen Controls</h2>

<?php
$host='localhost';$username='roeweb_user';$password='R0ew3b!pg0@jb';$database='roe_screen';
$conn=new mysqli($host,$username,$password,$database);
$res=$conn->query("SELECT TIME_FORMAT(Allowance,'%H:%i:%s') t FROM Accounts WHERE CustomerID=2");
$row=$res->fetch_assoc();
echo "Current Screen Time: ".$row['t'];
$conn->close();
?>

<hr>

<form method="POST" action="allowance_handler.php">
<button name  ="add_5"
        style="text-align : center;
               font-size  : 40px;
               color      : black;
               width       : 20%;
               height      : 100px;
               background-color : green" 
>+5 min</button>
<button name="add_15"
        style ="text-align : center;
               font-size  : 40px;
               color      : black;
               width       : 20%;
               height      : 100px;
               background-color : green" 
>+15 min</button>
<button name="add_30"
        style ="text-align : center;
               font-size  : 40px;
               color      : black;
               width       : 20%;
               height      : 100px;
               background-color : green" 
>+30 min</button>
<button name="add_60"
        style ="text-align : center;
               font-size  : 40px;
               color      : black;
               width       : 20%;
               height      : 100px;
               background-color : green" 
>+1 hr</button>
</form>

<br>

<form method="POST" action="allowance_handler.php">
<button name="sub_5"
        style ="text-align : center;
               font-size  : 40px;
               color      : black;
               width       : 20%;
               height      : 100px;
               background-color : red" 
>-5 min</button>
<button name="sub_15"
        style ="text-align : center;
               font-size  : 40px;
               color      : black;
               width       : 20%;
               height      : 100px;
               background-color : red" 
>-15 min</button>
<button name="sub_30"
        style ="text-align : center;
               font-size  : 40px;
               color      : black;
               width       : 20%;
               height      : 100px;
               background-color : red" 
>-30 min</button>
<button name="sub_60"
        style ="text-align : center;
               font-size  : 40px;
               color      : black;
               width       : 20%;
               height      : 100px;
               background-color : red" 
>-1 hr</button>
</form>

<hr>

<form method="POST" action="allowance_handler.php">
<input type="hidden" name="action" value="reset">
<button
        style ="text-align : center;
               font-size  : 60px;
               color      : black;
               width       : 90%;
               height      : 100px;
               background-color : deepskyblue" 
>Reset</button>
</form>

</body>
</html>
