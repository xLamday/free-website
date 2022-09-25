<?php
require_once('database.php');

if (isset($_POST['register'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $_POST['email'] ?? '';
    $isUsernameValid = filter_var(
        $username,
        FILTER_VALIDATE_REGEXP, [
            "options" => [
                "regexp" => "/^[a-z\d_]{3,20}$/i"
            ]
        ]
    );
    $pwdLenght = mb_strlen($password);
    
    if (empty($username) || empty($password)) {
        $msg = 'Fill all the fields %s';
    } elseif (false === $isUsernameValid) {
        $msg = 'The username is not valid. Only alphanumeric characters are allowed and underscore. Minimal length is 3.
                Maximum length is 20';
    } elseif ($pwdLenght < 8 || $pwdLenght > 20) {
        $msg = 'The password needs almost 8 characters!
               Maximum length for the password is 20';
    } else {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $query = "
            SELECT id
            FROM users
            WHERE username = :username
        ";
        
        $check = $pdo->prepare($query);
        $check->bindParam(':username', $username, PDO::PARAM_STR);
        $check->execute();
        
        $user = $check->fetchAll(PDO::FETCH_ASSOC);
        
        if (count($user) > 0) {
            $msg = 'Username already taken %s';
        } else {
            $query = "
                INSERT INTO users
                VALUES (0, :email, :username, :password)
            ";
        
            $check = $pdo->prepare($query);
            $check->bindParam(':username', $username, PDO::PARAM_STR);
            $check->bindParam(':password', $password_hash, PDO::PARAM_STR);
            $check->bindParam(':email', $email, PDO::PARAM_STR);
            $check->execute();
            
            if ($check->rowCount() > 0) {
                $msg = 'The account was successfully created!';
            } else {
                $msg = 'Problems with entering data %s';
            }
        }
    }
    
    printf($msg, '');
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YourSite - Register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register</h2>
                        <form method="post" action="/account/register.php">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" id="email" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
								<input type="text" id="username" placeholder="Username" name="username" maxlength="50" required>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" id="password" placeholder="Password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>DISCLAIMER: Remember your password! Since you create your account you'll be the only responsible of your account. If you lose the password or forget the password, you can contact the staff via ticket. After you contact us, you'll have only one option: Delete the account and do it again.</label>
                            </div>
                            <div class="form-group form-button">
								<button type="submit" class="form-submit" name="register">Register your account</button>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="https://i.imgur.com/iiZRQkY.png" alt="sing up image"></figure>
                        <a href="/account/login.php" class="signup-image-link">I have already an account</a>
                    </div>
                </div>
            </div>
        </section>
       

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
