<?php include 'inc/hader.php';?>

    <!-- Breadcrumb -->
    <div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="breadcrumb-area">
              <h1>Post A Job</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Post A Job</li>
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


    <div class="alice-bg section-padding-bottom">
      <div class="container no-gliters">
        <div class="row no-gliters">
          <div class="col">
            <div class="post-container">
              <div class="post-content-wrapper">
               <!--  From Start Here -->
                <form action="dbconncet_editejob.php? $id=<?php echo $result['id']; ?>" class="job-post-form" method="post"  data-provide="validation" data-disable="false" method="post" autocomplete="off" enctype="multipart/form-data" >
 






                  <div class="basic-info-input">
                    <h4><i data-feather="plus-circle"></i>Post A Job</h4>
                    <div id="job-title" class="form-group row">
                      <label class="col-md-3 col-form-label">Job Title</label>
                      <div class="col-md-9">
                        <input name="title" type="text" class="form-control" value="<?php echo $result['title']; ?>"  required="true">
                      </div>
                    </div>
                    <div id="job-title" class="form-group row">
                      <label class="col-md-3 col-form-label">Company Logo</label>
                      <div class="col-md-9">
                        <input name="img" type="file" class="form-control" data-allowed-file-extensions="png jpg jpeg JPG PNG JPEG" required="true" >
                      </div>
                    </div>
                    <div id="job-title" class="form-group row">
                      <label class="col-md-3 col-form-label">Job Daedline</label>
                      <div class="col-md-9">
                        <input value="<?php echo $result['dead_line']; ?>" name="dead_line" type="date" class="form-control" required="true">
                      </div>
                    </div>
                    <div id="job-title" class="form-group row">
                      <label class="col-md-3 col-form-label">Job Vacancy</label>
                      <div class="col-md-9">
                        <input name="vacancy" type="text" class="form-control" value="<?php echo $result['vacancy']; ?>" required="true">
                      </div>
                    </div>

                    <div id="job-summery" class="row">
                      <label class="col-md-3 col-form-label">Job Summery</label>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" required="true" name="job_cat">
                                <option value="<?php echo $result['category']; ?>"><?php echo $result['category']; ?></option>
                                <option  value="Accounting" >Accounting / Finance</option>
                                <option value="Health Care" >Health Care</option>
                                <option value="Garments" >Garments / Textile</option>
                                <option value="Telecommunication" >Telecommunication</option>
                                <option value="Others" >Others</option>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" required="true" name="location">
                                  <option value="<?php echo $result['location']; ?>" selected><?php echo $result['location']; ?></option>
                                  <option value="California">California</option>
                                  <option value="Las Vegas">Las Vegas</option>
                                  <option value="New Work">New Work</option>
                                  <option value="carolina">Carolina</option>
                                  <option value="chicago">Chicago</option>
                                  <option value="silicon-vally">Silicon Vally</option>
                                  <option value="washington">Washington DC</option>
                                  <option value="neveda">Neveda</option>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                            
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" required="true" name="job_type">
                                <option value="<?php echo $result['type']; ?>" ><?php echo $result['type']; ?></option>
                                <option value="Part Time" >Part Time</option>
                                <option value="Full Time" >Full Time</option>
                                <option value="Temperory" >Temperory</option>
                                <option value="Permanent" >Permanent</option>
                                <option value="Freelance" >Freelance</option>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" required="true" name="experience">
                                <option value="<?php echo $result['experience']; ?>" ><?php echo $result['experience']; ?></option>
                                <option value="Less than 1 Year" >Less than 1 Year</option>
                                <option value="2 Year" >2 Year</option>
                                <option value="3 Year" >3 Year</option>
                                <option value="4 Year" >4 Year</option>
                                <option value="Over 5 Year" >Over 5 Year</option>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <input type="text" name="salary_range_s" class="form-control" value="<?php echo $result['sel_range_s']; ?>" required="true">
                               <input type="text" name="salary_range_e" class="form-control" value="<?php echo $result['sel_range_e']; ?>" required="true">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" name="edu" required="true">
                                <option value="<?php echo $result['qualification']; ?>"><?php echo $result['qualification']; ?></option>
                                <option value="Matriculation">Matriculation</option>
                                <option value="Intermidiate">Intermidiate</option>
                                <option value="Gradute">Gradute</option>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" name="gender" required="true">
                                <option value="<?php echo $result['gender']; ?>"><?php echo $result['gender']; ?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="job-description" class="row">
                      <label class="col-md-3 col-form-label">Job Description</label>
                      <div class="col-md-9">
                        <textarea id="mytextarea" name="job_description" class="tinymce-editor tinymce-editor-1" placeholder="" required="true" ></textarea>
                      </div>
                    </div>
                    <div id="response" class="row">
                      <label  class="col-md-3 col-form-label">Responsibilities</label>
                      <div class="col-md-9">
                        <textarea id="mytextarea2" name="responsibilities" class="tinymce-editor tinymce-editor-2" placeholder="Responsibilities (Optional)" required="true"></textarea>
                      </div>
                    </div>
                    <div id="education" class="row">
                      <label class="col-md-3 col-form-label">Education</label>
                      <div class="col-md-9">
                        <textarea id="mytextarea3" name="education" class="tinymce-editor tinymce-editor-2" placeholder="Education (Optional)" required="true"></textarea>
                      </div>
                    </div>
                    <div id="others" class="row">
                      <label class="col-md-3 col-form-label">Other Benefits</label>
                      <div class="col-md-9">
                        <textarea id="mytextarea4" name="benefits" class="tinymce-editor tinymce-editor-2" placeholder="Description text here" required="true"></textarea>
                      </div>
                    </div>
                    <div id="post-location" class="form-group row">
                      <label class="col-md-3 col-form-label">Company Location</label>

                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-6">
                           <input type="text" name="c_location" class="form-control" value="<?php echo $result['c_location']; ?>" required="true">
                          </div>
                          <div class="col-md-6">

                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="post-location" class="form-group row">
                      <label class="col-md-3 col-form-label">Interview Question</label>

                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-6">
                           <input type="text" name="q_1" class="form-control" value="<?php echo $result['q_1']; ?>" required="true">
                           <input type="text" name="q_2" class="form-control" value="<?php echo $result['q_2']; ?>" required="true">
                           <input type="text" name="q_3" class="form-control" value="<?php echo $result['q_3']; ?>" required="true">
                           <input type="text" name="q_4" class="form-control" value="<?php echo $result['q_4']; ?>" required="true">
                           <input type="text" name="q_5" class="form-control" value="<?php echo $result['q_5']; ?>" required="true">
                          </div>
                          <div class="col-md-6">

                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="about-company" class="row">
                      <label class="col-md-3 col-form-label">About Company</label>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <input type="text" name="c_name" class="form-control" value="<?php echo $result['c_name']; ?>" required="true">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <input type="text" name="c_web" class="form-control" value="<?php echo $result['c_web']; ?>" required="true">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <textarea class="form-control" name="c_about" placeholder="Company Profile" required="true"></textarea>
                            </div>
                          </div>


                          

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-9 offset-md-3">
                        <div class="form-group terms">
                          <input class="custom-radio" type="checkbox" id="radio-4" name="termsandcondition">
                          <label for="radio-4">
                            <span class="dot"></span> You accepts our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"></label>
                      <div class="col-md-9">
                        <button class="button" type="submit">Edite Your Job</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="post-sidebar">
                <h5><i data-feather="arrow-down-circle"></i>Navigation</h5>
                <ul class="sidebar-menu">
                  <li><a href="#job-title">Job Title</a></li>
                  <li><a href="#job-summery">Job Summary</a></li>
                  <li><a href="#job-description">Job Descruption</a></li>
                  <li><a href="#response">Responsibilities</a></li>
                  <li><a href="#education">Education</a></li>
                  <li><a href="#others">Your Location</a></li>
                  <li><a href="#post-location">About Company</a></li>
                  <li><a href="#package">Select Package</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  

<?php include 'inc/foter.php';?>