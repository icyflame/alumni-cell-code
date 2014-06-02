<?php

$to = "kannan.siddharth12@gmail.com";
$subject = "Test";

$body = "We are sending an email from some address. And we want to check everything now!";
$headers = "From: noreply@yecindia.com";

if(mail($to, $subject, $body, $headers))

    echo "Mail has been sent!";
    
else{

    echo "Mail could not be sent";
    echo $mysql_error();
}

?>