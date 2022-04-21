<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Self Services</title>
<link rel="stylesheet" href="../css/employee-services.css">
<!-- font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,600,700&display=swap" rel="stylesheet">
<!-- icons -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <section class="sub-header">           
    <?php
        include_once '../header.php';
    ?>
    </section>

    <!-- This section replaced with universal header above
    <section class="sub-header">
        <nav>
    
            <a href=""><img src="../images/pinkpostlogo.png"></a>
            <div class="nav-links" id="navLinks">  
                <ul>
                    <li><a href="">HOME</a></li>
                    <li><a href="">CONTACT</a></li>
                    <li><a href="employee-services.php">EMPLOYEE SELF SERVICES</a></li>
                    <li><a href="">LOGOUT</a></li>
                </ul>
            </div>
        </nav>
            <h1></h1>
    </section> -->

    <!-- Side Bar -->
    <section class="side-bar-container">
        <div class="side-bar" id="sidebar">
            <div class="list">
                <a href="employee-services.php"><div class="icons"><i class="fa fa-user" aria-hidden="true"></i><p id="icon-txt">Employee Information</p></div></a>
                <a href="emp-create-pkg-1.php"><div class="icons"><i class="fa fa-dropbox" aria-hidden="true"></i><p id="icon-txt">Start Package</p></div></a>
                <a href="emp-update-trk-1.php"><div class="icons"><i class="fa fa-truck" aria-hidden="true"></i><p id="icon-txt">Update Tracking</p></div></a>
                <a href="emp-update-inv-1.php"><div class="icons"><i class="fa fa-book" aria-hidden="true"></i><p id="icon-txt">Update Inventory</p></div></a>
            </div>
        </div>

        <!-- content -->
        <div class="content">

            <div class="form-col">
            <div>
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <span>
                        <h5>Update Inventory</h5>
                    </span>
                    </div>

                    <form method="POST" action="emp-update-inv-3.php">
                    <div>
                        <span>
                            <h2>Item Name</h2>
                        </span>
                    </div>
                    <input type="text" name="item-name" placeholder="Enter item's name" required>

                    <div>
                        <span>
                            <h2>Price</h2>
                        </span>
                    </div>
                    <input type="text" name="price" placeholder="Enter your item's updated price" required>

                    <div>
                        <span>
                            <h2>Count Increase</h2>
                        </span>
                    </div>
                    <input type="text" name="count-inc" placeholder="Enter item's increase" required>

                    <button type="submit" class="hero-btn red-btn" id="update-inventory-confirm">Confirm</button>

                    <p class="heading"> HEADING </p>
                    <p class="paragraph"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus blanditiis cumque voluptate laboriosam? Voluptate delectus saepe impedit, dolores aliquam in possimus corporis rerum a quam itaque dolor animi cupiditate expedita.</p>

                    </form>
            </div> 
            
        </div>

    </section>
    
</body>
</html>    