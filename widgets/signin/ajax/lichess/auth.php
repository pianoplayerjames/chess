<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/inc/config.php';

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$client_id = 'chess-server';
$scopes = "email:read%20preference:write";
$state = generate_string($permitted_chars, 20);
$authorize_url = "https://lichess.org/oauth";
$callback_uri = 'http://localhost/signin/lichess';

$verifier = base64URLEncode(generate_string($permitted_chars, 32));
$challenge = base64URLEncode(hash('sha256', $verifier, true));

function base64URLEncode($str) {
    return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
}

function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    return $random_string;
}


$insert = $db->prepare("INSERT INTO login_auth (state, code, challenge, verifier, time) VALUES (:state, :code, :challenge, :verifier, :time)");
$insert->execute([ ':state' => $state, ':code' => '', ':challenge' => $challenge, ':verifier' => $verifier, ':time' => time() ]);

function getAuthorizationCode() {
        global $authorize_url, $client_id, $callback_uri, $scopes, $state, $challenge;
        $authorization_redirect_url = $authorize_url . "?response_type=code&client_id=" . $client_id . "&redirect_uri=" . urlencode($callback_uri) . "&scope=" . $scopes . "&state=".$state . '&code_challenge_method=S256&code_challenge='.$challenge;

        echo $authorization_redirect_url;
}


echo getAuthorizationCode();