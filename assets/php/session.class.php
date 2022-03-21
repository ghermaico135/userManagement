<?php

session_start();
require_once 'auth.class.php';

$cuser = new Auth();

if (!isset($_SESSION['user'])) {
    header("location:../../index.php");
    die;
}

$cemail = $_SESSION['user'];

$data = $cuser->currentUser($cemail);
$cid = $data['id'];
$cname = $data['name'];
$cemail = $data['email'];
$cpass = $data['password'];
$cphone = $data['phone'];
$cgender = $data['gender'];
$cdob = $data['dob'];
$cphoto = $data['photo'];
$created_at = $data['created_at'];
$verified = $data['verified'];

$fname = strtok($cname, '');

$reg_no = date('d M Y', strtotime($created_at));

if ($verified == 0) {
    $verified = 'Not Verified';
} else {
    $verified = 'Verified';

}
