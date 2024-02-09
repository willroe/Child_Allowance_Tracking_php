<!DOCTYPE html>
<html>
<head>
<title>Helen's Allowance</title>
</head>
<body  style="background-color:pink;" >

<?php
$myfile = fopen("coming.txt", "r") or die("Unable to open file!");
$value = fread($myfile,filesize("coming.txt"));

$myfile_has = fopen("has.txt", "r") or die("Unable to open file!");
$value_has = fread($myfile_has,filesize("has.txt"));


fclose($myfile);
fclose($myfile_has);


echo '<span style="font-size: 50px;"><center> 
    <p>Helen\'s Allowance</p>
    <p>$' . $value.  '</p> </center> </span>';


echo '<span style="font-size: 50px;"><center> 
    <p>What Helen Currently Has </p>
    <p>$' . $value_has.  '</p> </center> </span>';


?>

</body>
</html>
