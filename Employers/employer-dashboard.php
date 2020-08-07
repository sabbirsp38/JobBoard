<?php include 'inc/hader.php';

$uni_id = $_SESSION['uni_id'];
$ii=0;

if (isset($_GET['$uni_id'])) {

             $uni_id= $_GET['$uni_id'];
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

    <div class="alice-bg section-padding-bottom">
      <div class="container no-gliters">
        <div class="row no-gliters">
          <div class="col">
            <div class="dashboard-container">
              <div class="dashboard-content-wrapper">
                <div class="dashboard-section user-statistic-block">
                  <div class="user-statistic">
                    <i data-feather="command"></i>
                   <?php 
                       $sql = $con->query("SELECT id FROM job WHERE profile_uid='$uni_id'");
                         for ($i=0; $i < $sql->num_rows ; $i++) { 
                           $data = $sql->fetch_array();
                           $ii++; }  ?>
                    <span>Total Job Posted</span>
                     <h3><?php echo $ii;?></h3>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<center><h3>My Job</h3></center>

              <div class="dashboard-content-wrapper container">
                <div class="manage-job-container">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Job Title</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th class="action">Action</th>
                        <th>Applications</th>
                         <th>Selected  Peoples</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php 
                              if (isset($_GET['delid'])) {
                                $did = $_GET['delid'];
                                $query = "DELETE FROM job WHERE id='$did'";
                                 $db-> delete($query);
                              }
               
                          ?> 
                      <?php
                            $query = "select * from job WHERE profile_uid='$uni_id' order by id desc";
                            $post = $db->select($query);
                            if ($post) {
                              while ($result= $post -> fetch_assoc()) {
                        ?>
                      <tr class="job-items">
                        <td class="title">
                          <h5><a href="#"><?php echo $result['title']; ?></a></h5>
                          
                        </td>
                        <td class="deadline"><?php echo $result['dead_line']; ?></td>
                        <td class="status active">Active</td>
                        <td class="action">
                          <a href="../job-details.php? $id=<?php echo $result['id']; ?>" class="preview" title="Preview"><i data-feather="eye"></i></a>
                          <a href="editjob.php? $id=<?php echo $result['id']; ?>" class="edit" title="Edit"><i data-feather="edit"></i></a>
                          <a href="?delid=<?php echo $result['id']; ?> ?>" class="remove" title="Delete"><i data-feather="trash-2"></i></a>
                        </td>
                        <td class="application"><a href="job-application.php? $job_uid=<?php echo $result['job_uid']; ?>">View Application(s)</a></td>
                        <td class="application"><a href="selected-application.php? $job_uid=<?php echo $result['job_uid']; ?>">Selected  Peoples</a></td>
                      </tr>
                      </tr>
                       


  <?php }}?>


                    </tbody>
                  </table>
                 
                </div>
              </div>

<?php include 'inc/foter.php';?>