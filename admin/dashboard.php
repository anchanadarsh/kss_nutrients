<?php
require_once("models/session.php");
 // Create connection
require_once 'models/model.php';

$upload = new Models();
$ContactCount = $upload->GetContactEnquiry();
$NewsletterCount = $upload->GetNewsletterEnquiry();

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
    <?php include("includes/header.html") ?>
    <?php include("includes/sidebar.html") ?>
    <!--  insert body content  -->
    <section id="index" class="content_section">
        <div class="">
            <div class="row">
                <div class="col s12 m4">
                    <a href="contact-list.php">
                        <div class="dash_box z-depth-1">
                            <div class="row">
                                <div class="col s3">
                                    <div class="dash_icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="col s9">
                                    <div class="dash_cont">
                                        <p><?php echo count($ContactCount); ?><small>Enquiries</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>
        </div>
    </section>
    <!--  end body content -->
    <?php include("includes/include_js.html") ?>
    <script>
        $(document).ready(function() {
            $('#menu_dashboard').addClass('active');
        });

    </script>
</body>

</html>
