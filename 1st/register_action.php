<?php
if (isset ($_GET["submit"])){
$conn = mysqli_connect("localhost","root","");//Create a connection to MySQL server
$sel = mysqli_select_db($conn, "demo2");//Select the Database created


$a= $_GET['email1'];
$b= $_GET["password1"];
$emailexistsflag=false;

$selectVals = "SELECT * FROM system1";
$values = mysqli_query($conn, $selectVals); 

while ($row = mysqli_fetch_assoc($values)) {  // to iterate through all rows
    $aa= $row['email'];
   // $cc= $row['typ'];
    
    if ($a == $aa )
    $emailexistsflag=true;
}

if ($emailexistsflag== true){
echo ("  
<script>alert('Email Already Exists!');
window.location.href= 'register.php';
</script>
"); 
// Note: double qoutes & single qoutes can be used interchangeably, but when they both exist in one line 
// you have to follow a scheme (the outer qoutes are double qoutes & the inner qoutes are single qoutes /vice versa)
}

if ($emailexistsflag== false){
$insertValues = "INSERT INTO system1 (email, pass, typ) VALUES ('$a', '$b', 'author')";
mysqli_query($conn, $insertValues);//Insert values into table


header("Location: index.php");
}
mysqli_close($conn);
}
else
echo ('<a href ="/register.php"> Register Please </a>   <br>');


?>