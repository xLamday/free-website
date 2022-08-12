<?php 

# RICEZIONE EMAIL

if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        echo "Per favore inserisci un nome";
    } else {
        $name = $_POST['name'];
}
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $formcontent= "Da: $name\n Descrizione: $message";
    $recipient = "fivemer@altervista.org";
    $subject = $_POST["subject"];
    $mailheader = "From: $email \r\n";
    
}
    mail($recipient, $subject, $formcontent, $mailheader) or die ('<html>
	<head>
		<title>ERRORE 552</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
				<!-- Footer -->
					<section id="footer">
						<div class="inner">
							<h2 class="major" style="text-align: center;">ERRORE 552</h2>
                            <h1 class="major" style="text-align: center;">Sembra che è stato riscontrato un problema nell\'invio della tua richiesta! Riprova più tardi.</h1>
                            <br>
							<p style="text-align: center;">Premi <a href="index.php" style="text-align: center;"> qui</a> per ritornare alla home</p>
					');
    header("Location: conferma.php")
?>


<?php 

    # INVIO EMAIL

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $formcontent= "Nome e Cognome: $name \n Descrizione: $message
    
Ci vorranno dalle 24 alle 48 ore prima che la tua richiesta venga processata!

Questa è una risposta automatica";
    $recipient = $_POST['email'];
    $subject = $_POST['subject'];
    $mailheader = "Abbiamo ricevuto la tua richiesta! Ecco ciò che ci hai mandato:";
}
    mail($recipient, $subject, $formcontent, $mailheader) or die ('<html>
	<head>
		<title>ERRORE 552</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
				<!-- Footer -->
					<section id="footer">
						<div class="inner">
							<h2 class="major" style="text-align: center;">ERRORE 552</h2>
                            <h1 class="major" style="text-align: center;">Sembra che è stato riscontrato un problema nell\'invio della tua richiesta! Riprova più tardi.</h1>
                            <br>
							<p style="text-align: center;">Premi <a href="index.php" style="text-align: center;"> qui</a> per ritornare alla home</p>
					');
    header("Location: conferma.php")
?>


