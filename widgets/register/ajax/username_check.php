<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';

$username = $_POST['username'];
$find_username = $db->prepare("SELECT * FROM users WHERE username = :username");
$find_username->execute([ ':username' => $username ]);

if($find_username->rowCount() == 0) {
    echo 'available';
} else {
    echo 'taken';
}
?>