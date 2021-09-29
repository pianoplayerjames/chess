<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';
    if(!$loggedin) {
        
        session_start();
        if(!isset($_COOKIE['session'])) {
            $session_key = uniqid();
            setcookie("session", $session_key, time() + 31556926, '/');
            $_SESSION['session'] = $session_key;
        }

    } else {

        $find_prefs = $db->prepare("SELECT * FROM prefs WHERE uid = :uid");
        $find_prefs->execute([ ':uid' => $user->id ]);
        $prefs = $find_prefs->fetch(PDO::FETCH_OBJ);

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess</title>
    <link rel="stylesheet" href="<?php echo $url ; ?>assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo $url ; ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $url ; ?>assets/css/fontawesome/css/all.min.css" />
    <script src="<?php echo $url ; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $url ; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo $url ; ?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo $url ; ?>assets/js/site.js"></script>

</head>

<body style='background: <?php echo $prefs->bg; ?>'>
    <div id="header"></div>
    <div id='page' class="container mt-5 pt-4"></div>
</body>

</html>