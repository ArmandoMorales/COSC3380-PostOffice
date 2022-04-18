<?php

function emptyInputSignup($fname, $lname, $email, $pwd, $pwdrepeat)
{
    $result = 'null'; //Error $result;
    if (empty($fname || $lname || $email || $pwd || $pwdrepeat))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

/*FUNCTION RETIRED*/
function invalidUid($username)
{
    $result = 'null';
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
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
    if ($pwd !== $pwdrepeat)
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}


function uidExists($conn, $email)
{
    //Statement one
    $sql1 = "SELECT * FROM Customer WHERE email = ?;";
    $stmt1 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt1, $sql1))
    {
        header("location: ../pages/index-login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt1, "s", $email);
    mysqli_stmt_execute($stmt1);

    $resultData1 = mysqli_stmt_get_result($stmt1);

    //Statement two
    $sql2 = "SELECT * FROM Employee WHERE email = ?;";
    $stmt2 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt2, $sql2))
    {
        header("location: ../pages/index-login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt2, "s", $email);
    mysqli_stmt_execute($stmt2);

    $resultData2 = mysqli_stmt_get_result($stmt2);

    //Check Customer
    if($row = mysqli_fetch_assoc($resultData1))
    {

        return $row += array("role" => "customer");
    }
    //Check Employee
    else if($row = mysqli_fetch_assoc($resultData2))
    {
        //Test to determine permissions level
        $sql3 = "SELECT Office_Name FROM Employee, Post_Office WHERE Employee.Employee_ID = Post_Office.Supervisor_ID AND email = ?;";
        $stmt3 = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt3, $sql3))
        {
            header("location: ../pages/index-login.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt3, "s", $email);
        mysqli_stmt_execute($stmt3);

        $resultData3 = mysqli_stmt_get_result($stmt3);
        $resultData3_check = mysqli_num_rows($resultData3);

        //Are you a manager?
        if($resultData3_check > 0)
        {
            //Are you HQ manager?
            while($check = mysqli_fetch_assoc($resultData3))
            {
                if($check["Office_Name"] == "Headquarters")
                {
                    return $row += array("role" => "hq manager");
                }
            }
            return $row += array("role" => "manager");
            
        }
        else
        {
            return $row += array("role" => "employee");
        }

    }
    else
    {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt1);
    mysqli_stmt_close($stmt2);
}

//Customer Registration
function createUser($conn, $fname, $lname, $email, $pwd)
{
    $sql = "INSERT INTO Customer (First_Name, Last_Name, email, pass) VALUES(?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../pages/index-login.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../pages/index.php?error=none");
        exit();
}

function emptyInputLogin($username, $pwd)
{
    $result = 'null';
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
    $uidExists = uidExists($conn, $username);

    if($uidExists === false) {
        header("location: ../pages/index-login.php?error=wronglogin1");
        exit();
    }

    $pwdHashed = $uidExists["pass"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false)
    {
        header("location: ../pages/index-login.php?error=wronglogin2");
        exit();
    }
    else if ($checkPwd === true)
    {
        session_start();
        $_SESSION["userid"] = $uidExists["Customer_ID"];
        $_SESSION["useruid"] = $uidExists["email"];
        $_SESSION["role"] = $uidExists["role"];
        $_SESSION["firstName"] = $uidExists["First_Name"];
        $_SESSION["lastName"] = $uidExists["Last_Name"];
        $_SESSION["pnum"] = $uidExists["Employee_Phone_Num"];
        $_SESSION["empid"] = $uidExists["Employee_ID"];
        $_SESSION["empAddressKey"] = $uidExists["Employee_Address_Key"];
        $_SESSION["officeID"] = $uidExists["Office_ID"];
        header("location: ../pages/index.php");
        exit();
    }
}

function createEmployee($conn, $fname, $lname, $address, $phone, $office, $email, $pwd)
{
    $sql = "INSERT INTO Employee (First_Name, Last_Name, Employee_Address_Key, Employee_Phone_Num, Office_ID, email, pass) VALUES(?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../pages/index-login.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssiiiss", $fname, $lname, $address, $phone, $office, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../pages/index.php?error=none");
        exit();
}