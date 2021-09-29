<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';

$email = $_POST['email'];
$find_email = $db->prepare("SELECT * FROM users WHERE email = :email");
$find_email->execute([ ':email' => $email ]);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    echo 'invalid';

} else {

    if($find_email->rowCount() == 0) {

        echo 'available';

    } else {
        
        echo 'taken';
    }
}
?>