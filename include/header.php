<div class="header row" >
    <div class="col-md-4">
        <a href="home.php" class="logo">Ticketmaster</a>
    </div>
    <div class="col-md-4 col-lg-3">
        <a class="active" href="events.php?event_category=concerts" >Concerts</a>
    </div>
    <div class="col-md-4 col-lg-3">
        <a href="events.php?event_category=sports">Sports</a>
    </div>
    <?php   
        //  Header displayed when user is not logged in. 
        if (!isset($_SESSION['user_id'])) {
    ?>
    <div class="col-md-4 col-lg-2 text-right">
        <a  class="" href="#" data-toggle="modal" data-target="#login-modal">
            <i class="fas fa-sign-in-alt"></i>
        </a>
    </div>
    <?php
        //  Header displayed when user is logged in. 
        } else {
    ?>
    <div class="row logged-in">
        <div class="col-sm-6">
            <p class="welcome-user">  Hi, <?= $_SESSION["full_name"] ?></p>        
        </div>
        <div class="col-sm-3">
            <a  href="dashboard.php">
                <i class="fas fa-user"></i>
            </a>
        </div>
        <div class="col-sm-3">
            <a  class="" href="logout.php">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>
    <?php
        }
    ?> 
</div>  