<?php

//CUSTOMER-ONLY Registration (Create separate file for employee registration)

if (isset($_POST["submit"]))
{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    /*COMPLETE - Removed $username and added $fname, $lname -- Also updated the function*/
    if(emptyInputSignup($fname, $lname, $email, $pwd, $pwdrepeat) !== false)
    {
        header("location: ../pages/index-login.php?error=emptyinput");
        exit();
    }

    /*FUNCTION NO LONGER USED*/

    /*if(invalidUid($username) !== false)
    {
        header("location: ../pages/index-login.php?error=invaliduid");
        exit();
    }*/
    if(invalidEmail($email) !== false)
    {
        header("location: ../pages/index-login.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($pwd, $pwdrepeat) !== false)
    {
        header("location: ../pages/index-login.php?error=passwordsdontmatch");
        exit();
    }
    /* COMPLETE - REMOVED $username - Actual function updated too */
    if(uidExists($conn, $email) !== false)
    {
        header("location: ../pages/index-login.php?error=usernametaken");
        exit();
    }

    /* UPDATE - REMOVED $username & added $fname, $lname
       Updated actual function - WILL NOT WORK UNTIL I HAVE IT INSERT INTO CUSTOMER*/
    createUser($conn, $fname, $lname, $email, $pwd);


}
else
{
    header("location: ../pages/index-login.php");
    exit();
}