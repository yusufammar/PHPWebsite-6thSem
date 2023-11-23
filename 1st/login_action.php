<?php
if (isset ($_GET["submit"])){

$conn = mysqli_connect("localhost","root","");//Create a connection to MySQL server
mysqli_select_db($conn, "demo2");//Select the Database created
$selectVals = "SELECT * FROM system1";
$values = mysqli_query($conn, $selectVals); 

$a= $_GET["email"];
$b= $_GET["password"];
$f=false;

while ($row = mysqli_fetch_assoc($values)) {  // to iterate through all rows
    $aa= $row['email'];
    $bb= $row['pass'];
    $cc= $row['typ'];
    
    if ($a == $aa && $b == $bb && $cc == "admin"){
    session_start();
    $_SESSION['email'] = $a;
    $_SESSION['typ'] = $cc;
    header("Location: admin.php");
    $f=true;
   
    break;       
    }
    if ($a == $aa && $b == $bb && $cc == "author"){
        session_start();
        $_SESSION['email'] = $a;
        $_SESSION['typ'] = $cc;
        header("Location: author.php");
        $f=true;
        break;       
        }
    if ($a == $aa && $b == $bb && $cc == "chair"){
        session_start();
        $_SESSION['email'] = $a;
        $_SESSION['typ'] = $cc;
        header("Location: chair.php");
        $f=true;
        break;       
            }

    if ($a == $aa && $b == $bb && $cc == "reviewer"){
        session_start();
        $_SESSION['email'] = $a;
        $_SESSION['typ'] = $cc;
        header("Location: reviewer.php");
        $f=true;
        break;       
                    }
        
    }

    
    if ($f==false){
    echo ("  
    <script>alert('Wrong Email/Password!');
    window.location.href= 'index.php';
    </script>
    "); 
    //header("Location: index.php");
    }
    
mysqli_close($conn);
}
else
echo ('<a href ="/index.php">Login Please </a>   <br>');

?>