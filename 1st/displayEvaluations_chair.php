<?php
session_start();

if(array_key_exists('email',$_SESSION) && array_key_exists('typ',$_SESSION) && $_SESSION['typ']=="chair") {

$a= $_SESSION['email'];
$b= $_SESSION['typ'];


echo ("Email: ". $a . "<br> Account Type: ". $b . '<br>');

$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn, "demo2");//Select the Database created
$selectVals = "SELECT filename FROM authorfiles";
$values = mysqli_query($conn, $selectVals);
echo ('
<style>body {
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
.button{
	font-size: 12px;
	border-radius: 30%;
	padding: 10px 24px;
	background-color: green; 
	color: white;
	transition-duration: 0.4s;
	font-family: "Lucida Handwriting", cursive;
	font-weight: bold;
	}
.button:hover {
background-color: white; 
color: black;
  }
</style>
');

echo('
<h1> Evaluations </h1>

<form action="/displayEvaluations2_chair.php" method="get" enctype="text/plain">
  <label for="papers">Select a paper:</label> <br><br>
  <select name="papers">  ');
  
  while ($row = mysqli_fetch_assoc($values)) {  // to iterate through all rows
    $aa= $row['filename'];
    echo ('<option value='. $aa. '>'.$aa. '</option>');
  }
  echo('
    </select>
    <br><br><br><br>
    <input type="submit" value="Submit" class="button"> 
  ');



echo ('<br> <br> <a href ="/chair.php"> Back To Homepage / Assign Reviewers To Evaluate Papers</a>'); 
echo ('<br> <br> <a href ="/logout.php"> Log Out </a>'); 

}
else{
echo ("Access Denied, Log In as an author");
echo ('<br> <a href ="/index.php"> Log In </a>');
}

?>