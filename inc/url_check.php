<?php
include $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';

$page = $_GET['page'];

$find_url_user = $db->prepare("SELECT * FROM users WHERE username = :username");
$find_url_user->execute([ ':username' => $page ]);

if($page == '') {

    echo 'lobby';

} else if($find_url_user->rowCount() > 0) {

    echo 'profile';
    
} else {

    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/widgets/' . $page . '/index.php')) {

        echo 'valid';

    } else {

        echo 'error';

    }

}
?>