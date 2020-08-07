<?php 
 include '../lib/Session.php';
 Session::checkSession();
?>

<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Formet.php'; ?>

<?php 
$db = new Database();
$fm = new Formet();
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Add New Post | Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <link href="css/fancy-button/fancy-button.css" rel="stylesheet" type="text/css" />
    <!--Jquery UI CSS-->
    <link href="css/themes/base/jquery.ui.all.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <!--jQuery Date Picker-->
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.datepicker.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.progressbar.min.js" type="text/javascript"></script>
    <!-- jQuery dialog related-->
    <script src="js/jquery-ui/external/jquery.bgiframe-2.1.2.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.draggable.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.position.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.resizable.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.dialog.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.blind.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.explode.min.js" type="text/javascript"></script>
    <!-- jQuery dialog end here-->
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <!--Fancy Button-->
    <script src="js/fancy-button/fancy-button.js" type="text/javascript"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
        <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>
    <!-- /TinyMCE -->
    <style type="text/css">
        #tinymce{font-size:15px !important;}
    </style>
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="img/livelogo.png" alt="Logo" />
                </div>
                <div class="floatleft middle">
                    <h1>Crypto Market Cloud</h1>
                    
                </div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                        <?php 
                        if (isset($_GET['action']) && $_GET['action']=="logout" ) {
                            Session::destroy();
                        }
                         ?>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello Admin</li>

                            <li><a href="?action=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
                <li class="ic-grid-tables"><a href="inbox.php"><span>Inbox</span></a></li>
                <li class="ic-charts"><a href="/index.php"><span>Visit Website</span></a></li>
            </ul>
        </div>
        <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
 <ul class="section menu">
                        <li><a class="menuitem">Blast News</a>
                            <ul class="submenu">
                                <li><a href="addpost.php">Add Blast News</a> </li>
                                <li><a href="postlist.php">Blast News List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">ICO</a>
                            <ul class="submenu">
                                <li><a href="icolist.php">Basic ICO List</a> </li>
                                <li><a href="icolistmp.php">Top Banner List</a> </li>
                                <li><a href="icolistlp.php">Project of the week List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">ADMIN</a>
                            <ul class="submenu">
                                <li><a href="adduser.php">Add Admin</a> </li>
                                <li><a href="profilelist.php">Admin List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Partner</a>
                            <ul class="submenu">
                                <li><a href="addpartner.php">Add Partner</a> </li>
                                <li><a href="partnerlist.php">Partner List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Company Social Link</a>
                            <ul class="submenu">
                                <li><a href="addsociallink.php">Add Social Link</a> </li>
                                <li><a href="sociallist.php">Social List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Directory</a>
                            <ul class="submenu">
                                <li><a href="adddirectory.php">Add Directory</a> </li>
                                <li><a href="derectorylist.php">Directory List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Point Request</a>
                            <ul class="submenu">
                                <li><a href="PointRequest.php">Request List</a> </li>
                                <li><a href="userlist.php">User List</a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Index Page Content</a>
                            <ul class="submenu">
                                <li><a href="addpriceandsell.php">Price And Sell Stutas</a> </li>
                                <li><a href="listofpriceandsell.php">List of Price And Sell Stutas</a> </li>
                                <li><a href="addvideo.php">Add Video</a> </li>
                                <li><a href="videolist.php">Video List</a> </li>
                                <li><a href="addteammember.php">Add Team Member</a> </li>
                                <li><a href="teammemberlist.php">Team Member List</a> </li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">               
                 <form action="dbconncetuser.php" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>USER NAME</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Post Title..." class="medium" name="username" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>PASSWORD</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Post Title..." class="medium" name="password" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
   <?php include 'inc/foter.php'; ?> 
