<!DOCTYPE html>
<html>
<body>

<?php
session_start();
echo ('<style>body {
	background: linear-gradient(-45deg, #d7dba4, #a8dba4, #23a6d5,#ba8c8d);
	background-size: 400% 400%;
	animation: gradient 5s ease infinite;
  text-align: center;
  font-family: "Copperplate",fantasy;
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
</style>
');

if(array_key_exists('email',$_SESSION) && array_key_exists('typ',$_SESSION) && $_SESSION['typ']=="admin") {

$a= $_SESSION['email'];
$b= $_SESSION['typ'];
echo ("Email: ". $a . "<br> Account Type: ". $b);

echo('
<h1> Admin </h1> <br>

<form action="addChair.php" method="get" >
  <input type="submit" name="addChair" value="Add Chair" class="button">  <br> <br> <br><br>
 </form>
 <form action="addReviewer.php" method="get" >
 <input type="submit" name="addReviewer" value="Add Reviewer" class="button"> 
</form>  
');


echo ('<br> <br> <a href ="/logout.php"> Log Out </a>'); 

}
else{
echo ("Access Denied, Log In as Admin");
echo ('<br> <a href ="/index.php"> Log In </a>');

}

//if ($b== "author") // for uploading file (& insert with $a)

?>
<script>
var a= document.getElementById("1"); 
a.addEventListener("click", function(){  
window.location.href= "displayEvaluations_author.php";
});
</script>


</body>
</html>