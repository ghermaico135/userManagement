<?php
session_start();
if (isset($_SESSION['user'])) {
    header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=ucfirst(basename($_SERVER['PHP_SELF'], '.php'));?></title>
    <!-- bootstrap style min.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/style.css"/>
</head>
<body>
    <div class="container">
        <!-- Login start -->
        <div class="row justify-content-center wrapper" id="login-box">
            <div class="col-lg-10 my-auto">
                <div class="card-group myShadow">
                    <div class="card rounded-left p-4" style="flex-grow:1.4">
                        <h1 class="text-center font-weight-bold text-primary"> Sign Up Account</h1>
                        <hr class="my-3">
                        <form action="#" method="post" class="px-3" id="form-login">
                            <div id="loginAlert"></div>
                            <div class="input-group input-group-lg form-group">
                                <!-- prepend icons -->
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                    <i class="far fa-envelope fa-lg"></i>
                                    </span>
                                </div>
                            <!-- end of prepend-icon -->
                                <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="Enter Email"
                                required value="<?php if (isset($_COOKIE['email'])) {echo $_COOKIE['email'];}?>">
                            </div>
                            <div class="input-group input-group-lg form-group">
                                <!-- prepend icons -->
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                    </span>
                                </div>
                            <!-- end of prepend-icon -->
                                <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Enter password"
                                 required value="<?php if (isset($_COOKIE['password'])) {echo $_COOKIE['password'];}?>">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox float-left">
                                    <input type="checkbox" name="rem" class="custom-control-input" id="customCheck"
                                    <?php if (isset($__COOKIE['email'])) {?>
                                       checked <?php }?>>
                                    <label for="customCheck" class="custom-control-label"> Remember me</label>
                                </div>
                                <div class="forgot float-right">
                                    <a href="#" id="forgot-link">Forgot Password?</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Sign In" id="login-btn" class="btn btn-primary btn-lg btn-block myBtn">
                            </div>
                        </form>
                    </div>
                    <!-- sign end -->
                    <div class="card justify-content-center rounded-right p-4 myColor">
                        <h1 class="text-center font-weight-bold text-white">Hello Friends</h1>
                        <hr class="my-3 bg-light myHr"/>
                        <p class="text-center font-weight-bolder text-light lead">
                            Enter your personal details and start our journey with us!
                        </p>
                        <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="register-link">Sing Up</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- Login end -->

        <!-- Register start -->

        <div class="row justify-content-center wrapper" style="display:none;" id="register-box">
            <div class="col-lg-10 my-auto">
                <div class="card-group myShadow">
                     <!-- sign end -->
                     <div class="card justify-content-center rounded-left p-4 myColor">
                        <h1 class="text-center font-weight-bold text-white">Welcome!!</h1>
                        <hr class="my-3 bg-light myHr"/>
                        <p class="text-center font-weight-bolder text-light lead">
                            To keep connect with us ,please enter your personal Info!
                        </p>
                        <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="login-link">Sing In</button>
                    </div>
                    <!-- sign in end -->
                    <div class="card rounded-right p-4" style="flex-grow:1.4">
                        <h1 class="text-center font-weight-bold text-primary"> Create Account</h1>
                        <hr class="my-3">
                        <form action="#" method="post" class="px-3" id="register-form">
                        <div id="regAlertErr"></div>
                            <div class="input-group input-group-lg form-group">
                                <!-- prepend icons -->
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                    <i class="far fa-user fa-lg"></i>
                                    </span>
                                </div>
                            <!-- end of prepend-icon -->
                                <input type="text" name="name" id="name" class="form-control rounded-0" placeholder="Full Name" required>
                            </div>
                            <div class="input-group input-group-lg form-group">
                                <!-- prepend icons -->
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                    <i class="far fa-envelope fa-lg"></i>
                                    </span>
                                </div>
                            <!-- end of prepend-icon -->
                                <input type="email" name="email" id="remail" class="form-control rounded-0" placeholder="Enter Email" required>
                            </div>

                            <div class="input-group input-group-lg form-group">
                                <!-- prepend icons -->
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                    </span>
                                </div>
                            <!-- end of prepend-icon -->
                                <input type="password" name="password" id="rpassword" class="form-control rounded-0" placeholder="Enter password" required min-length="5">
                            </div>

                            <div class="input-group input-group-lg form-group">
                                <!-- prepend icons -->
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                    <i class="fas fa-key fa-lg"></i>
                                    </span>
                                </div>
                            <!-- end of prepend-icon -->
                                <input type="password" name="cpassword" id="cpassword" class="form-control rounded-0" placeholder="Confirm Password" required min-length="5">
                            </div>

                            <div class="form-group">
                                <div id="passError" class="text-danger font-weight-bold"></div>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Sign Up" id="register-btn" class="btn btn-primary btn-lg btn-block myBtn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Register End -->

        <!-- Forgot password start -->
        <div class="row justify-content-center wrapper" style="display:none;" id="forgot-box">
            <div class="col-lg-10 my-auto">
                <div class="card-group myShadow">
                    <!-- sign end -->
                    <div class="card justify-content-center rounded-left p-4 myColor">
                        <h1 class="text-center font-weight-bold text-white">Reset Password</h1>
                        <hr class="my-3 bg-light myHr"/>

                        <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="back-link">Back</button>
                    </div>

                    <div class="card rounded-right p-4" style="flex-grow:1.4">
                        <h1 class="text-center font-weight-bold text-primary"> Forgot Your Password</h1>
                        <hr class="my-3">
                        <p class="lead text-center text-secondary">
                        To reset your password enter the registered e-mail,we will send the instructions on your registered e-mail
                    </p>
                        <form action="#" method="POST" class="px-3" id="forgot-form">
                                <div id="forgot-alert"> </div>
                            <div class="input-group input-group-lg form-group">
                                <!-- prepend icons -->
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                    <i class="far fa-envelope fa-lg"></i>
                                    </span>
                                </div>
                            <!-- end of prepend-icon -->
                                <input type="email" name="email" id="femail" class="form-control rounded-0" placeholder="Enter Email" required>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Reset" id="forgot-btn" class="btn btn-primary btn-lg btn-block myBtn">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Forgot password End -->
    </div>




    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- js bootstrap bundle -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js" integrity="sha512-mULnawDVcCnsk9a4aG1QLZZ6rcce/jSzEGqUkeOLy0b6q0+T6syHrxlsAGH7ZVoqC93Pd0lBqd6WguPWih7VHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- font awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" integrity="sha512-fzff82+8pzHnwA1mQ0dzz9/E0B+ZRizq08yZfya66INZBz86qKTCt9MLU0NCNIgaMJCgeyhujhasnFUsYMsi0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        // move to register page
        $(document).ready(function(){
            $('#register-link').click(function(){
                $('#login-box').hide();
                $('#register-box').show();
            });
        });

        // move back to login
        $(document).ready(function(){
            $('#login-link').click(function(){
                $('#login-box').show()
                $('#register-box').hide();

            })
        })

        // move to forgot page
        $(document).ready(function(){
            $('#forgot-link').click(function(){
                $('#forgot-box').show();
                $('#login-box').hide();
            })
        })

        // Back to login page event Listener
        $(document).ready(function(){
            $('#back-link').click(function(){
                $('#forgot-box').hide();
                $('#login-box').show();
            })
        })

        //Register ajax request

        $('#register-btn').click(function(e){
            if($('#register-form')[0].checkValidity()){
                e.preventDefault();
                $('#register-btn').val('Please wait...');
                if($("#rpassword").val() != $("#cpassword").val()){
                    $('#passError').text("* password didn't Match");
                    $('#register-btn').val('Sign Up');
                }
                else{
                    $('#passError').text("");
                    $.ajax({
                        url:"assets/php/action.class.php",
                        method:"Post",
                        data: $("#register-form").serialize() + "&action=register",
                        success:function(response){
                            $('#register-btn').val('Sign Up');
                            console.log("reachable0");
                            if(response === 'register'){
                                console.log("reachable");
                                window.location ='home.php';
                            } else{
                                $("#regAlertErr").html(response);
                            }
                        }

                    })
                }
            }

        })

  //Login ajax request logic
  $('#login-btn').click(function(e){
            if($('#form-login')[0].checkValidity()){
                e.preventDefault();
                $("#login-btn").val('Please wait...');
                $.ajax({
                    url:'assets/php/action.class.php',
                    method:'Post',
                    data:$('#form-login').serialize() + "&action=login",
                    success:function(response){
                        $("#login-btn").val('Sign In');
                        if(response === 'login'){
                            window.location = 'home.php'
                        }else{
                            $('#loginAlert').html(response)
                        }

                    }
                })
            }
        })

        // Forgot password ajax request logic

        $('#forgot-btn').click(function(e){

            if($('#forgot-form')[0].checkValidity()){
                e.preventDefault();
                $('#forgot-btn').val('Please wait...');
                $.ajax({
                    url:'assets/php/action.class.php',
                    method:'POST',
                    data:$('#forgot-form').serialize()+"&action=forgot",
                    success:function(response){
                       $('#forgot-btn').val('Reset Password');
                       $('#forgot-form')[0].reset();
                       $('#forgot-alert').html(response);
                    }
                })
            }

        })

    </script>




</body>
</html>
