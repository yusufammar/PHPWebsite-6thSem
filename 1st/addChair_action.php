<?php
if (isset ($_GET["submit"])){

session_start();

$a= $_GET['email'];
$b= $_GET['password'];
$emailexistsflag=false;

$conn = mysqli_connect("localhost","root","");//Create a connection to MySQL server
$sel = mysqli_select_db($conn, "demo2");//Select the Database created
$selectVals = "SELECT * FROM system1";
$values = mysqli_query($conn, $selectVals); 

while ($row = mysqli_fetch_assoc($values)) {  // to iterate through all rows
    $aa= $row['email'];
    //$cc= $row['typ'];
    
    if ($a == $aa )
    $emailexistsflag=true;
}

if ($emailexistsflag== true){
echo ("  
<script>alert('Email Already Exists!');
window.location.href= 'admin.php';
</script>
"); 
// Note: double qoutes & single qoutes can be used interchangeably, but when they both exist in one line 
// you have to follow a scheme (the outer qoutes are double qoutes & the inner qoutes are single qoutes /vice versa)
}

if ($emailexistsflag== false){
$insertValues = "INSERT INTO system1 (email, pass, typ) VALUES ('$a', '$b', 'chair')";
mysqli_query($conn, $insertValues);//Insert values into table
echo ('<br> Chair Added Successfully! <br>');
echo ('<br> <a href ="/logout.php"> Log Out </a><br>');
}
}

echo ('<br> <a href ="/admin.php"> Go To Admin Page </a>');
?>    