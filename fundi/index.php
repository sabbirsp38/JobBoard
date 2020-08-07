
<?php 
 include 'lib/Session.php';
 Session::init();
?>

<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/Formet.php'; ?>

<?php 


$db = new Database();
$fm = new Formet();
 if (isset($_GET['ref'])) {

  $id= $_GET['ref'];
          
}else{
$id= null;
}
if(isset($_SESSION['uni_id']))
{
header("Location:layout/index.php");
}



?>



<?php
  $msg = "";

  if (isset($_POST['submit'])) {
    // $con = new mysqli('localhost', 'root', '', 'fnb_game');
    $con = new mysqli('localhost', 'gntitcoz_fnbgameadmin', 'mR759f)UIu^v', 'gntitcoz_fnb_game');

    $user_number = $con->real_escape_string($_POST['number']);
    $password = $con->real_escape_string($_POST['password']);

    if ($user_number == "" || $password == "")
      $msg = "Number or Password Should Not Be Empty!";
    else {
      $sql = $con->query("SELECT id, password, uni_id,user_number FROM tbl_user WHERE user_number='$user_number'");
      if ($sql->num_rows > 0) {
                $data = $sql->fetch_array();
                
                      
                      if (password_verify($password, $data['password'])) {

                      Session::set("login", true);
                 $_SESSION['uni_id'] = $data['uni_id'];
                 $ref = $_GET['ref'];
                 header("Location:layout/index.php");
              
          }else
                  $msg = "Password Incorrect!";
                    
                } else
                  $msg = "You Are Not Registered User";
      } 
      
    }
  
?>
<?php include 'inc/hader2.php'; ?>

  
<!--   <div class="container bodydiv" >
    <div class="row justify-content-center">
      <div class="col-md-6 col-md-offset-3" align="center">
        <center><h3 class="colrtext">Welcome To Crypto Market Cloud</h3></center>
                 
        

        <center><h3 style="color: red;"><?php if ($msg != "") echo $msg . "<br><br>" ?></h3></center>

        
          <form method="post" action="index.php?ref=<?php echo $id ?>">
          <input class="form-control" name="number" type="text" placeholder="Phone Number"><br>
          <input class="form-control" ><br>
          <input class=" login_but" type="submit" name="submit" value="Log In">
        </form>
        

      </div>
    </div>
  </div> -->






      <div class="container-fluid DIS" style="margin-top: 30px;">
  <div class="container">
    <div class="haderimg">
      <!--<img src="img/header.png" class="haderimg img-responsive ">-->
   </div>
   <center>
    <div class="row" >

       <form action="index.php?ref=<?php echo $id ?>" method="post" enctype="multipart/form-data">
        
                <div class="card">
                    <center><header class="card-header">
                <h1 class="card-title">
                <strong>Login Form</strong>
                <br>
               
<center><p class="colrtext">New on this Platfrom <a style="color: blue;" href="register_new.php">Register</a></p></center>
                </h1>
                <h1 class="card-title" style="color: red;">
                
                <?php if ($msg != "") echo $msg . "<br><br>" ?>
                
                </h1>
                </header></center>
                <div class="card-body">
                      <div class="container_iner">
                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group"> 
                              <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require">Phone Number with Country Code
                              </label>
                              <div class="regst">
                              <input name="number" type="text" placeholder="For example, +27761234567" class="textinput textInput form-control" required style="width:50%;"/> 

                              </div>
                              </div>
                              </div>
                              
                              
                              
                              <div class="col-md-12">
                              <div class="form-group"> 
                              <label for="id_title" class="col-form-label text-uppercase text-fader fw-500 fs-11 require">Password
                              </label>
                              <div class="regst">
                              <input name="password" type="password" placeholder="Password..." class="textinput textInput form-control" required style="width:50%;"/> 
                              </div>
                              </div>
                              </div>



                              

                          
                           <div class="col-md-4 col-md-offset-4">
                        <div class="form-group"> 
                              
                              <div class="regst">
                              <input type="submit" name="submit" value="Log In" class="textinput textInput form-control"  style="width: 100%;background: #1d0091;border: 0px;color: white;font-size: 18px;text-transform: uppercase;font-weight: bold; " />
                              </div>
                              <br>
                             
                              </div>
                              </div>

                    </div>
               
                                   
                              
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </center>
                </div>
              </div>
                  <?php include 'inc/foter.php'; ?>






























<?php //include 'inc/foter.php'; ?>