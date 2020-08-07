<?php include 'inc/hader.php'; ?>       
    <!-- Banner -->
    <div class="banner banner-1 banner-1-bg">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="banner-content">
              <h1>58,246 Job Listed</h1>
              <p>Create free account to find thousands Jobs, Employment & Career Opportunities around you!</p>
              <a href="job-listing.php" class="button">Apply Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner End -->

    <!-- Search and Filter -->
    <div class="searchAndFilter-wrapper">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="searchAndFilter-block">
              <div class="searchAndFilter">
                <form action="job-listing_search.php" class="search-form" method="post">
                  <input type="text" placeholder="Enter Keywords" name="Keywords">
                  <select class="selectpicker" id="search-location" name="location">
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
                  <select class="selectpicker" id="search-category" name="category">
                    <option value="">Category</option>
                    <option  value="Accounting" >Accounting / Finance</option>
                    <option value="Health Care" >Health Care</option>
                    <option value="Garments" >Garments / Textile</option>
                    <option value="Telecommunication" >Telecommunication</option>
                    <option value="Others" >Others</option>
                  </select>
                  <button class="button primary-bg"><i class="fas fa-search"></i>Search Job</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Search and Filter End -->

    <!-- Jobs -->
    <div class="section-padding-bottom alice-bg">
      <div class="container">
        <div class="row">
          <div class="col">
            <ul class="nav nav-tabs job-tab" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="recent-tab" data-toggle="tab" href="#recent" role="tab" aria-controls="recent" aria-selected="true">Recent Job</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="recent" role="tabpanel" aria-labelledby="recent-tab">
                <div class="row">
              <?php 
                  $per_page = 20;
                  if (isset($_GET["page"])) {
                    $page= $_GET["page"];
                  }else{
                    $page =1;
                  }
                  $start_from = ($page-1) * $per_page;?>
                       <?php
                      $query = "select * from job"; 
                      $result = $db->select($query);
                      $total_rows = mysqli_num_rows($result);
                      $total_page = ceil ($total_rows/$per_page);?>
                  <?php
                          $query = "select * from job order by id desc limit $start_from, $per_page";
                          $post = $db->select($query);
                          if ($post) {
                            while ($result= $post -> fetch_assoc()) {
                            ?>



                  <div class="col-lg-6">
                    <div class="job-list half-grid">
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
                            <a href="applyjob.php? $job_uid=<?php echo $result['job_uid']; ?>"class="button">Apply Now</a>
                          </div>
                          <p class="deadline"><?php echo $result['dead-line']; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
<?php }?>
              <div class="col-lg-12 col-md-12 col-sm-12">  
                  <?php
                      $query = "select * from job"; 
                      $result = $db->select($query);
                      $total_rows = mysqli_num_rows($result);
                      $total_page = ceil ($total_rows/$per_page);?>

                      <?php
                      echo " <span class=paginetation >  <a class='prev page-numbers' href='index.php?page=1'><i class='fas'>First Page</i></a>";

                      for ($i=1; $i<= $total_page; $i++) { 
                       echo "<a class='page-numbers' href='index.php?page=".$i." '>".$i. ">></a>";
                       } 


                       echo "<a class=' page-numbers' href='index.php?page=$total_page'><i class='fas'>Last Page</i></a></span>"?>

                      
             
                </div>

                  <!--paginetation-->
  
    
    <?php } ?>

