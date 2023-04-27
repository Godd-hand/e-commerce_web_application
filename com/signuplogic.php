<?php include "controller/DBconnect.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home page</title>
    <link rel="stylesheet"  href="style.css">
    <link rel ="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</head>

<body>
 <?php   

$sql= "INSERT INTO users(first_name,last_name,email,password,date_of_birth) values(?,?,?,?,?)";
// the if statement next enable the form to be displayed without errors, even when it is empty. without it,there will be an error requesting that the values be entered.
    if ($_POST){
    $first_name= $_POST["first_name"];
    $last_name= $_POST["last_name"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    $date_of_birth= $_POST["date_of_birth"];
    $users= $connection->prepare($sql);
 
 
 
 // $connection above is from the imported file using the include statement
$workon= $users->execute([$first_name,$last_name,$email,$password,$date_of_birth]);
    if($workon) {
        echo "Your registration was suscessful !!!"."<br>";

        echo  "<a href= 'login.php'><button type='button' class='btn btn-dark btn-lg'>Login</button></a>";
  
    } else{
        echo "Data was not admitted into the database";

    }
}   

?>