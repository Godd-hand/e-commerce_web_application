<?php 

try{

    include("../controller/DBconnect.php");
    
    $id =$_GET['id']; 
    $sql= "DELETE FROM products where id ='$id'";

     $action= $connection->prepare($sql);
     $action->execute();
     
     echo "Product deleted successfully";
     header("location:adminpanel.php");
    }catch (PDOException $e) {
        echo $sql ."<br>". $e->getMessage();

    }
?>