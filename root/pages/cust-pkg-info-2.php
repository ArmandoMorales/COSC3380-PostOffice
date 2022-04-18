<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Self Services</title>
<link rel="stylesheet" href="../css/customer-services.css">
<!-- font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,600,700&display=swap" rel="stylesheet">
<!-- icons -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <section class="sub-header">
        <nav>
            <!-- TODO: add redirects based on employee permissions -->
            <a href=""><img src="../images/pinkpostlogo.png"></a>
            <div class="nav-links" id="navLinks">  
                <ul>
                    <li><a href="">HOME</a></li>
                    <li><a href="">CONTACT</a></li>
                    <li><a href="customer-services.php">CUSTOMER SELF SERVICES</a></li>
                    <li><a href="">LOGOUT</a></li>
                </ul>
            </div>
        </nav>
            <h1></h1>
    </section>

    <!-- Side Bar -->
    <section class="side-bar-container">
        <div class="side-bar" id="sidebar">
            <div class="list">
                <a href="customer-services.php"><div class="icons"><i class="fa fa-user" aria-hidden="true"></i><p id="icon-txt">Customer Information</p></div></a>
                <a href="cust-pkg-info-1.php"><div class="icons"><i class="fa fa-dropbox" aria-hidden="true"></i><p id="icon-txt">Package Information</p></div></a>
                <a href="cust-snd-pkg-1.php"><div class="icons"><i class="fa fa-truck" aria-hidden="true"></i><p id="icon-txt">Send Package</p></div></a>
                <a href="cust-shop.php"><div class="icons"><i class="fa fa-book" aria-hidden="true"></i><p id="icon-txt">Shop</p></div></a>
            </div>
        </div>

        <!-- content -->
        <div class="content">

            <div class="form-col">
                <div>
                    <i class="fa fa-dropbox" aria-hidden="true"></i>
                    <span>
                        <h5>Package Info For ID: 123456789</h5>
                    </span>
                </div>

                <div>
                    <span>
                        <h2>Package Location</h2>
                    </span>
                </div>

                <div>
                    <span>
                        <p id="display-info">Post Office 1</p>
                    </span>
                </div>

                <div>
                    <span>
                        <h2>Time Arrived At Current Post Office</h2>
                    </span>
                </div>

                <div>
                    <span>
                        <p id="display-info">4/17/2022 3:00PM</p>
                    </span>
                </div>

            </div> 

            <div class="location-history-list"> 
                    <h2>Package Location History</h2>
                    <ul>
                        <li><span>1</span>Post Office 1</li>
                        <li><span>2</span>Post Office 2</li>
                        <li><span>3</span>Post Office 3</li>
                        <li><span>4</span>Post Office 4</li>
                        <li><span>5</span>Post Office 5</li>
                    </ul>
            </div>

            <!-- TODO: can't remove: will mess up side bar, so just hide by using color white in css -->
            <p class="heading"> HEADING </p>
            <p class="paragraph"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus blanditiis cumque voluptate laboriosam? Voluptate delectus saepe impedit, dolores aliquam in possimus corporis rerum a quam itaque dolor animi cupiditate expedita.</p>
            
        </div>

    </section>
    
</body>
</html>    