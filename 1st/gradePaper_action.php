<!DOCTYPE html>
<html>
<body>

<?php
session_start(); 


if(array_key_exists('email',$_SESSION) && array_key_exists('grade',$_GET) && array_key_exists('comments',$_GET) && 
$_SESSION['typ']=='reviewer'){
    
$reviewer= $_SESSION['email'];
$a= $_GET["grade"];
$b= $_GET["comments"];

echo($reviewer. '<br> <br>');

if ($a!=null && $b!=null){

$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn, "demo2");//Select the Database created

//$selectVals = "SELECT paper,filepath FROM papersreviewers where reviewer= '$a' ";
//$values = mysqli_query($conn, $selectVals);

$insertValues = "UPDATE papersreviewers SET grade='$a', comments='$b' WHERE reviewer= '$reviewer' ";
mysqli_query($conn, $insertValues);//Insert values into table

echo ('Evaluation Completed <br><br><br>');
}
else
echo ('Evaluate Paper Please! <br> <br>');

echo ('
<a href = "gradePaper.php"> Re-evaluate Paper </a> <br> <br>

<a href = "reviewer.php"> Back To Homepage </a> <br> <br>

<a href ="/logout.php"> Log Out </a>
');

}
else {
echo ("Access Denied | Log In as a Reviewer");
echo (' <br> <br>
<a href ="/index.php"> Log In </a>
');
}

?>


</body>
</html>