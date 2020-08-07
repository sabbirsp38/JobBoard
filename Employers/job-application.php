<?php include 'inc/hader.php';?>
<?php

          if (!isset($_GET['$job_uid']) || $_GET['$job_uid']==NULL  ) {
            header("Location: 404.php") ;
           
          }else{
             $job_uid= $_GET['$job_uid'];
          }

        ?>

    <!-- Breadcrumb -->
    <div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="breadcrumb-area">
              <h1>Employer Dashboard</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Employer Dashboard</li>
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
    </div>

<center><h3>Job Application</h3></center>

              <div class="dashboard-content-wrapper container">
                <div class="manage-job-container">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Applicant Name</th>
                        <th>View Application</th>
                        <th class="action">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                            $query = "select * from job_applied WHERE uni_id='$job_uid' order by id desc";
                            $post = $db->select($query);
                            if ($post) {
                              while ($result= $post -> fetch_assoc()) {
                        ?>
                      <tr class="job-items">
                        <td class="title">
                          <h5><a href="#"><?php echo $result['name']; ?></a></h5> 
                        </td>
                        <td class="deadline"><a href="job_application_details.php? $id=<?php echo $result['id']; ?>" >View Application</a></td>
                        
                        <td class="action">
                          <a href="delet.php? $delid=<?php echo $result['id']; ?> ?>" class="remove" title="Delete"><i data-feather="trash-2"></i></a>
                        </td>
                       
                      </tr>


  <?php }}?>


                    </tbody>
                  </table>

                </div>
              </div>

<?php include 'inc/foter.php';?>