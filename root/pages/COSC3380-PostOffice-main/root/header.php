<?php
    session_start();
?> 

<nav>
    <a href="index.php"><img src="../images/pinkpostlogo.png"></a>
    <div class="nav-links" id="navLinks">
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="index-contact.php">CONTACT</a></li>
            <?php
                if (isset($_SESSION["useruid"]))
                {
                    echo '<li><a href="index-contact.php">Fake Account Link !</a></li>';
                    echo '<li><a href="../includes/logout.inc.php">Log out</a></li>';
                }
                else
                {
                    echo '<li><a href="index-login.php">REGISTER / SIGN IN</a></li>';
                }
            ?>
        </ul>
    </div>
</nav>