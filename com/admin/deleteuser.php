<?php 
session_start();
if(isset($_SESSION['admin'])){ ?> 
 
 <?php } else{
        
        header("location:adminpanel.php");//line 1-5 set the login seesion here
      } ?>



<?php 

try{

    include("../controller/DBconnect.php");
    
    $id =$_GET['id']; //we set a variable to obtain unique data.
    $sql= "DELETE FROM users where id ='$id'";

     $action= $connection->prepare($sql);
     $action->execute();
     
     echo "Product deleted successfully";
     header("location:members.php");
    }catch (PDOException $e) {
        echo $sql ."<br>". $e->getMessage();

    }
?>