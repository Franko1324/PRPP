<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!$data || !isset($data['message'])) {
    echo json_encode(["response" => "Nevažeći zahtjev"]);
    exit();
}

$userInput = strtolower($data['message']);

function getBotResponse($input) {
    $responses = [
        "bok" => "Bok! Kako mogu pomoći?",
        "kako si" => "Ja sam bot, ali osjećam se odlično! Kako si ti?",
        "doviđenja" => "Doviđenja! Ugodan dan!",
        "koje je godine nastao tvz" => "TVZ je nastao 1998. godine.",
        "koji smjerovi postoje na tvz-u" => "Na TVZ-u postoje smjerovi: Računarstvo, Elektrotehnika, Graditeljstvo, Mehatronika, Strojarstvo i Informatika.",
        "gdje mogu pronaći više informacija o erasmusu" => "Više informacija o Erasmus programu možete pronaći na: <a href='https://www.tvz.hr/studiji/erasmus/' target='_blank'>https://www.tvz.hr/studiji/erasmus/</a>"
    ];

    return $responses[$input] ?? "Nisam siguran kako odgovoriti na to.";
}

$response = getBotResponse($userInput);

echo json_encode(["response" => $response]);
?>
