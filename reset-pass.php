<?php

require_once 'assets/php/auth.class.php';

$user = new Auth();
$msg = '';

//url fetching of email and token
if (isset($_GET['email']) and isset($_GET['token'])) {
    $email = $user->test_input($email);
    $token = $user->test_input($token);

    $user_Auth = $user->reset_pass_auth($email, $token);

    if ($user_Auth != null) {

        if (isset($_POST['submit'])) {
            $newpass = $_POST['pass'];
            $cnewpass = $_POST['cpass'];

            $hnewpass = password_hash($newpass, PASSWORD_DEFAULT);

            if ($newpass === $cnewpass) {
                $user->updated_new_pass($hnewpass, $email);
                $msg = "Password updated successfully <a href='index.php'>Login</a>";
            } else {
                $msg = "Password didn't match ";

            }
        }
    } else {
        header("location:index.php");
        exit();
    }
} else {
    header("location:index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/style.css"/>
    <title>Reset</title>
</head>
<body>
<div class="container">
        <!-- Login start -->
        <div class="row justify-content-center wrapper" >
            <div class="col-lg-10 my-auto">
                <div class="card-group myShadow">
                    <!-- sign end -->
                    <div class="card justify-content-center rounded-left p-4 myColor">
                        <h1> Reset your password</h1>
                    </div>
                    <div class="card rounded-right p-4" style="flex-grow:2">
                        <h1 class="text-center font-weight-bold text-primary"> Enter a New password</h1>
                        <hr class="my-3">
                        <!-- Form -->
                        <form action="#" method="post" class="px-3" >
                            <div class="text-center lead mb-2"> <?=$msg;?></div>
                            <div class="input-group input-group-lg form-group">
                                <!-- prepend icons -->
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                    </span>
                                </div>
                            <!-- end of prepend-icon -->
                                <input type="password" name="pass"  class="form-control rounded-0" placeholder="Enter password"
                                 required length="5">
                            </div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                    </span>
                                </div>
                                <input type="password" name="cpass"  class="form-control rounded-0" placeholder="Enter password"
                                 required  length="5">
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox float-left">
                                    <input type="checkbox" name="rem" class="custom-control-input" id="customCheck"
                                    <?php if (isset($__COOKIE['email'])) {?>
                                       checked <?php }?>>
                                    <label for="customCheck" class="custom-control-label"> Remember me</label>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-lg btn-block myBtn">
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- js bootstrap bundle -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js" integrity="sha512-mULnawDVcCnsk9a4aG1QLZZ6rcce/jSzEGqUkeOLy0b6q0+T6syHrxlsAGH7ZVoqC93Pd0lBqd6WguPWih7VHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- font awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" integrity="sha512-fzff82+8pzHnwA1mQ0dzz9/E0B+ZRizq08yZfya66INZBz86qKTCt9MLU0NCNIgaMJCgeyhujhasnFUsYMsi0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>