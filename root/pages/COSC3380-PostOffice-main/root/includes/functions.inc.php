<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat)
{
    $result = 'null'; //Error $result;
    if (empty($name || $email || $username || $pwd || $pwdrepeat))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    $result = 'null';
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) //Error? Missing paranthesis before preg_match
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result = 'null';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat)
{
    $result = 'null';
    if ($pwd !== $pwdrepeat) //Two paranthesis error? HA GOT IT
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";  //This will not interact with my database.  Now it will.
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../pages/index-login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData))
    {
        return $row; //HA I remembered the ;
    }
    else
    {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd)
{
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES(?, ?, ?, ?);";  //This will not interact with my database.
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../pages/index-login.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../pages/index.php?error=none");
        exit();
}

function emptyInputLogin($username, $pwd)
{
    $result = 'null'; //Error $result;
    if (empty($username || $pwd))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd)
{
    $uidExists = uidExists($conn, $username, $username);

    if($uidExists === false) {
        header("location: ../pages/index-login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false)
    {
        header("location: ../pages/index-login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true)
    {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../pages/index.php");
        exit();
    }
}