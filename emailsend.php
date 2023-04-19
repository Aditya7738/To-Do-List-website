<?php
//include('connection.php');
//require"PHPMailer/PHPMailerAutoload.php";
//date_default_timezone_set('Asia/Kolkata'); //showing correct time
//$currentDT = date("Y-m-d H:i:s");
//echo($currentDT);
//if($row['remainderDT'] == $currentDT){
    //$receiveremail = $_SESSION['EMAIL']; 
    $to_email = "adityashigwan773@gmail.com";
    //$to_email = 'ishanpai02@gmail.com';
    $subject = "To-Do List: Your task details";
    $body = "Hi 
    Thanks for using To-Do List
    Your assigned task is 
    Task start date and time is 
    Task due date and time is 
    Task priority is 
    Task status is";
    $headers = "From: adityashigwan773@gmail.com\r\nReply-To: adityashigwan773@gmail.com";
    $mail_sent = mail($to_email, $subject, $body, $headers);
//}
/*if ($mail_sent == true) {
    echo "Email successfully sent to $to_email";
} else {
    echo "Email sending failed...";
}*/
?>