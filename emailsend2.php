<?php
include"connection.php";
//include"AddTasklst.php";
require"PHPMailer/PHPMailerAutoload.php";
/* scipt to get detail of employee whose birthday is today */
date_default_timezone_set('Asia/Kolkata'); //showing correct time
//$currentDT = date("Y-m-d H:i:s");
$currentDT = date("Y-m-d H:i");
echo $currentDT;
$query="SELECT * FROM otherpeopletasks WHERE DATE_FORMAT(remainderDT,'%Y-%m-%d %H:%i') = DATE_FORMAT('$currentDT','%Y-%m-%d %H:%i')";
//$query="SELECT * FROM otherpeopletasks WHERE remainderDT = '$currentDT' ";
$r=mysqli_query($con,$query);

/* end */

$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->SMTPSecure='tls';  //ssl
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;    // 465
$mail->IsHTML(true);
$mail->CharSet='UTF-8';
$mail->Username='adityashigwan773@gmail.com';
$mail->Password='d2bteyxbdh';
$mail->SetFrom('adityashigwan773@gmail.com', 'Aditya');
$mail->SMTPOptions = array(
    'ssl' => [
        'verify_peer' => false,
        'verify_depth' => false,
        'allow_self_signed' => false,
        'verify_peer_name' => false
    ]
);

$mail->Subject = 'To-Do List: Your task details';
while($row=mysqli_fetch_assoc($r)){
    $mail->AddAddress($row['opemail'], $row['opfname']); //to
    $opdtime = $row['opdtime'];
    $newopdtime = date("H:i:s",strtotime($opdtime));
    $opedtime = $row['opedtime'];
    $newopedtime = date("H:i:s",strtotime($opedtime));
    $html = '<div><center><h3>Hi '.$row['opfname'].",</h3>
    Your today's assigned task is ".$row['optask'].'<br>
    Task start date and time is '.$newopdtime.'<br>
    Task due date and time is '.$newopedtime.'<br>
    Task priority is '.$row['optpriority'].'<br>
    Task status is '.$row['optstatus'].'</center></div>';
    $mail->Body=$html;
    $mail->send();
    
}
//echo "email Sent";

?>