<?php 
if(!isset($_COOKIE['offlineprefs'])) {

    // create array
    $prefs = array(
        'bg' => 'rgba(183,39,28, 0.5)',
        'boardType' => '3d',
        'pieces' => 'default',
        'sound' => 'default'
    );

    // build query from array
    $query = http_build_query($prefs, '', '&');

    // store in cookie
    setcookie("offlineprefs", $query, time() + 31556926, '/');

} else {

    parse_str($_COOKIE['offlineprefs'], $output);

    // output
    echo $output['bg'];

}
?>