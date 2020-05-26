<?php
include('login_form.php');
include('classes.php');

if (isset($_POST['submit-button'])){        
    $loginUser = new UserLogin($dbconn, $_POST['username'], $_POST['password']);
    $loginUser->validateLogin();
}