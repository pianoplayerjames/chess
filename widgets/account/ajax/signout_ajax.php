<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';

if($loggedin) {

    if(isset($_COOKIE['account'])) {

        $delete_session = $db->prepare("DELETE FROM sessions WHERE uid = :uid && session_key = :session_key");
        $delete_session->execute([ ':uid' => $user->id, ':session_key' => $_COOKIE['account']]);

        unset($_COOKIE['account']); 
        setcookie('account', null, -1, '/'); 
        return true;

    } else {

        return false;

    }

}
?>