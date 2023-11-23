<?php
if (isset ($_GET["submit"])){
$a= $_GET['filename'];

$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn, "demo2");//Select the Database created

$insertValues = "UPDATE authorfiles SET published='yes' WHERE filename= '$a' ";
mysqli_query($conn, $insertValues);//Insert values into table
echo ('<style>body {
	background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
  text-align: center;
  font-family: "Copperplate",fantasy;
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}
</style>');

echo ('Paper Published <br><br><br>');
echo ('<a href ="displayEvaluations_chair.php"> View Evaluations or Publish Another Paper </a> <br> <br>');
echo ('<a href ="/chair.php"> Back To Homepage </a> <br><br>');
echo ('<a href ="/logout.php"> Log Out </a>');
//echo ($a);
}
else{
echo ('Access Denied <br> <br> ');
echo ('<a href ="/chair.php"> Back To Homepage </a>');
}

//$email="yousifammar.ya@gmail.com";
//$subject = 'Your subject for email';
//$message = $a;

//mail($email, $subject, $message);
?>