<?php include 'inc/hader2.php' ?>



<div class="container">

	<?php

          if (!isset($_GET['$job_uid']) || $_GET['$job_uid']==NULL  ) {
            header("Location: 404.php") ;
           
          }else{
             $job_uid= $_GET['$job_uid'];
          }

        ?>
         <?php

                      $query = "select * from job where job_uid = '$job_uid' ";
                      $post = $db->select($query);
                      $result= $post -> fetch_assoc()
                        ?>


	  <form data-provide="validation" data-disable="false" method="post" autocomplete="off" enctype="multipart/form-data"  action="dbconncet_applyjob.php ? $job_uid=<?php echo $result['job_uid']; ?>" >
                <div class="card">
                <center><header class="card-header">
                <h1 class="card-title">
                <strong><?php echo $result['title']; ?></strong>
                </h1>
                </header></center>
			              <div class="card-body">
			                <div class="row">
			                  <div class="col-md-6"> 
			                    <div class="row"> 
			                        <div class="col-12"> 
			                          <div id="div_id_title" class="form-group"> 
			                              <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require">Name
			                              </label> 
			                            <div class=""> 
			                              <input type="text" name="name" maxlength="256" class="textinput textInput form-control" required="" id="id_title"> 
			                              
			                            </div> 
			                          </div> 
			                        </div>
			                        <div class="col-12"> 
			                          <div id="div_id_title" class="form-group"> 
			                              <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require">Upload Your CV
			                              </label> 
			                            <div class=""> 
			                              <input type="file" name="cv" class="  form-control" required="true" > 
			                              
			                            </div> 
			                          </div> 
			                        </div>
			                        <?php 
			                         $query = "select * from job where job_uid = '$job_uid' ";
                                      $post = $db->select($query);
                                      $result= $post -> fetch_assoc();
                                      if($result['q_1']!=null){
			                        ?>
			                        <div class="col-12"> 
			                          <div id="div_id_title" class="form-group"> 
			                              <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require"><?php echo $result['q_1']; ?>
			                              </label> 
			                            <div class=""> 
			                              <input type="text" name="qus1" class="  form-control" required="true" placeholder="Answar Here..."> 
			                            </div> 
			                          </div> 
			                        </div>
			                        
                                      <?php }
                                       if($result['q_2']!=null){
			                        ?>
			                        <div class="col-12"> 
			                          <div id="div_id_title" class="form-group"> 
			                              <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require"><?php echo $result['q_2']; ?>
			                              </label> 
			                            <div class=""> 
			                              <input type="text" name="qus2" class="  form-control" required="true" placeholder="Answar Here..."> 
			                            </div> 
			                          </div> 
			                        </div>
			                        
                                      <?php } 

                                       if($result['q_3']!=null){
			                        ?>
			                        <div class="col-12"> 
			                          <div id="div_id_title" class="form-group"> 
			                              <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require"><?php echo $result['q_3']; ?>
			                              </label> 
			                            <div class=""> 
			                              <input type="text" name="qus3" class="  form-control" required="true" placeholder="Answar Here..."> 
			                            </div> 
			                          </div> 
			                        </div>
			                        
                                      <?php } 

                                       if($result['q_4']!=null){
			                        ?>
			                        <div class="col-12"> 
			                          <div id="div_id_title" class="form-group"> 
			                              <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require"><?php echo $result['q_4']; ?>
			                              </label> 
			                            <div class=""> 
			                              <input type="text" name="qus4" class="  form-control" required="true" placeholder="Answar Here..."> 
			                            </div> 
			                          </div> 
			                        </div>
			                        
                                      <?php } 

                                       if($result['q_5']!=null){
			                        ?>
			                        <div class="col-12"> 
			                          <div id="div_id_title" class="form-group"> 
			                              <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require"><?php echo $result['q_5']; ?>
			                              </label> 
			                            <div class=""> 
			                              <input type="text" name="qus5" class="  form-control" required="true" placeholder="Answar Here..."> 
			                            </div> 
			                          </div> 
			                        </div>
			                        
                                      <?php } 




                                      ?>

                                       

			                     </div>
			                     <center><button type="submit" class="btn">Apply Now</button></center>
			                   </div>

			                 </div>
			                 

			              </div>
                 </div>
               </form>
              </div>






<?php include 'inc/foter.php' ?>