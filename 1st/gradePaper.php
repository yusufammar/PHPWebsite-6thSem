<!DOCTYPE html>
<html>
<body>

<?php
session_start();    
if(array_key_exists('email',$_SESSION) && array_key_exists('typ',$_SESSION) && $_SESSION['typ']== "reviewer" ) {

    $a= $_SESSION['email'];
    $b= $_SESSION['typ'];
    echo('<style>
    *{
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
     
        background-image: url(evaluate.jpg);
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
    


echo ("Email: ". $a . "<br> Account Type: ". $b);
echo ('<h1> Grade Paper </h1> <br>');

$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn, "demo2");//Select the Database created
$selectVals = "SELECT paper,filepath FROM papersreviewers where reviewer= '$a' ";
$values = mysqli_query($conn, $selectVals);

$row = mysqli_fetch_assoc($values); // takes only first word of the entry
$filename= $row['paper'];
$filepath= $row['filepath'];

if ($filename !=null){
echo ('Paper Assigned:   '. $filename. '<br><br>');
echo ('<a href ='.$filepath.'> Open File | To Download -> Righ Click & Save Link As </a> <br><br> '); 
}

else
echo ('No paper to grade! <br><br><br>');

echo ('
<form action="/gradePaper_action.php" method="get" enctype="text/plain" >
  <label for="grade">Grade:</label><br>
  <input type="text" name="grade" ><br>
  <label for="comments">Comments:</label><br>
  <textarea name="comments" rows="10" cols="30"></textarea> <br> <br>
  <input type="submit" value="Submit" class="button">
</form> <br><br>

<a href = "reviewer.php"> Back To Homepage </a> <br> <br>

<a href ="/logout.php"> Log Out </a>
');
}

else {
  echo ("Access Denied, Log In as a reviewer");
  echo ('<br> <br> <a href ="/index.php"> Log In </a>');
}


?>


</body>
</html>