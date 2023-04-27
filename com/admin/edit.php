<?php 
$id = $_GET["id"];

try{ include("../controller/DBconnect.php");
    $select = "SELECT *FROM products WHERE id=? limit 1";
    $result= $connection->prepare($select);
    $result->execute([$id]);

   
    if($_POST){
    $sql= "UPDATE products SET images=?,title=?,description=?,price=? WHERE id =? LIMIT 1";
        
     $action= $connection->prepare($sql);
     $images= $_POST["images"];
     $title= $_POST["title"];
     $description= $_POST["description"];
     $price= $_POST["price"];
     $action->execute([$images,$title,$description,$price,$id]);
     echo "Product updated successfully";
     header("location:adminpanel.php");
    }
 
    }catch (PDOException $e) {
        echo $sql ."<br>". $e->getMessage();

    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<link rel="stylesheet"  href="style.css">
    <link rel="stylesheet"  href="style.css">
    <link rel ="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary" class="navbar" style="background-color: skyblue;" >
  

<div class="container-fluid">
  <form class="d-flex" role="search">
  <script src="script.js"></script>

        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-warning" type="submit">Search</button>
      </form>
    <a class="navbar-brand" style="color:white;" >FlawlessMae Skincare</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div style="margin-left: 320px;"  class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">view visitors</a>
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
</nav>

 <?php foreach($result as $res){ ?>   
    <form method= "post">
<div class="form_control">
<h1>Please Edit your preffered details </h1>
 
  <div>
  	<label><strong>Product Image</strong>:</label><input type="file" value="<?=$res['images']?>" name="images">
  </div>

 <div class="mb-3" style="width: 40%">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text"  value="<?=$res['title']?>" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>



<div class="mb-3" style="width: 40%">
    <label for="exampleInputEmail1" class="form-label">Description</label>
    <input type="text"  value="<?=$res['description']?>" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>






  <div class="mb-3" style="width: 40%">
    <label for="exampleInputEmail1" class="form-label">Price</label>
    <input type="text"  value="<?=$res['price']?>" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>



  <?php } ?> <br> <br>
  <div class="btn btn-primary">
  <button class="btn btn-primary">Update</button>
  </div>
</form>
</div>



  

<?php include "../controller/footer"; ?>

