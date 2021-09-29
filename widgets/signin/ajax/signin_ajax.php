<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';

if(!$loggedin) {

    $login_username = $_POST['username'];
    $login_password = $_POST['password'];

    $find_username = $db->prepare("SELECT * FROM users WHERE username = :username");
    $find_username->execute([ ':username' => $login_username ]);
    $show_username = $find_username->fetch(PDO::FETCH_OBJ);

    $find_login_attempt = $db->prepare("SELECT * FROM login_attempt WHERE username = :username");
    $find_login_attempt->execute([ ':username' => $login_username ]);
    $login_attempt = $find_login_attempt->fetch(PDO::FETCH_OBJ);

    if($login_username == '') {
        echo 'username_empty';
    } else if($login_password == '') {
        echo 'password_empty';
    } else if($find_username->rowCount() == 0) {
        echo 'user_incorrect';
    } else if(!password_verify($login_password, $show_username->password)) {
        
        if($find_login_attempt->rowCount() == 0) {

            $insert = $db->prepare("INSERT INTO login_attempt (username, amount, time) VALUES (:username, :attempt, :time)");
            $insert->execute([ ':username' => $login_username, ':attempt' => 1, ':time' => time() ]);

            echo 'user_incorrect';

        } else {

            if($login_attempt->amount < 5) {

                $update = $db->prepare("UPDATE login_attempt SET amount = amount + 1, time = :time WHERE username = :username");
                $update->execute([ ':username' => $login_username, ':time' => time() ]);
                echo 'user_incorrect';

            } else if($login_attempt->time + 300 <= time()) {

                $update = $db->prepare("UPDATE login_attempt SET amount = 1, time = :time WHERE username = :username");
                $update->execute([ ':username' => $login_username, ':time' => time() ]);
                echo 'user_incorrect';

            } else {

                echo 'timed_out';

            }

        }

    } else {

        if(($find_login_attempt->rowCount() == 0 or $login_attempt->amount < 5) or $login_attempt->time + 300 <= time() ) {

            $delete = $db->prepare("DELETE FROM login_attempt WHERE username = :username");
            $delete->execute([ ':username' => $login_username ]);

            $session_key = uniqid();
            $session_insert = $db->prepare("INSERT INTO sessions (uid, session_key, time) VALUES(:uid, :session_key, :time)");
            $session_insert->execute([ ':uid' => $show_username->id, ':session_key' => $session_key, ':time' => time() ]);
            setcookie("account", $session_key, time() + 31556926, '/');
            echo 'success';

        } else {
            echo 'timed_out';
        }
    }
}
?>