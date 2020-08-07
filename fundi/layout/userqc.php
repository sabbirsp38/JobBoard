<?php
// $fundi_Provides = $fundi_do = $fundi_From = $fundi_name = $minimum_salary = $fundi_slogan="";
// echo "ba**";
// if (isset($_POST['submit'])) {

// $con = new mysqli('localhost', 'root', '', 'gntitcoz_fnb_game');


// 		$fundi_Provides ='Educational loans' /*$con->real_escape_string($_POST['fundi_Provides'])*/;
// 		$fundi_do = $con->real_escape_string($_POST['fundi_do']);
// 		$fundi_From = $con->real_escape_string($_POST['fundi_From']);
// 		$fundi_name = $con->real_escape_string($_POST['fundi_name']);
// 		$minimum_salary = $con->real_escape_string($_POST['minimum_salary']);
// 		$fundi_slogan = $con->real_escape_string($_POST['fundi_slogan']);


// 		if ($fundi_Provides="Educational loans") {
// 			echo"Hoisa";
// 		}else{
// 			ini_set('display_errors', 1);
// 			ini_set('display_startup_errors', 1);
// 			error_reporting(E_ALL);
// 		}
// echo $fundi_Provides;
// }




?>





<?php include '../inc/hader.php'; 

?>
<div style="min-height: 50px;"></div>








