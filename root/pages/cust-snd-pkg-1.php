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
    <?php
        include_once '../header.php';
    ?>
    <!-- This section replaced with universal header above
    <section class="sub-header">
        <nav>
            
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
    </section> -->

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
                <i class="fa fa-truck" aria-hidden="true"></i>
                <span>
                    <h5>Send Package</h5>
                </span>
                </div>

                <form method="post" action="cust-snd-pkg-2.php">
                <!-- Decision moved to Employee
                <div>
                    <span>
                        <h2>Post Office</h2>
                    </span>
                </div>
                <input type="text" name="fname" placeholder="Enter your desired post office"> -->

                <div>
                    <span>
                        <h2 style="color:gray;">Return Address</h2>
                    </span>
                </div> 
                <div>
                    <span>
                        <h2>Building #</h2>
                    </span>
                </div>
                <input type="text" name="Rbuilding-num" placeholder="Enter building number">

                <div>
                    <span>
                        <h2>Street Name</h2>
                    </span>
                </div>
                <input type="text" name="Rstreet-name" placeholder="Enter street name" maxlength="25">

                <div>
                    <span>
                        <h2>City</h2>
                    </span>
                </div>
                <input type="text" name="Rcity" placeholder="Enter city" maxlength="20">
                
                <div>
                    <span>
                        <h2>State</h2>
                    </span>
                </div>
                <input type="text" name="Rstate" placeholder="Enter state">

                <div>
                    <span>
                        <h2>Zipcode</h2>
                    </span>
                </div>
                <input type="text" name="Rzip" placeholder="Enter zipcode">
                
                <div>
                    <span>
                        <h2 style="color:gray;">Destination Address</h2>
                    </span>
                </div>    

                <!--OUTGOING INFO BELOW-->
                <div>
                        <span>
                            <h2>Building #</h2>
                        </span>
                    </div>
                    <input type="text" name="Dbuilding-num" placeholder="Enter building number">

                    <div>
                        <span>
                            <h2>Street Name</h2>
                        </span>
                    </div>
                    <input type="text" name="Dstreet-name" placeholder="Enter street name" maxlength="25">

                    <div>
                        <span>
                            <h2>City</h2>
                        </span>
                    </div>
                    <input type="text" name="Dcity" placeholder="Enter city" maxlength="20">
                    
                    <div>
                        <span>
                            <h2>State</h2>
                        </span>
                    </div>
                    <input type="text" name="Dstate" placeholder="Enter state">

                    <div>
                        <span>
                            <h2>Zipcode</h2>
                        </span>
                    </div>
                    <input type="text" name="Dzip" placeholder="Enter zipcode">

                    <div>
                        <span>
                            <h2>Package Type</h2>
                        </span>
                    </div>
                    <input type="text" name="ptype" placeholder="Enter Package Type (Standard/Fragile)">


                    <div>
                        <span>
                            <h2>Package Weight (lbs)</h2>
                        </span>
                    </div>
                    <input type="number" name="weight" placeholder="Enter package weight">

                    <div>
                        <span>
                            <h2>Package Volume (lbs^3)</h2>
                        </span>
                    </div>
                    <input type="text" name="vol" placeholder="Enter package volume">
                    
                    <button type="submit" class="hero-btn red-btn" id="cust-conf-ship-btn">Save Information</button>

                    <p class="heading"> HEADING </p>
                    <p class="paragraph"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus blanditiis cumque voluptate laboriosam? Voluptate delectus saepe impedit, dolores aliquam in possimus corporis rerum a quam itaque dolor animi cupiditate expedita.</p>

                    </form>
            </div> 
            
        </div>

    </section>
    
</body>
</html>    