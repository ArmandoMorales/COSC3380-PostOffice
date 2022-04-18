<?php
                    if(isset($_POST['chooseEmployee'])){
                        echo "Button Pressed";
                    }

//We need to make sure that the employee is a valid employee
function empExists($conn, $id){
    $sql1 = "SELECT count(*) FROM employee WHERE Employee_ID = ?;";
    $stmt1 = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt1, $sql1))
    {
        //header("location: ../pages/index-login.php?error=stmtfailed");
        //Send an error message, that this employee is invalid
        exit();
    }
    mysqli_stmt_bind_param($stmt1, "i", $id);
    $empTrue = mysqli_query($conn, $stmt1);
    //If no rows are there, error and exit
    if(empTrue == 0 ){
        header("location: ../pages/index-login.php?error=invEmp");
        exit();
    }

    //If it is, unhide the buttons and display whether the employee is already a manager or admin
   
    //Determine if Manager
    $sql2 = "SELECT count(*) FROM employee as e and employee as m WHERE e.Employee_ID = m.Super_ID and m.Super_ID = ?;";
    $stmt2 = mysqli_stmt_init($conn);
    mysqli_stmt_bind_param($stmt2, "i", $id);
    $mngTrue = mysqli_query($conn, $stmt2);
    //Determine if Admin
    $admTrue == 1;

    //Else send back a message
    if($mngTrue == 1 && admTrue == 1){
        //Output that the employee is already a manager and admin
        header("location: ../pages/index-login.php?error=maxPerm");
        exit();
    } else if($mngTrue == 1){
        //Output that the employee is already a manager
        unHide();
    } else if($admTrue == 1){
        //Output that the employee is already an admin
        unHide();
    } else{
        //Output that employee is ready for a promotion
        unHide();
    }
}

//Take in which sections are clicked
//If manager is clicked and the employee is a manager, return error
//If admin is clicked and the employee is an admin, return error

//If not, add it to one or both tables