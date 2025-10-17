<?php

use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

function manageSingleSessionForActiveUser($user){
    $active_session_id = $user->active_session_id;
if($active_session_id === null){

    $user->update([
     'active_session_id' => Session::getId()
    ]);

}else{ 

    Session::forget($active_session_id);
    $user->update([

        'active_session_id' => Session::getId()

       ]);
}
return true;
}


function checkTheUserAlreadyActive($user){
    $active_session_id = $user->active_session_id;
    if($active_session_id != null){
      return true;
    }
}

function jsonResponse($data = []){

    return response()->json($data);
    
}

function customMailer($reciever_email,$subject,$body){
    
    $mail = new PHPMailer(true); //Argument true in constructor enables exceptions
    
    //From email address and name
    $mail->From = "support@innerix.in";
    $mail->FromName = "InPOS";
    
    //To address and name
    $mail->addAddress($reciever_email);
    // $mail->addAddress("recepient1@example.com"); //Recipient name is optional
    
    //Address to which recipient will reply
    // $mail->addReplyTo("reply@yourdomain.com", "Reply");
    
    //CC and BCC
    // $mail->addCC("cc@example.com");
    // $mail->addBCC("bcc@example.com");
    
    //Send HTML or Plain Text email
    $mail->isHTML(true);
    
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AltBody = "Sample body";
    
    try {
        $mail->send();
        return true;
        // echo "Message has been sent successfully";
    } catch (Exception $e) {
        return false;
    }
    
    }

    function manageOtpForRegister($user,$otp){
        $subject = 'OTP Verification';
        $body = $otp.' is the One-Time-Password for user verification.';
        $mail_send = customMailer($user->email,$subject,$body);
        return $mail_send;
    }

    function manageOtpForPasswordReset($email,$otp){
        $subject = 'OTP Verification';
        $body = $otp.' is the One-Time-Password for password_reset.';
        $mail_send = customMailer($email,$subject,$body);
        return $mail_send;
    }
?>