<div class="container">
	<form method="post" enctype="multipart/form-data"  action="dbconncetqc.php" >
	    <div class="card">
	    <center><header class="card-header">
	    <h1 class="card-title">
	    <strong>Finding the questions answer hit You can visit <a target="_blank" href="https://www.fundi.co.za/">Our website</a></strong>
	    </h1>
	    </header></center>
	    <div class="card-body">
	    <div class="row">


            <div class="col-lg-6 col-md-6 col-sm-4"> 
              <div id="div_id_country" class="form-group"> 
                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">Fundi Provides?
                 </label>
                   <div class=""> 
                      <select name="fundi_Provides" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
                        <option value="Educational loans" selected="">Educational loans</option> 
                        <option value="Finance for all things">Finance for all things</option> 
                        <option value="Hugs">Hugs</option>  
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
              
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">What does Fundi do?
	                 </label>
	                   <div class=""> 
	                      <select name="fundi_do" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="Provide bursaries" selected="">Provide bursaries</option> 
	                        <option value="Give hugs">Give hugs</option> 
	                        <option value="One place for funding all things in Education">One place for funding all things in Education </option> 
	                      </select>
	                    </div>
	                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">Is Fundi a homegrown South African brand ?
	                 </label>
	                   <div class=""> 
	                      <select name="fundi_from" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="Yes" selected="">Yes</option> 
	                        <option value="No">NO</option> 
	                      </select>
	                    </div>
	                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">What was Fundi before the name change?
	                 </label>
	                   <div class=""> 	
	                      <select name="fundi_name" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="EduCate" selected="">EduCate</option> 
	                        <option value="EduLoan">EduLoan</option> 
	                        <option value="Edufund">Edufund </option> 
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">What’s the minimum salary per month you need to earn in order to qualify for a loan?
	                 </label>
	                   <div class=""> 
	                      <select name="minimum_salary" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="R10 000" selected="">R10 000</option> 
	                        <option value="R2500">R2500</option> 
	                        <option value="R5500">R5500 </option> 
	                        <option value="4000">4000</option> 
	                      </select>
	                    </div>
	                  </div>
                </div>	

              <!--   <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">What is Fundi’s slogan?
	                 </label>
	                   <div class=""> 
	                      <select name="fundi_slogan" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="Read more" selected="">Read more</option> 
	                        <option value="Know more. Be more">Know more. Be more</option> 
	                        <option value="Education is key">Education is key</option> 
	                      </select>
	                    </div>
	                  </div>
                </div>



                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">What is Fundi’s slogan?
	                 </label>
	                   <div class=""> 
	                      <select name="fundi_slogan" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="Read more" selected="">Read more</option> 
	                        <option value="Know more. Be more">Know more. Be more</option> 
	                        <option value="Education is key">Education is key</option> 
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">The Fundi logo has 6 colours?
	                 </label>
	                   <div class=""> 
	                      <select name="fundi_logo" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="True" selected="">True</option> 
	                        <option value="False">False</option> 
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">Does Fundi offer loans for tuition?
	                 </label>
	                   <div class=""> 
	                      <select name="offer_loans" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="True" selected="">True</option> 
	                        <option value="False">False</option> 
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">Does Fundi offer loans for student accommodation?
	                 </label>
	                   <div class=""> 
	                      <select name="offer_student_loans" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="True" selected="">True</option> 
	                        <option value="False">False</option> 
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">Fundi has created a cashless tap and go technology to keep schools cashless and safe, what is this called?
	                 </label>
	                   <div class=""> 
	                      <select name="fundi_cashless" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="FundiFy" selected="">FundiFy</option> 
	                        <option value="Fundischool">Fundischool</option>
	                        <option value="FundiPay">FundiPay</option>
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">Does Fundi offer loans for devices?
	                 </label>
	                   <div class=""> 
	                      <select name="loans_offer" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="True" selected="">True</option> 
	                        <option value="False">False</option>
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">	Does Fundi offer loans for School Fees?
	                 </label>
	                   <div class=""> 
	                      <select name="school_fees_loans" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="True" selected="">True</option> 
	                        <option value="False">False</option>
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">	Does Fundi offer loans for Uniforms?
	                 </label>
	                   <div class=""> 
	                      <select name="uniforms_offer" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="True" selected="">True</option> 
	                        <option value="False">False</option>
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">	Does Fundi offer loans for Tertiary Books?
	                 </label>
	                   <div class=""> 
	                      <select name="tertiary_books_offer" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="True" selected="">True</option> 
	                        <option value="False">False</option>
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">	Does Fundi offer loans for MBA?
	                 </label>
	                   <div class=""> 
	                      <select name="loans_for_mba" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="True" selected="">True</option> 
	                        <option value="False">False</option>
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">	Does Fundi offer loans for Short Courses?
	                 </label>
	                   <div class=""> 
	                      <select name="short_courses_loans" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="True" selected="">True</option> 
	                        <option value="False">False</option>
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">	Does Fundi offer loans for Diplomas?
	                 </label>
	                   <div class=""> 
	                      <select name="diplomas_loans" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="True" selected="">True</option> 
	                        <option value="False">False</option>
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">	Fundi Finances all things educations?
	                 </label>
	                   <div class=""> 
	                      <select name="fundi_finances" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="True" selected="">True</option> 
	                        <option value="False">False</option>
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">	Get funding for your studies in minimum 3 days?
	                 </label>
	                   <div class=""> 
	                      <select name="get_funding" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="True" selected="">True</option> 
	                        <option value="False">False</option>
	                      </select>
	                    </div>
	                  </div>
                </div>

                 <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">	What is the Fundi logo?
	                 </label>
	                   <div class=""> 
	                      <select name="fundi_logo" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="Star" selected="">Star</option> 
	                        <option value="Dandelion">Dandelion</option>
	                        <option value="Wheel">Wheel</option>
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">	When did Eduloan become Fundi–(Answer 2015) How many loans did Fundi get out over the years?
	                 </label>
	                   <div class=""> 
	                      <select name="eduloan" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="10000" selected="">10000</option> 
	                        <option value="800000">800000</option>
	                        <option value="2000">2000</option>
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">	What is the universe of Fundi Educational products called?
	                 </label>
	                   <div class=""> 
	                      <select name="educational_products" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="Fundiverse" selected="">Fundiverse</option> 
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">	When did Eduloan start?
	                 </label>
	                   <div class=""> 
	                      <select name="eduloan_start" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="1996" selected="">1996</option> 
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">	What is the Fundi Vision?
	                 </label>
	                   <div class=""> 
	                      <select name="fundi_vision" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="The one source that enables your education and learning journey" selected="">The one source that enables your education and learning journey</option> 
	                        <option value="To be awesome">To be awesome</option>
	                        <option value="To make studying a reality">To make studying a reality</option>
	                      </select>
	                    </div>
	                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-4"> 
	              <div id="div_id_country" class="form-group"> 
	                <label for="id_country" class="col-form-label text-uppercase text-fader fw-500 fs-11">	The fundi purpose is to?
	                 </label>
	                   <div class=""> 
	                      <select name="fundi_purpose" class="select form-control select2-hidden-accessible" id="id_country" tabindex="-1" aria-hidden="true" type="text"> 
	                        <option value="enable your dreams" selected="">enable your dreams</option> 
	                        <option value="enable education">enable education</option>
	                        <option value="enable life">enable life</option>
	                      </select>
	                    </div>
	                  </div>
                </div>

















<!-- TOtala DIV END here  -->

                <div class="col-lg-3 col-md-3 col-sm-4"> 
                </div>
                <div class="col-lg-6 col-md-6 col-sm-4"> <center><input type="submit" name="save" value="Submit " class="btn btn-success " id="submit-id-save" style="padding: 8px 58px;font-size: 30px;font-weight: bold;text-transform: uppercase;"></center>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4"> 
                </div>




        </div>
    </form>
	
</div>











<div style="min-height: 100px;"></div>



<?php include '../inc/foter.php'; ?>