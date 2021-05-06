<?php

    $from = $_GET['name'];
    $message = $_GET['message'];
    $contact = $_GET['contact'];

    if(!isset($_GET['authorised_access'])){
        header("HTTP/1.1 401 Unauthorized");
        exit;
    }

    $to = "covidhelpinghandsource@gmail.com";
    $subject = "Request";
         
    $message = "<p>".$message."</p>";
    $message .= "<p style='padding-top: 20px'><strong>Name: ".$from."</strong></p>";
    $message .= "<p style='padding-top: 20px'><strong>Contact: ".$contact."</strong></p>";
         
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