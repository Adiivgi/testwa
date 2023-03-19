
<?php
file_put_contents('incoming.log', file_get_contents('php://input'));
ini_set('log_errors', 1);
ini_set('error_log', 'error.log');
$verify_token = "12345"; // Replace with your own verify token

if (isset($_GET['hub_challenge'])) {
file_put_contents('incoming.log', file_get_contents('php://input'));

    $challenge = $_GET['hub_challenge'];
    $token = $_GET['hub_verify_token'];
}
$token = isset($_GET['hub_verify_token']) ? $_GET['hub_verify_token'] : '';

if ($token === $verify_token) {
file_put_contents('incoming.log', file_get_contents('php://input'));

    header('HTTP/1.1 200 OK');
    echo $challenge;
    die();
}

$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

if (isset($data['entry'][0]['messaging'][0]['message']['text'])) {
    // Handle incoming message here
    $message_text = $data['entry'][0]['messaging'][0]['message']['text'];
    $sender_id = $data['entry'][0]['messaging'][0]['sender']['id'];
    // Do something with the message and sender ID
}

?>
