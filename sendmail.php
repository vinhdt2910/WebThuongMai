<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

function sendMail($title, $content, $mTo){

    $nFrom = 'Tusachthieunhivn';
    $mFrom = 'tusachthieunhivn@gmail.com';  //dia chi email cua ban 
    $mPass = 'namnguyen95';       //mat khau email cua ban
    $mail             = new PHPMailer();
    $body             = $content;
    $mail->IsSMTP(); 
    $mail->CharSet   = "utf-8";
   //$mail->SMTPDebug  = 5;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                    // enable SMTP authentication
    $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";        
    $mail->Port       = 587;
    $mail->Username   = $mFrom;  // GMAIL username
    $mail->Password   = $mPass;               // GMAIL password
    $mail->SetFrom($mFrom, $nFrom);
    //chuyen chuoi thanh mang
    // $ccmail = explode(',', $diachicc);
    // $ccmail = array_filter($ccmail);
    // if(!empty($ccmail)){
    //     foreach ($ccmail as $k => $v) {
    //         $mail->AddCC($v);
    //     }
    // }
    $mail->Subject= $title;
    $mail->msgHTML($body);
    $address = $mTo;
    $mail->addAddress($address);
    //$mail->AddReplyTo('info@freetuts.net', 'Freetuts.net');
    
    if(!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}
 
function sendMailAttachment($title, $content, $nTo, $mTo,$diachicc='',$file,$filename){
    $nFrom = 'Tusachthieunhivn';
    $mFrom = 'tusachthieunhivn@gmail.com';  //dia chi email cua ban 
    $mPass = 'namnguyen95';       //mat khau email cua ban
    $mail             = new PHPMailer();
    $body             = $content;
    $mail->IsSMTP(); 
    $mail->CharSet   = "utf-8";
    //$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";        
    $mail->Port       = 587;
    $mail->Username   = $mFrom;  // GMAIL username
    $mail->Password   = $mPass;               // GMAIL password
    $mail->SetFrom($mFrom, $nFrom);
    //chuyen chuoi thanh mang
    $ccmail = explode(',', $diachicc);
    $ccmail = array_filter($ccmail);
    if(!empty($ccmail)){
        foreach ($ccmail as $k => $v) {
            $mail->AddCC($v);
        }
    }
    $mail->Subject    = $title;
    $mail->MsgHTML($body);
    $address = $mTo;
    $mail->AddAddress($address, $nTo);
    //$mail->AddReplyTo('info@freetuts.net', 'Freetuts.net');
    $mail->AddAttachment($file,$filename);
    if(!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}
 
?>