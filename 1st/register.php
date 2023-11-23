<!DOCTYPE html>
<html>

<body>

<h1> Register </h1> <br>

<form action="/register_action.php" method="get" enctype="text/plain" >
  <label for="email1">Email:</label><br>
  <input type="text" id="email" name="email1" ><br>
  <label for="password1">Password:</label><br>
  <input type="password" id="password" name="password1" ><br><br>
  <input type="submit" name="submit" value="Register" class= "button">
</form> <br><br>

<a href ="/index.php"> You already have an acount? Login </a>   <br>
<?php
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
</script>
');
?>



</body>
</html>