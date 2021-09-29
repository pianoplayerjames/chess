<?php 
$url = 'http://localhost/';

try {
    $db = new PDO('mysql:host=localhost;dbname=chess', 'root', 'root');

    if(isset($_COOKIE['account'])) {
        
        $find_session = $db->prepare("SELECT * FROM sessions WHERE session_key = :session_key");
        $find_session->execute([ ':session_key' => $_COOKIE['account'] ]);
        $session =  $find_session->fetch(PDO::FETCH_OBJ);

        if($find_session->rowCount() == 0) {

            $loggedin = FALSE;

        } else {

            $find_user = $db->prepare("SELECT * FROM users WHERE id = :id");
            $find_user->execute([ ':id' => $session->uid ]);

            if($find_user->rowCount() == 0) {

                echo $loggedin = FALSE;

            } else {

                $user = $find_user->fetch(PDO::FETCH_OBJ);
                $loggedin = TRUE;

            }
        }

    } else {

        $loggedin = FALSE;

    }

} catch (PDOException $e) {
    print "Error connecting to database<br/>";
    die();
}
?>