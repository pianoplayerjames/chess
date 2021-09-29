<?php
include $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';
if($loggedin) {
?>
<script>
load('', 1);
</script>
<?php 
} else {
?>
<div class="row position-relative">
    <div class="card trans_bg col-lg-4 g-0 mt-5 mx-auto">
        <div class="card-body">
            <h4 class='mb-3'>Create an Account</h4>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="register_username" placeholder="Username">
                <span id='username_check' class="input-group-text bg-white border-0 text-white" id="basic-addon2"></span>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="register_password" placeholder="Password">
                <div class="progress" style='background: none;height: 5px;margin-top: -3px; margin-left: 1px; margin-right: 1px;'>
                    <div id='register_password_strength' class="progress-bar" role="progressbar" style="width: 0%;"></div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="register_email" placeholder="Email Address">
                <span id='email_check' class="input-group-text bg-white border-0 text-white" id="basic-addon2"></span>
            </div>

            <div class="alert alert-warning p-2" style='font-size: 13px;' role="alert"><i class="fas fa-info-circle"></i> You must not use any computer assistance when playing chess. By clicking "Register" you agree to play a fair game at all times.</div>
            <div id='register_error' class="alert alert-danger d-none p-2" style='font-size: 13px;' role="alert"></div>
            <button id="register_button" class="btn btn-success" disabled>Register</button>
            <hr />
            <div class='text-center'>Sign Up with</div>
            <div class='mb-2'></div>
            <div class='text-center'>
                <button id="lichess_connect" class="btn btn-light"><img src='<?php echo $url; ?>assets/img/lichess-logo.svg' width='24px' class='p-0 img-fluid float-start' /> Lichess</button>
            </div>
        </div>
    </div>
</div>
<?php 
}
?>