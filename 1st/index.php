<!DOCTYPE html>
<html>

<body>

<h1 id="1"> Login </h1> <br>

<form action="/login_action.php" method="get" enctype="text/plain" >
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email" ><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" ><br><br>
  <input type="submit" class="button" name="submit" value="Login">
</form> <br><br>

<a href ="/register.php"> Register (Authors Only) </a>  


<?php

echo ('
<style>
body {
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

session_start();
session_unset();
session_destroy();

?>

</body>
</html>