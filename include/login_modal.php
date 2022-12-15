<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-heading" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class='bx bx-x'></i></span>
                    </button>
                    <div class="modal-title text-center" id="login-heading">
                        <div class="inner">
                            <i class='bx bx-user'></i>
                        </div>
                    </div>
                    <form id="login-form" class="form" role="form" method="post" action="api/login_submit.php">
                        <div class="input-group form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="input-group form-group">                            
                            <input type="password" class="form-control" name="password" placeholder="Password" minlength="6" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn">Login</button>
                        </div>
                    </form>
                    <span class="modal-message">
                        <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signup-modal">Click here</a>
                        to register a new account
                    </span>
                </div>
        </div>
    </div>
</div>