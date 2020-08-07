<?php include 'inc/hader.php';?>
<?php

          if (!isset($_GET['$id']) || $_GET['$id']==NULL  ) {
            header("Location: 404.php") ;
           
          }else{
             $id= $_GET['$id'];
          }

        ?>
   <?php

                      $query = "select * from job_applied where id= $id ";
                      $post = $db->select($query);
                      $result= $post -> fetch_assoc();
                      $job_uid = $result['uni_id'];
                        ?>
 <div class="container qbody">
   <div class="row">
    <div class="col-8">
     <p id="bodydetails">Name: <?php echo $result['name']; ?></p>
    </div>
    <div class="col-4">
     <a href="dbconncet_seleted.php?$id=<?php echo $result['id']; ?>" class="cus">Add To Short List</a>
    </div>
    <?php 
       $query1 = "select * from job where job_uid = '$job_uid' ";
        $post1 = $db->select($query1);
        $result1= $post1 -> fetch_assoc();
         if($result1['q_1']!=null){
         ?>
    <div class="col-12">
     <p id="bodydetails">Question: <?php echo $result1['q_1']; ?></p>
    </div>
    
    <div class="col-12">
     <p id="bodydetails">Answer: <?php echo $result['q_1']; ?></p>
    </div>
    <?php }
     if($result['q_2']!=null){
     ?>

     <div class="col-12">
     <p id="bodydetails">Question: <?php echo $result1['q_2']; ?></p>
    </div>
    
    <div class="col-12">
     <p id="bodydetails">Answer: <?php echo $result['q_2']; ?></p>
    </div>
    <?php }
     if($result['q_3']!=null){
     ?>

    <div class="col-12">
     <p id="bodydetails">Question: <?php echo $result1['q_3']; ?></p>
    </div>
    
    <div class="col-12">
     <p id="bodydetails">Answer: <?php echo $result['q_3']; ?></p>
    </div>
    <?php }
     if($result['q_4']!=null){
     ?>

     <div class="col-12">
     <p id="bodydetails">Question: <?php echo $result1['q_4']; ?></p>
    </div>
    
    <div class="col-12">
     <p id="bodydetails">Answer: <?php echo $result['q_4']; ?></p>
    </div>
    <?php }
     if($result['q_5']!=null){
     ?>

    <div class="col-12">
     <p id="bodydetails">Question: <?php echo $result1['q_5']; ?></p>
    </div>
    
    <div class="col-12">
     <p id="bodydetails">Answer: <?php echo $result['q_5']; ?></p>
    </div>
    <?php }
     
     ?>

    <div class="col-12">
     <p id="bodydetails">Curriculum Vitae</p>
    </div>
    <div class="col-12">
     <iframe src="../upload/<?php echo $result['cv']; ?>" width="100%" style="min-height:1000px"></iframe>
    </div>
   </div>
 </div>

<?php include 'inc/foter.php';?>