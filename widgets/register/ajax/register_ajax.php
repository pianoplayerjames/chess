<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$options = [ 'cost' => 12 ];
$password_hash = password_hash($password, PASSWORD_BCRYPT, $options);
$email = $_POST['email'];

$find_username = $db->prepare("SELECT * FROM users WHERE username = :username");
$find_username->execute([ ':username' => $username ]);

$find_email = $db->prepare("SELECT * FROM users WHERE email = :email");
$find_email->execute([ ':email' => $email ]);

if($username == '') {
    echo 'username_empty';
} else if($password == '') {
    echo 'password_empty';
} else if($email == '') {
    echo 'email_empty';
} else if(!preg_match('/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/', $username)) {
    echo 'invalid_username';
} else if($find_username->rowCount() >0) {
    echo 'username_taken';
} else if(strlen($username) > 20) {
    echo 'username_too_long';
} else if(strlen($password) < 6) {
    echo 'password_too_short';
} else if(strlen($password) > 200) {
    echo 'password_too_long';
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'invalid_email';
} else if($find_email->rowCount() >0) {
    echo 'email_taken';
} else {
    $insert = $db->prepare("INSERT INTO users (username, password, email, ugroup) VALUES(:username, :password, :email, :ugroup)");
    $insert->execute([ ':username' => $username, ':password' => $password_hash, ':email' => $email, ':ugroup' => 1 ]);
    $new_id = $db->lastInsertId();
    $session_key = uniqid();
    $session_insert = $db->prepare("INSERT INTO sessions (uid, session_key, time) VALUES(:uid, :session_key, :time)");
    $session_insert->execute([ ':uid' => $new_id, ':session_key' => $session_key, ':time' => time() ]);
    setcookie("account", $session_key, time() + 31556926, '/');
    $prefs = $db->prepare("INSERT INTO prefs (uid, bg, pieces, board, boardtype) VALUES(:uid, :bg, :pieces, :board, :boardtype)");
    $prefs->execute([
        ':uid' => $new_id,
        ':bg' => 'rgb(75, 93, 147)',
        ':pieces' => 'default',
        ':board' => 'default',
        ':boardtype' => '2d'
    ]);
    echo 'success';
}
?>