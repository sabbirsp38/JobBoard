<?php include 'inc/hader2.php'; ?>  
    <!-- Breadcrumb -->
    <div class="alice-bg padding-top-70 padding-bottom-70">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="breadcrumb-area">
              <h1>Job Listing</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Job Listing</li>
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
            <div class="job-listing-container">
              <div class="filtered-job-listing-wrapper">
                <div class="job-view-controller-wrapper">
                  <div class="job-view-controller">
                    <div class="controller list active">
                      <i data-feather="menu"></i>
                    </div>
                    <div class="controller grid">
                      <i data-feather="grid"></i>
                    </div>
                    <div class="job-view-filter">
                      <select class="selectpicker">
                        <option value="" selected>Most Recent</option>
                        <option value="california">Top Rated</option>
                        <option value="las-vegas">Most Popular</option>
                      </select>
                    </div>
                  </div>
                  <div class="showing-number">
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
                        $from_data1 = addslashes ($_POST['Keywords']);
                        $from_data2 = addslashes ($_POST['location']);
                        $from_data3 = addslashes ($_POST['category']);
                    
                      
                        $query = "select * from job where title like '%$from_data1%'";

                           if($from_data3!='Category'){
                           $query .= "and category ='$from_data3'";
                           }
                           if($from_data2!='Location'){
                           $query .= "and location ='$from_data2'";
                           }
                   
                          
                          $total_rows = '0';
                          $post = $db->select($query);
                          if($post)
                          $total_rows = mysqli_num_rows($post);
                             ?>

                    <span>Showing 1–12 of <?php echo "$total_rows"?> Jobs</span>
                  </div>
                </div>
               

                  <?php




                          if ($post) {
                            while ($result= $post -> fetch_assoc()) {
                            ?>
                <div class="job-filter-result">
                      
                        <a href="job-details.php? $id=<?php echo $result['id']; ?>">
                          <div class="job-list">
                          <div class="thumb">
                            <a href="job-details.php? $id=<?php echo $result['id']; ?>">

                              <img src="upload/<?php echo $result['img']; ?>" class="img-fluid" alt="">
                            </a>
                          </div>
                          <div class="body">
                            <div class="content">
                              <h4><a href="job-details.php? $id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h4>
                              <div class="info">
                                <span class="company"><a href="#"><i data-feather="briefcase"></i><?php echo $result['category']; ?></a></span>
                                <span class="office-location"><a href="#"><i data-feather="map-pin"></i><?php echo $result['location']; ?></a></span>
                                <span class="job-type temporary"><a href="#"><i data-feather="clock"></i><?php echo $result['type']; ?></a></span>
                              </div>
                            </div>
                            <div class="more">
                              <div class="buttons">
                                <a href="applyjob.php? $job_uid=<?php echo $result['job_uid']; ?>" class="button">Apply Now</a>
                              </div>
                              <p class="deadline"><?php echo $result['dead_line']; ?></p>
                            </div>
                          </div>
                        </div>
                        </a>

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
              <div class="job-filter-wrapper">
                <div class="selected-options same-pad">
                  <div class="selection-title">
                    <h4>You Selected</h4>
                    <a href="#">Clear All</a>
                  </div>
                  <ul class="filtered-options">
                  </ul>
                </div>
                <div class="job-filter-dropdown same-pad category">
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
                <div class="job-filter-dropdown same-pad location">
                  <select class="selectpicker">
                    <option value="" selected>Location</option>
                    <option value="Afghanistan">Afghanistan</option> 
                            <option value="Albania">Albania</option> 
                            <option value="Algeria">Algeria</option> 
                            <option value="American Samoa">American Samoa</option> 
                            <option value="Andorra">Andorra</option> 
                            <option value="Angola">Angola</option> 
                            <option value="Anguilla">Anguilla</option> 
                            <option value="Antarctica">Antarctica</option> 
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option> 
                            <option value="Argentina">Argentina</option> 
                            <option value="Armenia">Armenia</option> 
                            <option value="Aruba">Aruba</option> 
                            <option value="Australia">Australia</option> 
                            <option value="Austria">Austria</option> 
                            <option value="Azerbaijan">Azerbaijan</option> 
                            <option value="Bahamas">Bahamas</option> 
                            <option value="Bahrain">Bahrain</option> 
                            <option value="Bangladesh">Bangladesh</option> 
                            <option value="Barbados">Barbados</option> 
                            <option value="Belarus">Belarus</option> 
                            <option value="Belgium">Belgium</option> 
                            <option value="Belize">Belize</option> 
                            <option value="Benin">Benin</option> 
                            <option value="Bermuda">Bermuda</option> 
                            <option value="Bhutan">Bhutan</option> 
                            <option value="Bolivia">Bolivia</option> 
                            <option value="Bonaire">Bonaire</option> 
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
                            <option value="Botswana">Botswana</option> 
                            <option value="Bouvet Island">Bouvet Island</option> 
                            <option value="Brazil">Brazil</option> 
                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
                            <option value="Brunei Darussalam">Brunei Darussalam</option> 
                            <option value="Bulgaria">Bulgaria</option> 
                            <option value="Burkina">Burkina Faso</option> 
                            <option value="Burundi">Burundi</option> 
                            <option value="Cabo Verde">Cabo Verde</option> 
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option> 
                            <option value="Canada">Canada</option> 
                            <option value="Cayman Islands">Cayman Islands</option> 
                            <option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option> 
                            <option value="Chile">Chile</option> 
                            <option value="China">China</option> 
                            <option value="Christmas Island">Christmas Island</option> 
                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
                            <option value="Colombia">Colombia</option> 
                            <option value="Comoros">Comoros</option> 
                            <option value="Congo">Congo</option> 
                            <option value="Cook Islands">Cook Islands</option> 
                            <option value="Costa Rica">Costa Rica</option> 
                            <option value="Croatia">Croatia</option> 
                            <option value="Cuba">Cuba</option> 
                            <option value="Curaçao">Curaçao</option> 
                            <option value="Cyprus">Cyprus</option> 
                            <option value="Czech Republic">Czech Republic</option> 
                            <option value="Denmark">Denmark</option> 
                            <option value="Djibouti">Djibouti</option> 
                            <option value="Dominica">Dominica</option> 
                            <option value="Dominican Republic">Dominican Republic
                            </option> 
                            <option value="Ecuador">Ecuador</option> 
                            <option value="Egypt">Egypt</option> 
                            <option value="El Salvador">El Salvador</option> 
                            <option value="Equatorial">Equatorial Guinea</option> 
                            <option value="Eritrea">Eritrea</option> 
                            <option value="Estonia">Estonia</option> 
                            <option value="Ethiopia">Ethiopia</option> 
                            <option value="Falkland Islands">Falkland Islands</option> 
                            <option value="Faroe Islands">Faroe Islands</option> 
                            <option value="Fiji">Fiji</option> 
                            <option value="Finland">Finland</option> 
                            <option value="France">France</option> 
                            <option value="French Guiana">French Guiana</option> 
                            <option value="French Polynesia">French Polynesia</option> 
                            <option value="French Southern Territories">French Southern Territories</option> 
                            <option value="Gabon">Gabon</option> 
                            <option value="Gambia">Gambia</option> 
                            <option value="Georgia">Georgia</option> 
                            <option value="Germany">Germany</option> 
                            <option value="Ghana">Ghana</option> 
                            <option value="Gibraltar">Gibraltar</option> 
                            <option value="Greece">Greece</option> 
                            <option value="Greenland">Greenland</option> 
                            <option value="Grenada">Grenada</option> 
                            <option value="Guadeloupe">Guadeloupe</option> 
                            <option value="Guam">Guam</option> 
                            <option value="Guatemala">Guatemala</option> 
                            <option value="Guernsey">Guernsey</option> 
                            <option value="Guinea">Guinea</option> 
                            <option value="Guinea-Bissau">Guinea-Bissau</option> 
                            <option value="Guyana">Guyana</option> 
                            <option value="Haiti">Haiti</option> 
                            <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option> 
                            <option value="Holy See">Holy See</option> 
                            <option value="Honduras">Honduras</option> 
                            <option value="Hong Kong">Hong Kong</option> 
                            <option value="Hungary">Hungary</option> 
                            <option value="Iceland">Iceland</option> 
                            <option value="India">India</option> 
                            <option value="Indonesia">Indonesia</option> 
                            <option value="Indonesia">Indonesia</option> 
                            <option value="Iran">Iran</option> 
                            <option value="Iraq">Iraq</option> 
                            <option value="Ireland">Ireland</option> 
                            <option value="Isle of Man">Isle of Man</option> 
                            <option value="Israel">Israel</option> 
                            <option value="Italy">Italy</option> 
                            <option value="Ivory Coast">Ivory Coast</option> 
                            <option value="Jamaica">Jamaica</option> 
                            <option value="Japan">Japan</option> 
                            <option value="Jersey">Jersey</option> 
                            <option value="Jordan">Jordan</option>
                             <option value="Kazakhstan">Kazakhstan</option> 
                             <option value="Kenya">Kenya</option> 
                             <option value="Kiribati">Kiribati</option> 
                             <option value="Kuwait">Kuwait</option> 
                             <option value="Kyrgyzstan">Kyrgyzstan</option> 
                             <option value="Laos">Laos</option> 
                             <option value="Latvia">Latvia</option> 
                             <option value="Lebanon">Lebanon</option> 
                             <option value="Lesotho">Lesotho</option> 
                             <option value="Liberia">Liberia</option> 
                             <option value="Libya">Libya</option> 
                             <option value="Liechtenstein">Liechtenstein</option> 
                             <option value="Lithuania">Lithuania</option> 
                             <option value="Luxembourg">Luxembourg</option> 
                             <option value="Macao">Macao</option> 
                             <option value="Macedonia">Macedonia</option> 
                             <option value="Madagascar">Madagascar</option> 
                             <option value="Malawi">Malawi</option> 
                             <option value="Malaysia">Malaysia</option> 
                             <option value="Maldives">Maldives</option> 
                             <option value="Mali">Mali</option> 
                             <option value="Malta">Malta</option> 
                             <option value="Marshall Islands">Marshall Islands</option> 
                             <option value="Martinique">Martinique</option> 
                             <option value="Mauritania">Mauritania</option> 
                             <option value="Mauritius">Mauritius</option> 
                             <option value="Mayotte">Mayotte</option> 
                             <option value="Mexico">Mexico</option> 
                             <option value="Micronesia">Micronesia</option>
                             <option value="Moldova">Moldova</option>
                             <option value="Monaco">Monaco</option> 
                             <option value="Mongolia">Mongolia</option> 
                             <option value="Montenegro">Montenegro</option> 
                             <option value="Montserrat">Montserrat</option> 
                             <option value="Morocco">Morocco</option> 
                             <option value="Mozambique">Mozambique</option> 
                             <option value="Myanmar">Myanmar</option> 
                             <option value="Namibia">Namibia</option> 
                             <option value="Nauru">Nauru</option> 
                             <option value="Nepal">Nepal</option> 
                             <option value="Netherlands">Netherlands</option> 
                             <option value="New Caledonia">New Caledonia</option> 
                             <option value="New Zealand">New Zealand</option> 
                             <option value="Nicaragua">Nicaragua</option> 
                             <option value="Niger">Niger</option> 
                             <option value="Nigeria">Nigeria</option> 
                             <option value="Niue">Niue</option> 
                             <option value="Norfolk Island">Norfolk Island</option> 
                             <option value="Northern Mariana Islands">Northern Mariana Islands</option> <option value="North Korea">North Korea</option> 
                             <option value="Norway">Norway</option> 
                             <option value="Oman">Oman</option> 
                             <option value="Pakistan">Pakistan</option> 
                             <option value="Palau">Palau</option> 
                             <option value="Palestine, State of">Palestine, State of</option> 
                             <option value="Panama">Panama</option> 
                             <option value="Papua New Guinea">Papua New Guinea</option> 
                             <option value="Paraguay">Paraguay</option> 
                             <option value="Peru">Peru</option> 
                             <option value="Philippines">Philippines</option> 
                             <option value="Pitcairn">Pitcairn</option> 
                             <option value="Poland">Poland</option> 
                             <option value="Portugal">Portugal</option> 
                             <option value="Puerto Rico">Puerto Rico</option> 
                             <option value="Qatar">Qatar</option> 
                             <option value="Réunion">Réunion</option> 
                             <option value="Romania">Romania</option> 
                             <option value="Russia">Russia</option> 
                             <option value="Rwanda">Rwanda</option> 
                             <option value="Saint Barthélemy">Saint Barthélemy</option> 
                             <option value="Saint Helena">Saint Helena</option> 
                             <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                             <option value="Saint Lucia">Saint Lucia</option> 
                             <option value="Saint Martin">Saint Martin</option> 
                             <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
                             <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option> 
                             <option value="Samoa">Samoa</option> 
                             <option value="San Marino">San Marino</option> 
                             <option value="Sao Tome and Principe">Sao Tome and Principe</option> <option value="Saudi Arabia">Saudi Arabia</option> 
                             <option value="Senegal">Senegal</option> 
                             <option value="Serbia">Serbia</option> 
                             <option value="Seychelles">Seychelles</option> 
                             <option value="Sierra Leone">Sierra Leone</option> 
                             <option value="Singapore">Singapore</option> 
                             <option value="Sint Maarten">Sint Maarten</option> 
                             <option value="Slovakia">Slovakia</option> 
                             <option value="Slovenia">Slovenia</option> 
                             <option value="Solomon Islands">Solomon Islands</option> 
                             <option value="Somalia">Somalia</option> 
                             <option value="South Africa">South Africa</option> 
                             <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option> 
                             <option value="South Korea">South Korea</option> 
                             <option value="South Sudan">South Sudan</option> 
                             <option value="Spain">Spain</option> 
                             <option value="Sri Lanka">Sri Lanka</option> 
                             <option value="Sudan">Sudan</option> 
                             <option value="Suriname">Suriname</option> 
                             <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
                             <option value="Swaziland">Swaziland</option> 
                             <option value="Sweden">Sweden</option> 
                             <option value="Switzerland">Switzerland</option> 
                             <option value="Syria">Syria</option> 
                             <option value="Taiwan">Taiwan</option> 
                             <option value="Tajikistan">Tajikistan</option> 
                             <option value="Tanzania">Tanzania</option> 
                             <option value="Thailand">Thailand</option> 
                             <option value="Timor-Leste">Timor-Leste</option>
                              <option value="Togo">Togo</option> 
                             <option value="Tokelau">Tokelau</option> 
                             <option value="Tonga">Tonga</option> 
                             <option value="Trinidad and Tobago">Trinidad and Tobago</option> 
                             <option value="Tunisia">Tunisia</option> 
                             <option value="Turkey">Turkey</option>
                             <option value="Turkmenistan">Turkmenistan</option> 
                             <option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
                             <option value="Tuvalu">Tuvalu</option> 
                             <option value="Uganda">Uganda</option> 
                             <option value="Ukraine">Ukraine</option> 
                             <option value="United Arab Emirates">United Arab Emirates</option> 
                             <option value="United Kingdom">United Kingdom</option> 
                             <option value="United States of America">United States of America</option> 
                             <option value="Uruguay">Uruguay</option> 
                             <option value="Uzbekistan">Uzbekistan</option> 
                             <option value="Vanuatu">Vanuatu</option> 
                             <option value="Venezuela">Venezuela</option> 
                             <option value="Vietnam">Vietnam</option> 
                             <option value="Virgin Islands (British)">Virgin Islands (British)</option> 
                             <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option> 
                             <option value="Wallis and Futuna">Wallis and Futuna</option> 
                             <option value="Western Sahara">Western Sahara</option> 
                             <option value="Yemen">Yemen</option> 
                             <option value="Zambia">Zambia</option> 
                             <option value="Zimbabwe">Zimbabwe</option>
                  </select>
                </div>
                <div data-id="job-type" class="job-filter job-type same-pad">
                  <h4 class="option-title">Job Type</h4>
                  <ul>
                    <li class="full-time"><i data-feather="clock"></i><a href="#" data-attr="Full Time">Full Time</a></li>
                    <li class="part-time"><i data-feather="clock"></i><a href="#" data-attr="Part Time">Part Time</a></li>
                    <li class="freelance"><i data-feather="clock"></i><a href="#" data-attr="Freelance">Freelance</a></li>
                    <li class="temporary"><i data-feather="clock"></i><a href="#" data-attr="Temporary">Temporary</a></li>
                  </ul>
                </div>
                <div data-id="experience" class="job-filter experience same-pad">
                  <h4 class="option-title">Experience</h4>
                  <ul>
                    <li><a href="#" data-attr="Fresh">Fresh</a></li>
                    <li><a href="#" data-attr="Less than 1 year">Less than 1 year</a></li>
                    <li><a href="#" data-attr="2 Year">2 Year</a></li>
                    <li><a href="#" data-attr="3 Year">3 Year</a></li>
                    <li><a href="#" data-attr="4 Year">4 Year</a></li>
                    <li><a href="#" data-attr="5 Year">5 Year</a></li>
                    <li><a href="#" data-attr="Avobe 5 Years">Avobe 5 Years</a></li>
                  </ul>
                </div>
                <div class="job-filter same-pad">
                  <h4 class="option-title">Salary Range</h4>
                  <div class="price-range-slider">
                    <div class="nstSlider" data-range_min="0" data-range_max="10000" 
                     data-cur_min="0"    data-cur_max="6130">
                      <div class="bar"></div>
                      <div class="leftGrip"></div>
                      <div class="rightGrip"></div>
                      <div class="grip-label">
                        <span class="leftLabel"></span>
                        <span class="rightLabel"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div data-id="post" class="job-filter post same-pad">
                  <h4 class="option-title">Date Posted</h4>
                  <ul>
                    <li><a href="#" data-attr="Last hour">Last hour</a></li>
                    <li><a href="#" data-attr="Last 24 hour">Last 24 hour</a></li>
                    <li><a href="#" data-attr="Last 7 days">Last 7 days</a></li>
                    <li><a href="#" data-attr="Last 14 days">Last 14 days</a></li>
                    <li><a href="#" data-attr="Last 30 days">Last 30 days</a></li>
                  </ul>
                </div>
                <div data-id="gender" class="job-filter same-pad gender">
                  <h4 class="option-title">Gender</h4>
                  <ul>
                    <li><a href="#" data-attr="Male">Male</a></li>
                    <li><a href="#" data-attr="Female">Female</a></li>
                  </ul>
                </div>
                <div data-id="qualification" class="job-filter qualification same-pad">
                  <h4 class="option-title">Qualification</h4>
                  <ul>
                    <li><a href="#" data-attr="Matriculation">Matriculation</a></li>
                    <li><a href="#" data-attr="Intermidiate">Intermidiate</a></li>
                    <li><a href="#" data-attr="Gradute">Gradute</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Job Listing End -->



<?php include 'inc/foter.php'; ?> 