<?php

session_start();
require_once 'models/model.php';
$login = new Models();
$color = "alert alert-info alert-dismissible";
$msg = "Hello Admin Please Login";

if($login->is_loggedin()!="")
{
 $login->redirect('home.php');
}
if(isset($_POST['login']))
{

 $Email = $_POST['Email'];

 $Password = $_POST['Password'];

 $Log = $login->Login($Email,$Password);
 if(!empty($Log))
 {
     $login->redirect('dashboard.php');
 }
 else
 {
 	$color = "alert alert-danger alert-dismissible";
     $msg = "UserName and Password do not match";
 }} 
?> 
<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <?php include("includes/include_css.html") ?>
</head>

<body>
    <?php include("includes/browser_upgrade.html") ?>
    <!--  insert body content  -->
    <section id="login" class="">
    	
        <div id="login_form" class="z-depth-3">
            <div class="text_center" id="message">
               <div class='<?php echo $color; ?>'  role='alert'>
                   <strong><?php echo $msg; ?></strong> 
               </div>
            </div>
            <h3 class="text_center">Login</h3>
            <form action="" class="col s12" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="form_firstname" type="email" name="Email" class="validate">
                        <label for="form_firstname">Username</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="form_password" type="password" class="validate" name="Password">
                        <label for="form_password">Password</label>
                    </div>
                    <div class="input-field col s12 text_center">
                        <button class="btn waves-effect waves-light" type="submit" name="login" name="action">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--  end body content -->
    <?php include("includes/include_js.html") ?>
</body>

</html>
