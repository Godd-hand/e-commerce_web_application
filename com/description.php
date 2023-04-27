
<?php 
session_start();
?>

<?php include "heading.php"; ?>
<?php include "controller/DBconnect.php"; ?><br><br><br>

<?php 

 
$id =$_GET['id'];
$sql= "SELECT * FROM products where id ='$id' ";

      $result = $connection->prepare($sql);
      $result->execute();
      $outcome = $result->fetchAll(pdo::FETCH_ASSOC);
      ?>
      <?php  foreach($outcome as $i => $display): ?>
            <div class="project_box ">
                     <div class="dark_white_bg" ><img src="products/<?php echo $display['images']; ?>" width="30%" ></div>
                    
                     <h3>$<?php  echo $display['price'] ?> </h3>
                  </div>
                  
      <?php  echo $display['description']; ?>.<br>
      <?php  echo  "<a href= 'login.php'><button type='button' class='btn btn-primary btn-lg'>Pay Now</button></a>"; ?>


      <?php endforeach; ?>
 
 <br>
 <br><br>
 
 
      
      
