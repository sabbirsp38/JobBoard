<?php include 'inc/hader2.php'; ?> 

    <!-- Breadcrumb -->
    <div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="breadcrumb-area">
              <h1>Employer Listing</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Employer Listing</li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="col-md-6">
            <div class="breadcrumb-form">
              <form action="#">
                <input type="text" placeholder="Enter Keywords">
                <button><i data-feather="search"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Job Listing -->
    <div class="alice-bg section-padding-bottom">
      <div class="container">
        <div class="row no-gutters">
          <div class="col">
            <div class="employer-container">
              <div class="filtered-employer-wrapper">
                <div class="employer-view-controller-wrapper">
                  <div class="employer-view-controller">
                    <div class="controller list active">
                      <i data-feather="menu"></i>
                    </div>
                    <div class="controller grid">
                      <i data-feather="grid"></i>
                    </div>
                    <div class="employer-view-filter">
                      <select class="selectpicker">
                        <option value="" selected>Most Recent</option>
                        <option value="california">Top Rated</option>
                        <option value="las-vegas">Most Popular</option>
                      </select>
                    </div>
                  </div>
                  <div class="showing-number">
                    <span>Showing 1–12 of 28 Jobs</span>
                  </div>
                </div>
                <div class="employer-filter-result">

<?php 
                  $per_page = 10;
                  if (isset($_GET["page"])) {
                    $page= $_GET["page"];
                  }else{
                    $page =1;
                  }
                  $start_from = ($page-1) * $per_page;
                  ?>
                       <?php
                        
                      $query = "select * from job "; 
                      $result = $db->select($query);
                      $total_rows = mysqli_num_rows($result);
                      $total_page = ceil ($total_rows/$per_page);
                      ?>

<?php
                          $query = "select * from job order by id desc limit $start_from, $per_page";
                          $post = $db->select($query);
                          if ($post) {
                            while ($result= $post -> fetch_assoc()) {
                            ?>

                  <div class="employer">
                    <div class="thumb">
                      <a href="job-details.php? $id=<?php echo $result['id']; ?>">
                        <img src="upload/<?php echo $result['img']; ?>" class="img-fluid" alt="">
                      </a>
                    </div>
                    <div class="body">
                      <div class="content">
                        <h4><a href="job-details.php? $id=<?php echo $result['id']; ?>"><?php echo $result['c_name']; ?></a></h4>
                        <div class="info">
                          <span class="company-category"><a href="#"><i data-feather="briefcase"></i><?php echo $result['category']; ?></a></span>
                          <span class="location"><a href="#"><i data-feather="map-pin"></i><?php echo $result['location']; ?></a></span>
                        </div>
                      </div>
                      <div class="button-area">
                        <a href="job-details.php? $id=<?php echo $result['id']; ?>"><?php echo $result['vacancy']; ?></a>
                      </div>
                    </div>
                  </div>

  <?php }?>


                <div class="pagination-list text-center">  
                  <?php
                      $query = "select * from job"; 
                      $result = $db->select($query);
                      $total_rows = mysqli_num_rows($result);
                      $total_page = ceil ($total_rows/$per_page);?>

                      <?php
                      echo " <span class=paginetation >  <a class='prev page-numbers' href='job-listing.php?page=1'><i class='fas'>First Page</i></a>";

                      for ($i=1; $i<= $total_page; $i++) { 
                       echo "<a class='page-numbers' href='job-listing.php?page=".$i." '>".$i. ">></a>";
                       } 


                       echo "<a class=' page-numbers' href='job-listing.php?page=$total_page'><i class='fas'>Last Page</i></a></span>"?>

                      
             
                </div>

                  <!--paginetation-->
  
    
    <?php } ?>

<!--paginetation-->                 



                </div>
                <div class="pagination-list text-center">
                  <nav class="navigation pagination">
                    <div class="nav-links">
                      <a class="prev page-numbers" href="#"><i class="fas fa-angle-left"></i></a>
                      <a class="page-numbers" href="#">1</a>
                      <span aria-current="page" class="page-numbers current">2</span>
                      <a class="page-numbers" href="#">3</a>
                      <a class="page-numbers" href="#">4</a>
                      <a class="next page-numbers" href="#"><i class="fas fa-angle-right"></i></a>
                    </div>
                  </nav>                
                </div>
              </div>
              <div class="employer-filter-wrapper">
                <div class="selected-options same-pad">
                  <div class="selection-title">
                    <h4>You Selected</h4>
                    <a href="#">Clear All</a>
                  </div>
                  <ul class="filtered-options">
                  </ul>
                </div>
                <div class="employer-filter-dropdown same-pad category">
                  <select class="selectpicker">
                    <option value="" selected>Category</option>
                    <option value="california">Accounting / Finance</option>
                    <option value="california">Education</option>
                    <option value="california">Design &amp; Creative</option>
                    <option value="california">Health Care</option>
                    <option value="california">Engineer &amp; Architects</option>
                    <option value="california">Marketing &amp; Sales</option>
                    <option value="california">Garments / Textile</option>
                    <option value="california">Customer Support</option>
                    <option value="california">Digital Media</option>
                    <option value="california">Telecommunication</option>
                  </select>
                </div>
                <div class="employer-filter-dropdown same-pad location">
                  <select class="selectpicker">
                    <option value="" selected>Location</option>
                    <option value="california">Chicago</option>
                    <option value="california">New York City</option>
                    <option value="california">San Francisco</option>
                    <option value="california">Washington</option>
                    <option value="california">Boston</option>
                    <option value="california">Los Angeles</option>
                    <option value="california">Seattle</option>
                    <option value="california">Las Vegas</option>
                    <option value="california">San Diego</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Job Listing End -->

    <!-- Call to Action -->
    <div class="call-to-action-bg padding-top-90 padding-bottom-90">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="call-to-action-2">
              <div class="call-to-action-content">
                <h2>For Find Your Dream Job or Candidate</h2>
                <p>Add resume or post a job. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec.</p>
              </div>
              <div class="call-to-action-button">
                <a href="add-resume.html" class="button">Add Resume</a>
                <span>Or</span>
                <a href="post-job.html" class="button">Post A Job</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Call to Action End -->

  <?php include 'inc/foter.php'; ?> 