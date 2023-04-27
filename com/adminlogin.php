<?php 
session_start();
?>



<?php 
include("controller/DBconnect.php");
$msg ='';
if($_POST){
	$query= "SELECT * FROM admin Where user_name=? AND password=?";
	$user_name = $_POST["user_name"];
	$password = $_POST["password"];
	
	$result = $connection->prepare($query);
	$result->execute([$user_name,$password]);
	
	$admin = $result->fetchAll();

		if(count($admin)>0){
       $_SESSION['admin'] = $user_name;
      header("location:admin/adminpanel.php");
      
	}else{
		$msg = "Invalid Username or password";
  }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
    <link rel="stylesheet"  href="style.css">
    <link rel ="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</head>
<body style= " background-color:goldengreen;  background-size: contain; " >
<br>
<br>
<h2 style="text-align: center; color: black;" > Login As An Admin </h2>
<form method="post">
<?php
		if($msg){ ?>
			
			<div style="color:black; font-size:20px; text-align:center">
			<?php echo $msg ?>
		
		<?php } ?>
	

<div class="container">
    <div class="row">
        <div class="col-md-5">

        </div>
         
      
      </div>
  
    </div>

</div>


<div class="container"style="color: black;" >
    <div class="row">
        <div class="col-md-5">
        <div class="row" style="width: 200%";>
  <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Username</label>
  <div class="col-sm-10">
    <input type="text"  class="form-control form-control-lg" id="colFormLabelLg" placeholder="" required  name="user_name">
  </div>
</div>


     <div class="row" style="width: 200%";>
       <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Password</label>
       <div class="col-sm-10">
        <input type="password"  class="form-control form-control-lg" id="colFormLabelLg" placeholder="****************************************" required name="password">
       </div>
   </div><br>
    
<div>
<button type="submit" class="btn btn-primary">Login</button>
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
</body>

</html>