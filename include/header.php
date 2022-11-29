<div class="menu">  
        <div class="header" >
          <a href="home.php" class="logo">Ticketmaster</a>
          <div class="header-center">
            <a class="active" href="events.php?event_category=concerts" >Concerts</a>
            <a href="events.php?event_category=sports">Sports</a>
          </div>
          <div class="header-right">
          <?php   
                //  Header displayed when user is not logged in. 
                if (!isset($_SESSION['user_id'])) {
            ?>
            <a  class="" href="#" data-toggle="modal" data-target="#login-modal">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
            <?php
                //  Header displayed when user is logged in. 
                } else {
            ?>
                Hi, <?= $_SESSION["full_name"] ?>
                <a  class="" href="dashboard.php">
                    <i class="fas fa-user"></i>Dashboard
                </a>
                <a  class="" href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>Logout
                </a>
            <?php
                }
            ?>  
          </div>
  </div>