<?php

require('../core/connect.php');
require('register_form.php');
require('classes.php');

if (isset($_POST['submit-button'])){
    //get userinput from form and assign to variable
    $email = $_POST['email'];
    $uname = $_POST['username'];
    $pword = $_POST['password'];
    $confPword = $_POST['password-confirm'];
    $firstName = $_POST['firstname'];
    $surname = $_POST['surname'];

    //create object of register user class and pass in data from html form and db connection
    $newUser = new UserRegister($dbconn, $email, $uname, $pword, $confPword, $firstName, $surname);
    $checkUname = $newUser->checkUsername();
    $checkMail = $newUser->checkEmail();
    $checkPasswordMatch = $newUser->checkPassword();
    //$insertUser = $newUser->createUser(); //if all methods in UserRegister class return true, insert user into db
    if ($newUser->errors == 0){
        $newUser->createUser();
        //$insertUser->execute();
    }

    $dbconn->close();
}
?>