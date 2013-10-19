<?php
 $to = "james@perspectivedesign.co.uk";
 $subject = "Message from Dominic Suddaby Website Contact Form";
 $name = $_POST["name"];
 $email = $_POST["email"];
 $comments = $_POST["comments"];
 
 $message = "Name: " . $name . "\r\nEmail Address: " . $email . "\r\n\r\nMessage: " . $comments;
 $headers = "From: " . $email . "\r\n";
 
 if (mail($to, $subject, $message, $headers)) {
   echo("<p>Email successfully sent!</p>");
  } else {
   echo("<p>Email delivery failed…</p>");
  }
 ?>