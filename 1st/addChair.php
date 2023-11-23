<?php
if (isset ($_GET["addChair"])){

session_start();

if(array_key_exists('email',$_SESSION) && array_key_exists('typ',$_SESSION) && $_SESSION['typ']=="admin") {

$a= $_SESSION['email'];
$b= $_SESSION['typ'];
echo ("Email: ". $a . "<br> Account Type: ". $b);

echo ('
<h1> Add Chair  </h1> <br>

<form action="/addChair_action.php" method="get" enctype="text/plain" >
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email" ><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" ><br><br>
  <input type="submit" name="submit" value="Submit" class="button">
</form> <br>

');
echo ('<style>body {
	background: linear-gradient(-45deg, #d7dba4, #a8dba4, #23a6d5,#ba8c8d);
	background-size: 400% 400%;
	animation: gradient 5s ease infinite;
  	text-align: center;
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

echo ('<br> <a href ="/logout.php"> Log Out </a> <br>');
}
}
echo ('<br> <a href ="/admin.php"> Go To Admin Page </a>');
?>    