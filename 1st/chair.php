<!DOCTYPE html>
<html>
<body>

<?php
session_start();

if(array_key_exists('email',$_SESSION) && array_key_exists('typ',$_SESSION) && $_SESSION['typ']=='chair' ) {

$a= $_SESSION['email'];
$b= $_SESSION['typ'];

$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn, "demo2");//Select the Database created
$selectVals = "SELECT filename FROM authorfiles";
$values = mysqli_query($conn, $selectVals);
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


echo ("Email: ". $a . "<br> Account Type: ". $b);
echo('
<h1> Chair </h1> 
<br><button id="1" class="button"> Paper(s) Evaluations </button> <br> <br>
<h3> Assign A Reviewer To Evaluate A Paper </h3> <br>
<form action="/chair_assignReviewer.php" method="get" enctype="text/plain">
  <label for="papers">Select A Paper:</label> <br>
  <select name="papers">  ');
  
  while ($row = mysqli_fetch_assoc($values)) {  // to iterate through all rows
    $aa= $row['filename'];
    echo ('<option value='. $aa. '>'.$aa. '</option>');
  }
  echo('
    </select>
  <br><br><br><br>

  <label for="reviewers">Select A Reviewer:</label><br>
  <select name="reviewers"> ');
  
$selectVals2 = "SELECT email FROM system1 WHERE typ='reviewer'";
$values2 = mysqli_query($conn, $selectVals2);
  while ($row = mysqli_fetch_assoc($values2)) {  // to iterate through all rows
    $aa= $row['email'];
    echo ('<option value='. $aa. '>'.$aa. '</option>');
  }
  echo('    </select>
  <br><br><br>
  <input type="submit" value="Submit" class="button"> 
</form>
');



echo ('<br> <br> <br> <a href ="/logout.php"> Log Out </a>'); 
}

else{
echo ("Access Denied, Log In as a chair");
echo ('<br> <br> <a href ="/index.php"> Log In </a>'); 
}
//if ($b== "author") // for uploading file (& insert with $a)

?>


<script>
var a= document.getElementById("1"); 
a.addEventListener("click", function(){  
window.location.href= "displayEvaluations_chair.php";
});
</script>

</body>


</html>