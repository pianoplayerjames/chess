<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';

$color = $_POST['color'];

if($loggedin) {

    $update = $db->prepare("UPDATE prefs SET bg = :bg WHERE uid = :uid");
    $update->execute([ ':bg' => $color, ':uid' => $user->id ]);

} else {

    if(isset($_COOKIE['offlineprefs'])) {

        setcookie("offlineprefs", $str, time() + 31556926, '/');

    } else {

        setcookie("offlineprefs", '', time() + 31556926, '/');

    }

}
?>