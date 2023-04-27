
<?php 
session_start();
?>

<?php 
require_once("controller/DBconnect.php");
$msg ='';
if($_POST){
	$query= "SELECT * FROM users Where email=? AND password=?";
	$password = $_POST["password"];
	$email = $_POST["email"];
	
	$result = $connection->prepare($query);
	$result->execute([$email,$password]);
	
	$user = $result->fetchAll();

		if(count($user)>0){
       $_SESSION['user'] = $email;
      header("location:index.php");
      
	}else{
		$msg = "Invalid email or password";
	}
}
?>


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
<body style>
<br>
<br>

<form method="post">
<?php
		if($msg){ ?>
			
			<div style="color:red; font-size:18px; text-align:center">
			<?php echo $msg ?>
		
		<?php } ?>
	

<div class="container">
    <div class="row">
        <div class="col-md-5">

        </div>
         
      
      </div>
  
    </div>

</div>
<h3 style="text-align:center;" > Please Login.</h3>

<div class="container">
    <div class="row">
        <div class="col-md-5">
        <div class="row" style="width: 200%";>
  <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
  <div class="col-sm-10">
    <input type="email"  class="form-control form-control-lg" id="colFormLabelLg" placeholder="" required  name="email">
  </div>
</div>


     <div class="row" style="width: 200%";>
       <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Password</label>
       <div class="col-sm-10">
        <input type="password"  class="form-control form-control-lg" id="colFormLabelLg" placeholder="**********" required name="password">
       </div>
   </div><br>
    
<div>
<button type="submit" class="btn btn-success">Login</button>
</div>


        </div>
         
      
      </div>
  
    </div>

</div>



   <div class="container">
       <div class="row">
         <div class="col-md-5">

         </div>
         
      
       </div>
  
      </div>

</div>

</form> 
<a href= "signup.php"><h6 style="text-align: center;">Don't have an account ? sign up</h6></a>
</body>

</html>