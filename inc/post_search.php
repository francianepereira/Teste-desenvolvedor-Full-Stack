<?php

header('Content-Type: application/json');

$request_email = $_POST['email'];
$request_address = $_POST['address'];
$token = $_COOKIE["token"];
$score_email = $_POST['score'];
$ip = $_SERVER["REMOTE_ADDR"];
$number_address = 0;

function send_email($from, $to, $token) {
    $headers = "From: $from\r\n" .
            "Reply-To: $to\r\n" .
            "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $assunto = "Teste Desenvolver Full Stack oHub";
    $mensagem = "Token : " . $token;
    mail($to, $assunto, nl2br($mensagem), $headers);
}

function get_number_address($address) {
    $number = null;
    $array_address = explode(",", $address);
    foreach ($array_address as $value) {
        if (is_numeric($value)) {
            $number = $value;
        }
    }
    if ($number == null) {
        throw new Exception('Número do endereço não encontrado', 103);
    }
    return $number;
}

try {
    $number_address = get_number_address($request_address);
    if ($score_email != "0.8") {
        throw new Exception('E-mail incorreto', 104);
    } else {
        $json = array('email' => $request_email, 'address' => array('number' => $number_address), 'score' => $score_email, 'status' => 'OK', 'numbererror' => NULL, 'error' => '');
        send_email("franciane.hkd@gmail.com", $request_email, $token);
    }
} catch (Exception $e) {
    if ($e->getCode() == 103 && $score_email != "0.8")
        $json = array('email' => NULL, 'address' => NULL, 'status' => 'Error', 'numbererror' => 105, 'error' => array("E-mail incorreto",$e->getMessage()));
    else
        $json = array('email' => NULL, 'address' => NULL, 'status' => 'Error', 'numbererror' => $e->getCode(), 'error' => $e->getMessage());
}
echo json_encode($json);
?>