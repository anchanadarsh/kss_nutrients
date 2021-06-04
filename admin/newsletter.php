<?php
require_once("models/session.php");
require_once 'models/model.php';

$upload = new Models();
  // Create connection
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
    <section id="newsletter" class="content_section">
        <div class="">
            <div class="row">
                <div class="col s12">
                    <table id="newsletter_table" class="responsive-table newsletter_table striped">
                        <thead>
                            <tr>
                              <th>Sr.No</th>
                              <th>Email Id</th>
                              <th>Date</th>
                            </tr>
                        </thead>

                        <tbody>
                           <?php
                              $n = 0;
                              $ContactList = $upload->GetNewsletterEnquiry();
                              if(!empty($ContactList)){
                              foreach($ContactList as $item){
                            ?>
                              <tr>
                              <td><?php echo $item['id']; ?></td>
                              <td><?php echo $item['email_id']; ?></td>
                              <td><?php echo date("d/m/Y",strtotime($item['created_at'])); ?></td>
                              </tr>
                           <?php }} ?>                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--  end body content -->
    <?php include("includes/include_js.html") ?>
    
    <script>
        $(document).ready(function(){
            $('#menu_newsletter').addClass('active');
        });
    </script>
</body>

</html>
