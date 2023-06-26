<?php

// function sendEmail($from="",$recipient_name="", $subject="", $message="") {

    $name= $_GET["name"];
    $email= $_GET["email"];
        // $parsedUrl = parse_url($_REQUEST['REQUEST_URI']);
        // // Get the query string parameters
        // parse_str($parsedUrl['query'], $queryParams);

        // // Extract the desired data
        // $name = $queryParams['name'];
        // $email = $queryParams['email'];
    if(empty($name) && empty($email)){
        # If the fields are empty, display a message to the user
        return json_encode(['message' => 'Please fill in the fields!']) ;
    # Process the form data if the input fields are not empty
    }else{
        // $name= $_GET['name'];
        // $email= $_GET['email'];
        // echo ('Welcome:     '. $name. '<br/>');
        // echo ('This is your email address:'   . $email. '<br/>');
        $recipient_name="Rabi";
        $subject='New Add Deal';
        $message = '<h4> Hi, Mr. '. $recipient_name . ',</h4>
        <p>Thank you for choosing us.</p></br></br></br></br>
        <p>Thanks</p>
        <p>Kind regards</p>
        <p>Rabiul</p>';
        $to="robicmt566@gmail.com";
        $from="robiuli913@gmail.com";
        $headers='From: ' . $from;
        // Validate required fields
        // Send the email    
        if (mail($to, $subject, $message, $headers)) {
            // echo 'jhjk';
            // Email sent successfully
            http_response_code(200);
            return json_encode(['message' => 'Email sent successfully!']) ;
        } else {
            // Error sending email
            http_response_code(500);
            return json_encode(['error' => 'An error occurred while sending the email.']) ;
        }
    }


// }

?>