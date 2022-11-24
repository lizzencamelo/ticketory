<div>
    <?php
    
        //  Header displayed when user is not logged in. 
        if (!isset($_SESSION['user_id'])) {
        ?>
            <a class="nav-link" href="#" data-toggle="modal" data-target="#signup-modal">
            <i class="fas fa-user"></i>Signup
            </a>
            <a  class="nav-link" href="#" data-toggle="modal" data-target="#login-modal">
            <i class="fas fa-sign-in-alt"></i>Login
            </a>
        </li>
        <?php
            //  Header displayed when user is logged in. 
            } else {
        ?>
            Hi, <?= $_SESSION["full_name"] ?>
            <a  class="nav-link" href="dashboard.php">
                <i class="fas fa-user"></i>Dashboard
            </a>
            <a  class="nav-link" href="logout.php">
                <i class="fas fa-sign-out-alt"></i>Logout
            </a>
        <?php
        }
    ?>  
</div>
