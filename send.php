<?php
    alert ('hello');return false;
    $name = $_POST['name'];
    $email = $_POST['email'];
    comment = $_POST['message'];
    $from = 'From: TangledDemo'; 
    $to = 'james@perspectivedesign.co.uk'; 
    $subject = 'Hello';
    $human = 1; //$_POST['human'];
			
    $body = "From: $name\n E-Mail: $email\n Message:\n $message";
				
    if ($_POST['submit'] && $human == '4') {				 
        if (mail ($to, $subject, $body, $from)) { 
	    echo '<p>Your message has been sent!</p>';
	} else { 
	    echo '<p>Something went wrong, go back and try again!</p>'; 
	} 
    } else if ($_POST['submit'] && $human != '4') {
	echo '<p>You answered the anti-spam question incorrectly!</p>';
    }
?>