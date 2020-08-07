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

    <div class="alice-bg section-padding-bottom">
      <div class="container no-gliters">
        <div class="row no-gliters">
          <div class="col">
            <div class="post-container">
              <div class="post-content-wrapper">
               <!--  From Start Here -->
                <form action="dbconncet_jobpoast.php" class="job-post-form" method="post"  data-provide="validation" data-disable="false" method="post" autocomplete="off" enctype="multipart/form-data" >
                  <div class="basic-info-input">
                    <h4><i data-feather="plus-circle"></i>Post A Job</h4>
                    <div id="job-title" class="form-group row">
                      <label class="col-md-3 col-form-label">Job Title</label>
                      <div class="col-md-9">
                        <input name="title" type="text" class="form-control" placeholder="Your job title here" required>

                      </div>
                    </div>
                    <div id="job-title" class="form-group row">
                      <label class="col-md-3 col-form-label">Company Logo</label>
                      <div class="col-md-9">
                        <input name="img" type="file" class="form-control" data-allowed-file-extensions="png jpg jpeg JPG PNG JPEG" required="true">
                      </div>
                    </div>
                    <div id="job-title" class="form-group row">
                      <label class="col-md-3 col-form-label">Job Daedline</label>
                      <div class="col-md-9">
                        <input name="dead_line" type="date" class="form-control" required="true">
                      </div>
                    </div>
                    <div id="job-title" class="form-group row">
                      <label class="col-md-3 col-form-label">Job Vacancy</label>
                      <div class="col-md-9">
                        <input name="vacancy" type="text" class="form-control" placeholder="Job Vacancy" required="true">
                      </div>
                    </div>

                    <div id="job-summery" class="row">
                      <label class="col-md-3 col-form-label">Job Summery</label>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" required="true" name="job_cat">
                                <option value="">Select Category</option>
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
                              <i class="fa fa-caret-down"></i>
                            </div>
                            
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" required="true" name="job_type">
                                <option value="" >Job Type</option>
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
                                <option value="" >Experience (Optional)</option>
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
                              <input type="text" name="salary_range_s" class="form-control" placeholder="Salary Range($)" required="true">
                              <input type="text" name="salary_range_e" class="form-control" placeholder="Salary Range($)" required="true">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" name="edu" required="true">
                                <option value="">Qualification</option>
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
                                <option value="">Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Any">Any</option>
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
                        <textarea id="mytextarea" name="job_description" class="tinymce-editor tinymce-editor-1" placeholder="Description text here"  ></textarea>
                      </div>
                    </div>
                    <div id="response" class="row">
                      <label  class="col-md-3 col-form-label">Responsibilities</label>
                      <div class="col-md-9">
                        <textarea id="mytextarea2" name="responsibilities" class="tinymce-editor tinymce-editor-2" placeholder="Responsibilities (Optional)" ></textarea>
                      </div>
                    </div>
                    <div id="education" class="row">
                      <label class="col-md-3 col-form-label">Education</label>
                      <div class="col-md-9">
                        <textarea id="mytextarea3" name="education" class="tinymce-editor tinymce-editor-2" placeholder="Education (Optional)" ></textarea>
                      </div>
                    </div>
                    <div id="others" class="row">
                      <label class="col-md-3 col-form-label">Other Benefits</label>
                      <div class="col-md-9">
                        <textarea id="mytextarea4" name="benefits" class="tinymce-editor tinymce-editor-2" placeholder="Description text here" ></textarea>
                      </div>
                    </div>
                    <div id="post-location" class="form-group row">
                      <label class="col-md-3 col-form-label">Company Location</label>

                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-6">
                           <input type="text" name="c_location" class="form-control" placeholder="Company Location" required="true">
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
                              <input type="text" name="c_name" class="form-control" placeholder="Company Name" required="true">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <input type="text" name="c_web" class="form-control" placeholder="Web Address" required="true">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <textarea class="form-control" name="c_about" placeholder="Company Profile" ></textarea>
                            </div>
                          </div>
                          </div>
                          </div>

                          <label class="col-md-3 col-form-label">Add Interview Question</label>
                          <div class="col-md-9">
                                   

                                  <div class="container">
                                    <div class="row">
                                      <input type="hidden" name="count" value="1" />
                                          <div class="control-group" id="fields">
                                             
                                              <div class="controls" id="profs"> 
                                                 
                                                      <div id="field"><input autocomplete="off" class="form-control" id="field1" name="qus1" type="text" placeholder="Question 1" data-items="8"/><button id="b1" class="btn add-more" type="button">Add New</button></div>
                                                  
                                            
                                             
                                              </div>
                                          </div>
                                    </div>
                                  </div>
                              </div>
                        
                      
                    </div>
                    <div class="row">
                      <div class="col-md-9 offset-md-3">
                        <div class="form-group terms">
                          <input class="custom-radio" type="checkbox" id="radio-4" name="termsandcondition" >
                          <label for="radio-4">
                            <span class="dot"></span> You accepts our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 col-form-label"></label>
                      <div class="col-md-9">
                        <button class="button" type="submit" onclick="return verify_terms();">Post Your Job</button>
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

<script type="text/javascript">
  function verify_terms()
{
   if (!$('#radio-4').is(':checked'))
   {
     alert('Please agree terms and conditions');
     return false;
   }
}
</script>
<?php include 'inc/foter.php';?>