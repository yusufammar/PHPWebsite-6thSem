<?php
session_start();

if(array_key_exists('email',$_SESSION) && array_key_exists('typ',$_SESSION) && $_SESSION['typ']== "chair"){

$conn = mysqli_connect("localhost","root","");
$sel = mysqli_select_db($conn, "demo2");


$a= $_GET['papers'];
$b= $_GET["reviewers"];

$selectVals = "SELECT reviewer,paper FROM papersReviewers where reviewer= '$b' ";
$values = mysqli_query($conn, $selectVals);

$row = mysqli_fetch_assoc($values);
$existingreviewer= $row['reviewer'];
$paperassigned= $row['paper'];
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

if ($paperassigned == $a && $existingreviewer == $b)  // checks if same paper & reviewer
echo("Reviewer already assigned to this paper to grade!");

if ($paperassigned != $a && $existingreviewer == $b) // checks if reviewer is assigned to another paper
echo("Reviewer assigned to another paper to grade! Select another reviewer please. ");

if ($paperassigned != $a && $existingreviewer != $b){  // assigns paper to reviewer (if reviewer not assigned to the same paper or another paper )
$selectVals2 = "SELECT filepath, email FROM authorfiles where filename='$a'";
$values2 = mysqli_query($conn, $selectVals2);

$row = mysqli_fetch_assoc($values2);
$filepath= $row['filepath'];
$authorname= $row['email'];

$insertValues = "INSERT INTO papersReviewers (paper, reviewer, filepath, author) VALUES ('$a', '$b', '$filepath', '$authorname')";
mysqli_query($conn, $insertValues);//Insert values into table

echo ("Paper assigned to reviewer");
//header("Location: chair.php");
}

echo ('<br><br> <a href ="/chair.php"> Assign another paper to a reviewer </a><br>');
echo ('<br> <a href ="/logout.php"> Log Out </a>');

mysqli_close($conn);
}
else{
    echo ("Access Denied, Log In as a chair");
    echo ('<br> <br> <a href ="/index.php"> Log In </a>'); 
    }


?>