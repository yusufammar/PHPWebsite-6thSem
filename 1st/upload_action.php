<?php
session_start();


if(array_key_exists('email',$_SESSION) && array_key_exists('typ',$_SESSION) && $_SESSION['typ']== "author"){

$a= $_SESSION['email'];
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn, "demo2");


if (isset ($_POST["submit"])) {
$date_array = getdate();

 $current_day= $date_array['mday']; $current_month= $date_array['mon']; $current_year= $date_array['year'];

 $deadline_year= $_GET['y']; $deadline_month= $_GET['m']; $deadline_day= $_GET['d'];
 //echo ($deadline_month.' / '. $deadline_day.' / '. $deadline_year);



 if ($current_year <= $deadline_year && $current_month <= $deadline_month && $current_day <= $deadline_day) {
    // echo ('Deadline Met: ' . $deadline_month.' / '. $deadline_day.' / '. $deadline_year. '<br>');
    $filename= $_FILES["fileToUpload"]['name']; 
    $target_dir = "papers/";
    $target_file = $target_dir . $filename;


    if ($filename=="") 
    echo ("No Paper Uploaded <br><br>");

    if (file_exists($target_file) && $filename!="") 
    echo "Sorry, file already exists <br><br>";

    if ($filename!="" && !(file_exists($target_file) )   ){
    $dst="papers/".$filename;
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $dst);

    $insertValues = "INSERT INTO authorfiles (email, filename, filepath) VALUES ('$a', '$filename', '$dst')";
    mysqli_query($conn, $insertValues);//Insert values into table
    
    echo ("Paper Uploaded <br><br>");
    }
}
else
{  echo ("Sorry, deadline has passed! <br><br>"); } 
}

echo ('<a href ="/author.php"> Upload Another Paper/ Go to Homepage </a> <br><br>'); 
echo ('<a href ="/logout.php"> Log Out </a>'); 
}
else{
    echo ("Access Denied, Log In as an Author");
    echo ('<br> <br> <a href ="/index.php"> Log In </a>'); 
    }


?>