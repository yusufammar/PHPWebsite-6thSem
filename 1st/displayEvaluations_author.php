<?php
session_start();

if(array_key_exists('email',$_SESSION) && array_key_exists('typ',$_SESSION) && $_SESSION['typ']=="author") {

$a= $_SESSION['email'];
$b= $_SESSION['typ'];
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
.p{
color: green;
}
</style>
');


echo ("Email: ". $a . "<br> Account Type: ". $b . '<br><br>');

echo ('<h1> Paper(s) Evaluations </h1> ');

$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn, "demo2");//Select the Database created

$selectVals2 = "SELECT filename FROM authorfiles where published='yes' && email= '$a' ";
$values2 = mysqli_query($conn, $selectVals2);

echo ('<p class="p"> Published Papers (Submitted By You) </p> ');
while ($row2 = mysqli_fetch_assoc($values2)) {  // to iterate through all rows
    $zz= $row2['filename'];
    echo ( $zz. '<br>'); 
}


$selectVals = "SELECT paper, reviewer, grade, comments FROM papersreviewers where author='$a' ";
$values = mysqli_query($conn, $selectVals);

echo ( '<br>  <p class="p"> Evaluations </p>');
while ($row = mysqli_fetch_assoc($values)) {  // to iterate through all rows
    $aa= $row['paper'];
    $bb= $row['reviewer'];
    $cc= $row['grade'];
    $dd= $row['comments'];

echo ('<p> Paper: '. $aa . '  | Reviewer: '. $bb . '<br> Grade: '. $cc .'<br> Comments: '. $dd . '<br> </p>'); 
}

echo ('<br> <br> <a href ="/author.php"> Back To Homepage/ Submit Other Papers </a>'); 
echo ('<br> <br> <a href ="/logout.php"> Log Out </a>'); 

}
else{
echo ("Access Denied, Log In as an author");
echo ('<br> <a href ="/index.php"> Log In </a>');
}

?>