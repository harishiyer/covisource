<?php

    $from = $_POST['name'];
    $message = $_POST['message'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    if(!isset($_POST['authorised_access'])){
        header("HTTP/1.1 401 Unauthorized");
        exit;
    }

    $to = "covidhelpinghandsource@gmail.com";
    $subject = "Request";
         
    $message = "<p>".$message."</p>";
    $message .= "<p style='padding-top: 20px'><strong>Name: ".$from."</strong></p>";
    $message .= "<p style='padding-top: 20px'><strong>Contact: ".$contact."</strong></p>";
    if($email != ""){
        $message .= "<p style='padding-top: 20px'><strong>Email: ".$email."</strong></p>";
    }
         
    $header = "From:covidhelpinghandsource@gmail.com \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
         
    $retval = mail ($to,$subject,$message,$header);
         
    if( $retval == true ) {
        echo "Message sent successfully...";
    }else {
        echo "Message could not be sent...";
    }
      ?>