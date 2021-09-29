<?php
include $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';

function getAccessToken() {

    global $db;

    $code = $_POST['code'];
    $find_auth = $db->prepare("SELECT * FROM login_auth WHERE code = :code");
    $find_auth->execute([ ':code' => $code ]);
    $auth = $find_auth->fetch(PDO::FETCH_OBJ);
    $verifier = $auth->verifier;
    $client_id = 'chess-server';
    $callback_uri = 'http://localhost/signin/lichess';
    $token_url = "https://lichess.org/api/token";

    $authorization = base64_encode("$client_id");
    $header = array("Authorization: Basic {$authorization}","Content-Type: application/x-www-form-urlencoded");
    $content = "grant_type=authorization_code&code=$code&redirect_uri=$callback_uri&code_verifier=$verifier&client_id=$client_id";

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $token_url,
        CURLOPT_HTTPHEADER => $header,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $content
    ));
    
    $response = curl_exec($curl);
    curl_close($curl);

    if ($response === false) {

        echo 'failed';

    } else if (json_decode($response)->error) {

        echo $response;

    } else {

        $curl_2 = curl_init();

        curl_setopt_array($curl_2, array(
            CURLOPT_URL => "https://lichess.org/api/account/email",
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . json_decode($response)->access_token, "Content-Type: application/json"
            )
        ));

        $response_2 = curl_exec($curl_2);
        curl_close($curl_2);

        $delete = $db->prepare("DELETE FROM login_auth WHERE code = :code");
        $delete->execute([ ':code' => $code ]);

            $find_passport_user = $db->prepare("SELECT * FROM users WHERE email = :email");
            $find_passport_user->execute([ ':email' => json_decode($response_2)->email ]);
            $passport_user = $find_passport_user->fetch(PDO::FETCH_OBJ);

            // user not found, create new account
            if($find_passport_user->rowCount() == 0) {

                $insert_user = $db->prepare("INSERT INTO users (username, password, email, ugroup) VALUES(:username, :password, :email, :ugroup)");
                $insert_user->execute([ ':username' => 'ibib', ':password' => 'iniun', ':email' => json_decode($response_2)->email, ':ugroup' => 1 ]);
                $new_id = $db->lastInsertId();

                $prefs = $db->prepare("INSERT INTO prefs (uid, bg, pieces, board, boardtype) VALUES(:uid, :bg, :pieces, :board, :boardtype)");
                $prefs->execute([
                    ':uid' => $new_id,
                    ':bg' => 'rgb(75, 93, 147)',
                    ':pieces' => 'default',
                    ':board' => 'default',
                    ':boardtype' => '2d'
                ]);

                $update_username = $db->prepare("UPDATE users SET username = :username WHERE id = :id");
                $update_username->execute([ ':username' => 'user' . $new_id, ':id' => $new_id ]);

            } else {

                $new_id = $passport_user->id;

            }

            $session_key = uniqid();
            $session_insert = $db->prepare("INSERT INTO sessions (uid, session_key, time) VALUES(:uid, :session_key, :time)");
            $session_insert->execute([ ':uid' => $new_id, ':session_key' => $session_key, ':time' => time() ]);
            setcookie("account", $session_key, time() + 31556926, '/');

            echo 'success';

    }

}

echo getAccessToken();
?>