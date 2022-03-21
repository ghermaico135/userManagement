<?php
require_once 'assets/php/header.php';

?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card round-0 mt-0 border-primary">
                    <div class="card-header border-primary">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a href="#profile" class="nav-link active font-weight-bold" data-toggle="tab">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="#EditProfile" class="nav-link  font-weight-bold" data-toggle="tab">Edit Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="#ChangePassword" class="nav-link   font-weight-bold" data-toggle="tab">Change password</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane container active" id="profile">
                                <div class="card-deck">
                                    <div class="card border-primary">
                                        <div class="card-header bg-primary text-center text-light lead">
                                            USER ID: <?=$cid;?>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text rounded m-1 p-2" style="border:1px solid #0275d8">
                                            <b> name: </b><?=$cname;?>
                                        </p>
                                            <p class="card-text rounded m-1 p-2" style="border:1px solid #0275d8">
                                            <b> E-mail: </b><?=$cemail;?></p>
                                            <p class="card-text rounded m-1 p-2" style="border:1px solid #0275d8">
                                            <b> Date of birth: </b><?=$cdob;?></p>
                                            <p class="card-text rounded m-1 p-2" style="border:1px solid #0275d8">
                                            <b> Phone: </b><?=$cphone;?></p>
                                            <p class="card-text rounded m-1 p-2" style="border:1px solid #0275d8">
                                            <b> Gender: </b><?=$cgender;?></p>
                                            <p class="card-text rounded m-1 p-2" style="border:1px solid #0275d8">
                                            <b> Register: </b><?=$reg_no;?></p>
                                            <p class="card-text rounded m-1 p-2" style="border:1px solid #0275d8">
                                            <b> E-mail Verified: </b><?=$verified;?>
                                            <?php if ($verified == 'Not Verified'): ?>
                                            <a href="#" id="verify-email" class="float-right">Now Verify </a>
                                            <?php endif;?>
                                            </p>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="card border-primary align-self-center">
                                        <?php if (!$cphoto): ?>
                                            <img src="./assets/img/avatar.png" class="img-thumbnail img-fluid" width="480px">
                                        <?php else: ?>
                                            <img src="<?='assets/php/' . $cphoto;?>" class="img-thumbnail img-fluid" width="480px">
                                        <?php endif;?>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js" integrity="sha512-mULnawDVcCnsk9a4aG1QLZZ6rcce/jSzEGqUkeOLy0b6q0+T6syHrxlsAGH7ZVoqC93Pd0lBqd6WguPWih7VHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- font awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" integrity="sha512-fzff82+8pzHnwA1mQ0dzz9/E0B+ZRizq08yZfya66INZBz86qKTCt9MLU0NCNIgaMJCgeyhujhasnFUsYMsi0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
