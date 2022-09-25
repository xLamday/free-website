<?php

$error = "Wrong Credentials, try again";

session_start();
require_once('database.php');

if (isset($_SESSION['session_id'])) {
    header('Location: yoursite.com/index.php');
    exit;
}

if (isset($_POST['login'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($email) || empty($password)) {
        /*$msg = 'Insert an Email and password %s';*/
    } else {
        $query = "
            SELECT email, password
            FROM users
            WHERE email = :email
        ";
         
        $check = $pdo->prepare($query);
        $check->bindParam(':email', $email, PDO::PARAM_STR);
        $check->execute();
        
        $user = $check->fetch(PDO::FETCH_ASSOC);
        
        if (!$user || password_verify($password, $user['password']) === false) {
			$msg = "<script type='text/javascript'>alert('$error');</script>";/*'This credentials are wrong, try again!%s';*/
        } else {
            session_regenerate_id();
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_user'] = $user['username'];
            
            header('Location: /index.php');
            exit;
        }
    }
    
        
    printf($msg, '');
}




<!DOCTYPE html>
<html lang="en">

<link href="img/favicon.ico" rel="shortcut icon"/>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YourSite - Log In</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="https://i.imgur.com/xvpS2sD.png" alt="sing up image"></figure>
                        <a href="/account/register.php" class="signup-image-link">Create an account</a>
                        // WORK IN PROGRESS <a href="/account/forget.php" class="signup-image-link">Recover your password</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log In</h2>
                        <form method="POST" class="register-form" id="login-form">
                         	<div class="form-group">
                                <label for="your_mail"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" id="email" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" id="password" placeholder="Password" name="password" required>
                            </div>
                            <div class="form-group form-button">
                            <button type="submit" class="form-submit" name="login">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    
    
    
</body>
</html>
