<!DOCTYPE html>
<html>
<body>

<?php
session_start();

if(array_key_exists('email',$_SESSION) && array_key_exists('typ',$_SESSION) && $_SESSION['typ']=="author") {

$a= $_SESSION['email'];
$b= $_SESSION['typ'];


$deadline_year= 2021; $deadline_month= 6; $deadline_day= 30;   // deadline ********

echo('<style>*{
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  
}
html, body{
  height: 80%;
}
body{
  color :blue;
  display: grid;
  grid-template-rows: 1fr 50px;
 
  background-image: url(author5.jpg);
  justify-content: center;
  align-items: center;
  font-family: "Copperplate",fantasy;
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
</style>');

$redirect= 'upload_action.php?d='.$deadline_day.'&m='.$deadline_month.'&y='.$deadline_year.''; 
echo ("Email: ". $a . "<br> Account Type: ". $b);
echo('
<h1> Research Paper Upload </h1> <br>

<p> Deadline: '. $deadline_month.' / '. $deadline_day.' / '. $deadline_year. '   <br> (11:59 PM) </p> <br>

<form action='.$redirect.' method="post" enctype="multipart/form-data">
<label for="fileToUpload">File Name:</label><br><br>
  <input type="file" name="fileToUpload"  id="fileToUpload"> <br><br>
  <input type="submit" value="Submit Paper" class="button" name="submit"> 
</form> 
');
echo ('<br> <button id="1" class="button"> Paper(s) Evaluations </button>'); 

echo ('<br> <br> <a href ="/logout.php"> Log Out </a>'); 

}
else{
echo ("Access Denied, Log In as an author");
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