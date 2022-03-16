<?php
// session_start();
// echo $_SESSION['user'];
require_once 'assets/php/session.class.php';
// echo '<pre>';
// print_r($data);

?>

<!-- <a href="assets/php/logout.class.php">Logout </a> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- dynamic title -->
    <title><?=ucfirst(basename($_SERVER['PHP_SELF'], '.php'));?></title>
    <!-- bootstrap style min.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Datatables.net -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.css"/>

    <style type="text/css">
        @import url("https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap");
        *{
            font-family:'Moven pro',sans-serif;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
    <a class="navbar-brand" href="index.php" > <i class="fas fa-code  fa-lg"></i>&nbsp;Coding&nbsp; </a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link <?=(basename($_SERVER['PHP_SELF']) == "home.php") ? "active" : "";?>" href="home.php"> <i class="fas fa-home"> </i> &nbsp;Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=(basename($_SERVER['PHP_SELF']) == "profile.php") ? "active" : "";?>" href="profile.php"><i class="fas fa-user-circle"> </i> &nbsp;Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=(basename($_SERVER['PHP_SELF']) == "feedback.php") ? "active" : "";?>" href="feedback.php"><i class="fas fa-comment"> </i> &nbsp;Feedback</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?=(basename($_SERVER['PHP_SELF']) == "notification.php") ? "active" : "";?>" href="notification.php"><i class="fas fa-bell"> </i> &nbsp;Notification</a>
        </li>
        <li class="nav-item dropdown">
            <a  href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                <i class="fas fa-user-cog"></i>&nbsp;Hi <?=$fname;?>
        </a>
        <div class="dropdown-menu">
            <a  href="#" class="dropdown-item" >
                <i class="fas fa-cog"></i> &nbsp; Settings
            </a>
            <a  href="assets/php/logout.class.php" class="dropdown-item" >
                <i class="fas fa-sign-out-alt"></i> &nbsp;Logout
            </a>
        </div>
        </li>
        </ul>
    </div>
    </nav>