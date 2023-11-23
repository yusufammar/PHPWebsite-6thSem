<!DOCTYPE html>
<html>
<body>

<?php
session_start();

if(array_key_exists('email',$_SESSION) && array_key_exists('typ',$_SESSION) && $_SESSION['typ']=='reviewer' ) {

$a= $_SESSION['email'];
$b= $_SESSION['typ'];

$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn, "demo2");//Select the Database created
//$selectVals = "SELECT filename FROM authorfiles";
//$values = mysqli_query($conn, $selectVals);
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
	font-size: 16px;
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
<h1> Reviewer </h1> <br> 
<button id="button1" class= "button"> Grade Paper</button> 
');
echo ('<br> <br> <br> <a href ="/logout.php"> Log Out </a>'); 
}


else {
echo ("Access Denied, Log In as a Reviewer");
echo ('<br> <br> <a href ="/index.php"> Log In </a>');
}
//if ($b== "author") // for uploading file (& insert with $a)

?>


</body>

<script>
var a= document.getElementById("button1"); // button	
a.addEventListener("click", function(){  
window.location.href= "gradePaper.php";
});
</script>

</html>