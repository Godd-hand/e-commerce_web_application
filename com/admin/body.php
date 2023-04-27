<?php 
include "../controller/DBconnect.php"; 
include "../controller/Controller.php"; 
$id =$_GET['id'];
$sql= "SELECT * FROM news where id ='$id' ";

      $result = $connection->prepare($sql);
      $result->execute();
      $outcome = $result->fetchAll(pdo::FETCH_ASSOC);
      ?>
      <?php  foreach($outcome as $i => $display): ?>
            <div class="project_box ">
                     <div class="dark_white_bg" ><img src="uploads/<?php echo $display['images']; ?>" width="30%" ></div>
                    
                     <h3><?php  echo $display['heading'] ?> </h3>
                  </div>
                  
      <?php  echo $display['body']; ?>.<br>
      <?php  //echo  "<a href= 'login.php'><button type='button' class='btn btn-primary btn-lg'>Pay Now</button></a>"; ?>


      <?php endforeach; //another method for writing foreach most especially with HTML ?>
 
 <br>
 <br>
 <br>
 
 <?php  include "../controller/footer.php"; ?> 

      
      
