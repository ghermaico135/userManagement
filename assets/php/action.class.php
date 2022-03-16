<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

require_once 'auth.class.php';
// include_once '
$user = new Auth();

// Ajax Register Request Handler

if (isset($_POST['action']) && $_POST['action'] == 'register') {
    // print_r($_POST);
    $name = $user->test_input($_POST['name']);
    $email = $user->test_input($_POST['email']);
    $pass = $user->test_input($_POST['password']);

// password encryption
    $hPass = password_hash($pass, PASSWORD_DEFAULT);

    if ($user->user_exist($email)) {
        echo $user->showMessage('warning', 'E-mail already registered');
    } else {
        if ($user->register($name, $email, $hPass)) {
            echo 'register';
            $_SESSION['user'] = $email;
        } else {
            echo $user->showMessage('danger', 'something went wrong! try again later');
        }
    }

}

// Ajax Login Request Handler

if (isset($_POST['action']) && $_POST['action'] === 'login') {
    // print_r($_POST);
    $email = $user->test_input($_POST['email']);
    $pass = $user->test_input($_POST['password']);

    $logInUser = $user->login($email);

    if ($logInUser != null) {
        if (password_verify($pass, $logInUser['password'])) {
            if (!empty($_POST['rem'])) {
                setcookie("email", $email, time() + (30 * 24 * 60 * 60), '/');
                setcookie("password", $pass, time() + (30 * 24 * 60 * 60), '/');
            } else {
                setcookie("email", "", 1, '/');
                setcookie("password", "", 1, '/');
            }

            echo "login";
            $_SESSION['user'] = $email;
        } else {
            echo $user->showMessage('danger', "password didn't match");
        }
    } else {

        echo $user->showMessage('danger', "user not found");
    }

}

// Ajax forgot password Handler

if (isset($_POST['action']) && $_POST['action'] == 'forgot') {
    // print_r($_POST);
    $email = $user->test_input($_POST['email']);

    //modal
    $user_found = $user->currentUser($email);
    if ($user_found != null) {
        $token = uniqid();
        $token = str_shuffle($token);
        $user->forgot_password($token, $email);

        try {
            // server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = Database::USERNAME;
            $mail->Password = Database::PASSWORD;
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            // $mail->Port = 465;

            //Recipient settings
            $mail->setFrom(Database::USERNAME, 'Mike Darling');
            $mail->addAddress($email);

            // content
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password';
            $mail->Body = '<h3>
                    Click here to reset your password.<br>
            <a href="http://localhost/user/reset-pass.php?email=' . $email . ' &token=' . $token . '">
            http://localhost/user/reset-pass.php?email=' . $email . ' &token=' . $token . '
            </a>
            <br> Regard mike
            </h3>';
            $mail->Send();

            echo $user->showMessage('success', "please check your email,we sent reset link");

        } catch (Exception $e) {
            echo $user->showMessage('danger', 'Email is not sent please try again later');
        }
    } else {
        echo $user->showMessage('info', 'This email is not registered');
    } 
}
