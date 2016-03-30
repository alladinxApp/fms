<?
    require_once("inc/global.php"); 
    require_once(MODEL_PATH . USER_MODEL);

    if(isset($_POST['login']) && !empty($_POST['login']) && $_POST['login'] == 1){
        $username = $_POST['txtusername'];
        $pass = strtoupper($_POST['txtpassword']);
        $password = generatePassword($pass);

        // SET FMS DB
        $fms_db = new DBCOnfig;
        $fms_db->setFleetDB();

        // SET USER
        $user = new Table;
        $user->setSQLType($fms_db->getSQLType());
        $user->setInstance($fms_db->getInstance());
        $user->setView("v_usermaster");
        $user->setParam("WHERE userID = '$username' LIMIT 0,1");
        $user->doQuery("query");
        $row_user = $user->getLists();

        // CLOSING FMS DB
        $fms_db->DBClose();

        if($row_user[0]['userPass'] == $password){
            $_SESSION['SYS_USERID'] = $username;
            $_SESSION['SYS_UNAME'] = $row_user[0]['userName'];
            $_SESSION['SYS_AVATAR'] = USERPICS . $username . '/' . $row_user[0]['userPic'];
            $_SESSION['SYS_USERTYPE'] = $row_user[0]['userType'];
            $_SESSION['SYS_USERLVL'] = $row_user[0]['accessLevel'];

            // SET FMS DB
            $fms_db = new DBCOnfig;
            $fms_db->setFleetDB();

            // SET USER ACCESS
            $userassignee = new Table;
            $userassignee->setSQLType($fms_db->getSQLType());
            $userassignee->setInstance($fms_db->getInstance());
            $userassignee->setView("v_userassigneemapper");
            $userassignee->setParam("WHERE userID = '$username'");
            $userassignee->doQuery("query");
            $row_userassignee = $userassignee->getLists();
            $num_userassignee = $userassignee->getNumRows();

            // GET ASSIGNEE ID
            $assigneeID = $row_userassignee[0]['assigneeID'];

            // SET ASSIGNEE TO SESSION
            $_SESSION['SYS_ASSIGNEE'] = $assigneeID;

            // CLOSING FMS DB
            $fms_db->DBClose();

            $alert = new MessageAlert;
            $alert->setURL(BASE_URL);
            $alert->setMessage("Access Granted.");
            $alert->Alert();
        }else{
            $alert = new MessageAlert;
            $alert->setURL(BASE_URL . "login.php");
            $alert->setMessage("Invalid username or password! Please relogin.");
            $alert->Alert();
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>AdminDesigns - A Responsive HTML5 Admin UI Framework</title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <? require_once(INCLUDE_PATH . "_font.php"); ?>
    <? require_once(INCLUDE_PATH . "_theme_css.php"); ?>
    <? require_once(INCLUDE_PATH . "_adminform_css.php"); ?>
    <? require_once(INCLUDE_PATH . "_favicon.php"); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->
</head>

<body class="external-page sb-l-c sb-r-c">

    <!-- Start: Main -->
    <div id="main" class="animated fadeIn">

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- begin canvas animation bg -->
            <div id="canvas-wrapper">
                <canvas id="demo-canvas"></canvas>
            </div>

            <!-- Begin: Content -->
            <section id="content">

                <div class="admin-form theme-info" id="login1">

                    <div class="row mb15 table-layout">

                        <!-- <div class="col-xs-6 va-m pln">
                            <a href="dashboard.html" title="Return to Dashboard">
                                <img src="assets/img/logos/logo_white.png" title="AdminDesigns Logo" class="img-responsive w250">
                            </a>
                        </div> -->

                        <!-- <div class="col-xs-6 text-right va-b pr5">
                            <div class="login-links">
                                <a href="pages_login.html" class="active" title="Sign In">Sign In</a>
                                <span class="text-white"> | </span>
                                <a href="pages_register.html" class="" title="Register">Register</a>
                            </div>

                        </div> -->

                    </div>

                    <div class="panel panel-info mt10 br-n">

                        <div class="panel-heading heading-border bg-white">
                            <span class="panel-title hidden"><i class="fa fa-sign-in"></i>Register</span>
                            <div class="section row mn">
                                <div class="col-sm-6">
                                    <a href="#" class="button btn-social facebook span-left mr5 btn-block">
                                        <span><i class="fa fa-facebook"></i>
                                        </span>Facebook</a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#" class="button btn-social twitter span-left mr5 btn-block">
                                        <span><i class="fa fa-twitter"></i>
                                        </span>Twitter</a>
                                </div>
                                <!-- <div class="col-sm-4">
                                    <a href="#" class="button btn-social googleplus span-left btn-block">
                                        <span><i class="fa fa-google-plus"></i>
                                        </span>Google+</a>
                                </div> -->
                            </div>
                        </div>

                        <!-- end .form-header section -->
                        <form method="post" id="login-form" name="login-form">
                            <div class="panel-body bg-light p30">
                                <div class="row">
                                    <div class="col-sm-12 pr30">

                                        <!-- <div class="section row hidden">
                                            <div class="col-md-6">
                                                <a href="#" class="button btn-social facebook span-left mr5 btn-block">
                                                    <span><i class="fa fa-facebook"></i>
                                                    </span>Facebook</a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="#" class="button btn-social twitter span-left mr5 btn-block">
                                                    <span><i class="fa fa-twitter"></i>
                                                    </span>Twitter</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#" class="button btn-social googleplus span-left btn-block">
                                                    <span><i class="fa fa-google-plus"></i>
                                                    </span>Google+</a>
                                            </div>
                                        </div> -->
                                        
                                        <div class="section">
                                            <label for="username" class="field-label text-muted fs18 mb10">Username</label>
                                            <label for="username" class="field prepend-icon">
                                                <input type="text" name="txtusername" id="txtusername" class="gui-input" placeholder="Enter username">
                                                <label for="username" class="field-icon"><i class="fa fa-user"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="section">
                                            <label for="username" class="field-label text-muted fs18 mb10">Password</label>
                                            <label for="password" class="field prepend-icon">
                                                <input type="password" name="txtpassword" id="txtpassword" class="gui-input" placeholder="Enter password">
                                                <label for="password" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                    </div>
                                    <!-- <div class="col-sm-5 br-l br-grey pl30">
                                        <h3 class="mb25"> You'll Have Access To Your:</h3>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> Unlimited Email Storage</p>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> Unlimited Photo Sharing/Storage</p>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> Unlimited Downloads</p>
                                        <p class="mb15">
                                            <span class="fa fa-check text-success pr5"></span> Unlimited Service Tickets</p>
                                    </div> -->
                                </div>
                            </div>
                            <!-- end .form-body section -->
                            <div class="panel-footer clearfix p10 ph15">
                                <button type="submit" class="button btn-primary mr10 pull-right">Login</button>
                                <label class="switch block switch-primary pull-left input-align mt10">
                                    <input type="checkbox" name="remember" id="remember" checked>
                                    <label for="remember" data-on="YES" data-off="NO"></label>
                                    <span>Remember me</span>
                                </label>
                            </div>
                            <!-- end .form-footer section -->
                            <input type="hidden" id="login" name="login" value="1" />
                        </form>
                    </div>
                </div>

            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->

    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="assets/js/pages/login/EasePack.min.js"></script>
    <script type="text/javascript" src="assets/js/pages/login/rAF.js"></script>
    <script type="text/javascript" src="assets/js/pages/login/TweenLite.min.js"></script>
    <script type="text/javascript" src="assets/js/pages/login/login.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="assets/js/utility/utility.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <!-- <script type="text/javascript" src="assets/js/demo.js"></script> -->

    <script type="text/javascript" src="assets/admin-tools/admin-forms/js/jquery.validate.min.js"></script>

    <!-- Page Javascript -->
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core      
            Core.init();

            // Init Demo JS
            Demo.init();

            // Init CanvasBG and pass target starting location
            CanvasBG.init({
                Loc: {
                    x: window.innerWidth / 2,
                    y: window.innerHeight / 3.3
                },
            });

            $("#txtusername").focus();

            $( "#login-form" ).validate({
                errorClass: "state-error",
                validClass: "state-success",
                errorElement: "em",

                rules: {
                    txtusername: {
                        required: true
                    },
                    txtpassword: {
                        required: true
                    }
                },

                messages:{
                    txtusername: {
                        required: 'Please enter username!'
                    },
                    txtpassword: {
                        required: 'Please enter password!'
                    }
                }
            });
        });
    </script>
    <!-- END: PAGE SCRIPTS -->
</body>
</html>