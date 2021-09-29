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

        <?php
        if(isset($_GET['path'][2])) {
            if($_GET['path'][2] == 'lichess') {

                $find_state = $db->prepare("SELECT * FROM login_auth WHERE state = :state");
                $find_state->execute([ ':state' => $_GET['params']['state'] ]);

                if($find_state->rowCount() >0 ) {

                    $insert = $db->prepare("UPDATE login_auth SET code = :code WHERE state = :state");
                    $insert->execute([ ':code' => $_GET['params']['code'], ':state' => $_GET['params']['state'] ]);

                ?>

                    <script>
                        $(function() {
                            lichessAuth("<?php echo $_GET['params']['code']; ?>");
                            load('signin', 1);
                        });
                        
                    </script>

                <?php

                }

            }
        }
        ?>
        <h4 class='mb-3'>Sign In</h4>
            <div class="mb-3">
                <input type="text" class="form-control" id="signin_username" placeholder="Email address/Username">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="signin_password" placeholder="Password">
            </div>
            <div id='signin_error' class="alert alert-danger d-none p-2" style='font-size: 13px;' role="alert"></div>
            <button id="signin_button" class="btn btn-success">Sign In</button>

            <hr />
            <div class='text-center'>Sign In with</div>
            <div class='mb-2'></div>
            <div class='text-center'>
                <button id="lichess_connect" class="btn btn-light"><img src='<?php echo $url; ?>assets/img/lichess-logo.svg' width='24px' class='p-0 img-fluid float-start' /> Lichess</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo $url ; ?>widgets/signin/index.js"></script>
<?php
}
?>