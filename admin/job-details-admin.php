<?php include 'inc/hader2.php'; ?>  


    <!-- Candidates Details -->
    <div class="alice-bg padding-top-60 section-padding-bottom">
      <div class="container">
        <?php

          if (!isset($_GET['$id']) || $_GET['$id']==NULL  ) {
            header("Location: 404.php") ;
           
          }else{
             $id= $_GET['$id'];
          }

        ?>
  <?php

                      $query = "select * from job where id= $id ";
                      $post = $db->select($query);
                      $result= $post -> fetch_assoc()
                        ?>
        <div class="row">
          <div class="col">
            <div class="job-listing-details">
              <div class="job-title-and-info">
                <div class="title">
                  <div class="thumb">
                    <img src="upload/<?php echo $result['img']; ?>" class="img-fluid img-responsive" alt="">
                  </div>
                  <div class="title-body">
                    <h4><?php echo $result['title']; ?></h4>
                    <div class="info">
                      <span class="company"><a href="#"><i data-feather="briefcase"></i><?php echo $result['category']; ?></a></span>
                      <span class="office-location"><a href="#"><i data-feather="map-pin"></i><?php echo $result['location']; ?></a></span>
                      <span class="job-type full-time"><a href="#"><i data-feather="clock"></i><?php echo $result['type']; ?></a></span>
                    </div>
                  </div>
                </div>
                <div class="buttons">
                  <a class="apply" href="bdconncet_jobpublish.php?$id=<?php echo $result['id']; ?> " >Publish</a>
                </div>
              </div>
              <div class="details-information section-padding-60">
                <div class="row">
                  <div class="col-xl-7 col-lg-8">
                    <div class="description details-section">
                      <h4><i data-feather="align-left"></i>Job Description</h4>
                      <p><?php echo $result['description']; ?></p>
                    </div>
                    <div class="responsibilities details-section">
                      <h4><i data-feather="zap"></i>Responsibilities</h4>
                      <p><?php echo $result['responsibilities']; ?></p>
                    </div>
                    <div class="edication-and-experience details-section">
                      <h4><i data-feather="book"></i>Education + Experience</h4>
                      <p><?php echo $result['education']; ?></p>
                    </div>
                    <div class="other-benifit details-section">
                      <h4><i data-feather="gift"></i>Other Benefits</h4>
                      <p><?php echo $result['other_benefits']; ?></p>
                    </div>
                    <div class="job-apply-buttons">
                      <a href="bdconncet_jobpublish.php?$id=<?php echo $result['id']; ?> " >Publish</a>
                    </div>
                  </div>
                  <div class="col-xl-4 offset-xl-1 col-lg-4">
                    <div class="information-and-share">
                      <div class="job-summary">
                        <h4>Job Summary</h4>
                        <ul>
                          <li><span>Published on:</span> <?php echo $result['time']; ?></li>
                          <li><span>Vacancy:</span> <?php echo $result['vacancy']; ?></li>
                          <li><span>Employment Status:</span> <?php echo $result['type']; ?></li>
                          <li><span>Experience:</span><?php echo $result['experience']; ?></li>
                          <li><span>Job Location:</span><?php echo $result['location']; ?></li>
                          <li><span>Salary:</span><?php echo $result['sel_range']; ?></li>
                          <li><span>Gender:</span><?php echo $result['gender']; ?></li>
                          <li><span>Application Deadline:</span><?php echo $result['dead_line']; ?></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-7 col-lg-8">
                  <div class="company-information details-section">
                    <h4><i data-feather="briefcase"></i>About the Company</h4>
                    <ul>
                      <li><span>Company Name:</span> <?php echo $result['c_name']; ?></li>
                      <li><span>Address:</span><?php echo $result['c_location']; ?></li>
                      <li><span>Website:</span> <a href="#"><?php echo $result['c_web']; ?></a></li>
                      <li><span>Company Profile:</span></li>
                      <li><?php echo $result['c_profile']; ?></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Candidates Details End -->



<?php include 'inc/foter2.php'; ?> 