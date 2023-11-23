<?php
session_start();

if(array_key_exists('email',$_SESSION) && array_key_exists('typ',$_SESSION) && $_SESSION['typ']=="chair") {

$a= $_SESSION['email'];
$b= $_SESSION['typ'];

$c=$_GET['papers'];

echo ("Email: ". $a . "<br> Account Type: ". $b . '<br><br>');

echo ('<h1> Evaluations </h1>');

echo ('<h4> Paper Name: '. $c . '</h4>');


echo ('<button id="1" class="button"> Publish Paper </button> <br> <br>');

$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn, "demo2");//Select the Database created
$selectVals = "SELECT author, reviewer, grade, comments FROM papersreviewers where paper='$c' ";
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

while ($row = mysqli_fetch_assoc($values)) {  // to iterate through all rows
    $aa= $row['author'];
    $bb= $row['reviewer'];
    $cc= $row['grade'];
    $dd= $row['comments'];
    

echo ('<p> Author: '. $aa . '  | Reviewer: '. $bb . '<br> Grade: '. $cc .'<br> Comments: '. $dd . '</p>'); 
}

echo ('<br> <br> <a href ="/displayEvaluations_chair.php"> View Evaluations For Another Paper </a>'); 
echo ('<br> <br> <a href ="/chair.php"> Back To Homepage</a>'); 
echo ('<br> <br> <a href ="/logout.php"> Log Out </a>'); 

}
else{
echo ("Access Denied, Log In as a Chair");
echo ('<br> <a href ="/index.php"> Log In </a>');
}

?>


<script>

var b= "<?php echo ($c)?>"; // passing php variable to javascript

var a= document.getElementById("1"); 
a.addEventListener("click", function(){  
window.location.href= "publishPaper.php?submit=1 & filename=" + b ; //redirect to php file & passing variable
});

</script>

