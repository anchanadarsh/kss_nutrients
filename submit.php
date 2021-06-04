<?php
// require 'vendor/autoload.php';
// use Mailgun\Mailgun;



  // Create connection
//$conn = new mysqli('localhost', 'root', '', 'aqua_pro_db');
$conn = new mysqli('localhost', 'root', 'root', 'tingting_kss_nutrients_db');
//$conn = new mysqli('localhost', 'vectoru', 'swdDfe#43sD', 'vectormob_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
  // echo 'Connected'; 
}


// prepare and bind
$stmt = $conn->prepare("INSERT INTO contact_us (fullname, cmpname, email, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $fullname, $cmpname, $email, $message);

// set parameters and execute

$fullname = $_POST["fullname"];  
$cmpname = $_POST["cmpname"];  
$email = $_POST["email"];
$message = $_POST["message"];
$stmt->execute();

$stmt->close();
     
// $mgClient = new Mailgun('key-780de6474bcdbc091600bf2d96de3c48');
// $domain =  'mailgun.mananvora.com';
//
// $msg = "Enquiry Email from Vector Mob. <br><br><br>";
// $msg .= 'Full Name'.' : '.$fullname;
// $msg .= '<br>';
// $msg .= 'Email Address'.' : '.$email;
// $msg .= '<br>';
// $msg .= 'Mobile Number'.' : '.$mobile;
// $msg .= '<br><br>';
// $msg .= "Thanks and Regards<br>";
//
//
//
// $result = $mgClient->sendMessage($domain, array(
//     'from'    => 'vipin@tingmail.in',
//     'to'      => 'adarsh@tingmail.in',
//     'bcc'     => 'adarsh@tingmail.in',
//     'subject' => 'Enquiry Email from Vector Mob. ',
//     'html'    =>  $msg
// ));




 echo 1;
   
   //header("Location:thank-you.php");
  // echo $_SERVER['HTTP_REFERER']; 
// header('Location: ' . $_SERVER['HTTP_REFERER'].'?msg=sent');
?>
