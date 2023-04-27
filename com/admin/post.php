<?php   include "../heading.php"; ?>

  
<?php 
include "../controller/DBconnect.php";


 ?>




<?php 

if ($_POST){


  $target_dir = "uploads";
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

$sql= "INSERT INTO blog(images,heading,body,date_created) values(?,?,?,?)";
// the if statement with _POST global variable next enables the form to be displayed without errors, even when it is empty. without it,there will be an error requesting that the values be entered.
$errors= [];

    if ($_POST){
    $date_created= date('F-j-Y H:i:s');
    $heading= $_POST['heading'];
    $body= $_POST['body'];
    $images= $_FILES["images"]["name"];
    $news= $connection->prepare($sql);
  
    ?>
    

 <?php // $connection above is from the imported file using the include statement
    $workon= $news->execute([$images,$heading,$body,$date_created]); ?>
 <?php   if($workon) {
       echo "You added an item suscessfully !!!"."<br>";
       header("location: ../adminpanel.php");

        
    } else{
        echo "Error posting Article !! ";

    }
}   
 


?>




<form enctype="multipart/form-data">

<div class="container">
    <div class="row">
        <div class="col-md-5">

        </div>
        <div class="mb-3" style="width: 30%">
    
      </div>
  
    </div>

</div>


<div class="container">
    <div class="row">
        <div class="col-md-5">

        </div>
         
        <div class="mb-3" style="width: 48%">
        <input type="file"   aria-describedby="emailHelp" name="images" >
   
    <label for="exampleInputEmail1" class="form-label">Heading: </label>
    <input type="text"   name= "heading" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  required>
    </div>
  


    
   

      </div>
  
    </div>

</div>





    <div class="container">
    <div class="row">
        <div class="col-md-5">

        </div>
        <div class="mb-3">
    <label  class="form-label">Body:</label>
    <textarea cols="39" rows="26" type="text" class="form-control"  name="body" >

    </textarea>
    </div>

      
      </div>
  
    </div>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-5">

        </div>
         
        <div>
        <button type="submit" class="btn btn-success">Submit</button>      
</div>

      </div>
  
    </div>

</div>
</form>
<br>
<br>
<br>
<br>
<?php include "../controller/footer.php" ?>






