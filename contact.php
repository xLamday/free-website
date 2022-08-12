<?php 

# RECEIVE EMAIL

if (isset($_POST['submit'])) {
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $formcontent= "From: $name\n Description: $message";
    $recipient = "YOUR-EMAIL";
    $subject = $_POST["subject"];
    $mailheader = "From: $email \r\n";
    
}
    mail($recipient, $subject, $formcontent, $mailheader) or die ('ERROR');
    header("Location: confirm.php")
?>


<?php 

    # SEND EMAIL

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $formcontent= "Name and Surname: $name \n Description: $message";
    $recipient = $_POST['email'];
    $subject = $_POST['subject'];
    $mailheader = "YOUR MESSAGE TO SEND TO THE USER";
}
    mail($recipient, $subject, $formcontent, $mailheader) or die ('ERROR');
     header("Location: confirm.php")
?>


