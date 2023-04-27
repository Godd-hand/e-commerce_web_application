<?php 
include("../controller/DBconnect.php");
?>


<?php 

if ($_POST){


  $target_dir = "../products/";
$target_file = $target_dir . basename($_FILES["images"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
$check = getimagesize($_FILES["images"]["tmp_name"]);
if($check !== false) {
  echo "File is an image - " . $check["mime"] . ".";
  $uploadOk = 1;
} else {
  echo "File is not an image.";
  $uploadOk = 0;
}
}

// Check if file already exists
if (file_exists($target_file)) {
echo "Sorry, file already exists.";
$uploadOk = 0;
}

// Check file size
if ($_FILES["images"]["size"] > 500000) {
echo "Sorry, your file is too large.";
$uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}


if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
  echo "The file ". htmlspecialchars( basename( $_FILES["images"]["name"])). " has been uploaded.";
  

}
}
  
 
  
  
  


?>



<?php

$sql= "INSERT INTO products(images,title,description,price) values(?,?,?,?)";
// the if statement next enable the form to be displayed without errors, even when it is empty. without it,there will be an error requesting that the values be entered.
$errors= [];

    if ($_POST){
    
    $title= $_POST["title"];
    $description= $_POST["description"];
    $price= $_POST["price"];
    $images= $_FILES["images"]["name"];
    $products= $connection->prepare($sql);
  
    ?>
    

 <?php // $connection above is from the imported file using the include statement
    $workon= $products->execute([$images,$title,$description,$price]); ?>
 <?php   if($workon) {
       echo "You added an item suscessfully !!!"."<br>";
       header("location:adminpanel.php");

        
    } else{
        echo "Item was not admitted into the database";

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
    <link rel ="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
</head>
<body style>

<nav class="navbar navbar-expand-lg bg-body-tertiary" class="navbar" style="background-color: skyblue;" >
  

<div class="container-fluid">
  <form class="d-flex" role="search">
  <script src="script.js"></script>

        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-warning" type="submit">Search</button>
      </form>
      <a class="navbar-brand" ><a style= "color: white; font-size: 25px" href="index.html"><em><strong style= "color: white; font-size: 40px" >F</strong></em>lawlessMae Skincare</a></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div style="margin-left: 320px;"  class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">view Registered members</a>
        </li>
          
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="home.php">Carts</a>
        </li> 
        
        </li>
        
        
      </ul>
      </div>
</div>
  </div>
</nav><div class="container">
    <div class="row">
        <div class="col-md-5">

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


<div class="container">
    <div class="row">
        <div class="col-md-5">

        </div>
         
      
      </div>
  
    </div>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-5">


              <h2 style="color: grey"> Add A New Product </h2>
<br>
<br>
              <form method="post" enctype="multipart/form-data">
                <div class="mb-3" style="width: 30%">
                <label for="exampleInputEmail1" class="form-label" style="background-color:skyblue; border: 10px solid grey; border-radius:15px; width:90px; text-align:center;">Product's Image</label><br>
                <input type="file"   aria-describedby="emailHelp" name="images">
                </div>

              
              <div class="mb-3" style="width: 80%">
              <label  class="form-label">Product Name</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" required>
              </div>
  


              <div class="mb-3" style="width: 80%">
               <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="description"></textarea>
              </div>


    
    
              <div class="mb-3" style="width: 80%">
               <label for="exampleInputEmail1" class="form-label">Product Price</label>
               <input type="number" step="0.01" class="form-control" aria-describedby="emailHelp" name="price" required>
              </div>
    

    
    
  
               <button type="submit" class="btn btn-success">Upload Product</button>
  

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