<!--paginetation-->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Jobs End -->

    <!-- Top Companies -->
    <div class="section-padding-top padding-bottom-90">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="section-header">
              <h2>Top Companies</h2>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="company-carousel owl-carousel">

                 <?php
                          $query = "select * from job order by id desc limit $start_from, $per_page";
                          $post = $db->select($query);
                          if ($post) {
                            while ($result= $post -> fetch_assoc()) {
                            ?>
              <div class="company-wrap">
                <div class="thumb">
                  <a href="job-details.php? $id=<?php echo $result['id']; ?>">
                    <img src="upload/<?php echo $result['img']; ?>" class="img-fluid" alt="" onerror="this.src='images/error.png';">
                  </a>
                </div>
                <div class="body">
                  <h4><a href="employer-details.php"><?php echo $result['c_name']; ?></a></h4>
                  <span><?php echo $result['c_location']; ?></span>
                  <a href="job-details.php? $id=<?php echo $result['id']; ?>" class="button"><?php echo $result['vacancy']; ?> Open Positions</a>
                </div>
              </div>
<?php }} ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Top Companies End -->
    




   
    <!-- Testimonial -->
   <!--  <div class="section-padding-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="testimonial">
              <div class="testimonial-quote">
                <img src="images/testimonial/quote.png" class="img-fluid" alt="">
              </div>
              <div class="testimonial-for">
                <div class="testimonial-item">
                  <p>“On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charmsto send our denim shorts wardrob One”</p>
                  <h5>Maria Marlin @ Google</h5>
                </div>
                <div class="testimonial-item">
                  <p>“On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charmsto send our denim shorts wardrob Two”</p>
                  <h5>Laura Harper @ Amazon</h5>
                </div>
                <div class="testimonial-item">
                  <p>“On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charmsto send our denim shorts wardrob Three”</p>
                  <h5>John Doe @ Envato</h5>
                </div>
                <div class="testimonial-item">
                  <p>“On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charmsto send our denim shorts wardrob Four”</p>
                  <h5>Jenny Doe @ Dribbble</h5>
                </div>
                <div class="testimonial-item">
                  <p>“On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charmsto send our denim shorts wardrob Five”</p>
                  <h5>Michle Clark @ Apple</h5>
                </div>
                <div class="testimonial-item">
                  <p>“On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charmsto send our denim shorts wardrob Two”</p>
                  <h5>Laura Harper @ Amazon</h5>
                </div>
                <div class="testimonial-item">
                  <p>“On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charmsto send our denim shorts wardrob Three”</p>
                  <h5>John Doe @ Envato</h5>
                </div>
              </div>
              <div class="testimonial-nav">
                <div class="commenter-thumb">
                  <img src="images/testimonial/thumb-1.jpg" class="img-fluid commenter" alt="">
                  <img src="images/testimonial/1.png" class="comapnyLogo" alt="">
                </div>
                <div class="commenter-thumb">
                  <img src="images/testimonial/thumb-2.jpg" class="img-fluid commenter" alt="">
                  <img src="images/testimonial/2.png" class="comapnyLogo" alt="">
                </div>
                <div class="commenter-thumb">
                  <img src="images/testimonial/thumb-3.jpg" class="img-fluid commenter" alt="">
                  <img src="images/testimonial/3.png" class="comapnyLogo" alt="">
                </div>
                <div class="commenter-thumb">
                  <img src="images/testimonial/thumb-4.jpg" class="img-fluid commenter" alt="">
                  <img src="images/testimonial/4.png" class="comapnyLogo" alt="">
                </div>
                <div class="commenter-thumb">
                  <img src="images/testimonial/thumb-5.jpg" class="img-fluid commenter" alt="">
                  <img src="images/testimonial/5.png" class="comapnyLogo" alt="">
                </div>
                <div class="commenter-thumb">
                  <img src="images/testimonial/thumb-2.jpg" class="img-fluid commenter" alt="">
                  <img src="images/testimonial/2.png" class="comapnyLogo" alt="">
                </div>
                <div class="commenter-thumb">
                  <img src="images/testimonial/thumb-3.jpg" class="img-fluid commenter" alt="">
                  <img src="images/testimonial/3.png" class="comapnyLogo" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- Testimonial End -->

    <!-- NewsLetter -->
   <!--  <div class="newsletter-bg padding-top-90 padding-bottom-90">
      <div class="container">
        <div class="row">
          <div class="col-xl-5 col-lg-6">
            <div class="newsletter-wrap">
              <h3>Newsletter</h3>
              <p>Get e-mail updates about our latest news and Special offers. We don’t send spam so don’t worry.</p>
              <form action="#" class="newsletter-form form-inline">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Email address...">
                </div>
                <button class="btn button">Submit<i class="fas fa-caret-right"></i></button>
                <p class="newsletter-error">0 - Please enter a value</p>
                <p class="newsletter-success">Thank you for subscribing!</p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- NewsLetter End -->

<?php include 'inc/foter.php'; ?> 