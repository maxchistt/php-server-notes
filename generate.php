<?php
include "./lorem.php";

$cardCount = 1;

function generate()
{
    global $lorem_ipsum, $cardCount;
    $arr = [];
    for ($index = 0; $index < 8; $index++) {
        $len = random_int(1, strlen($lorem_ipsum));
        $card = (object) [
            'id' => (int)($cardCount++),
            'completed' => (bool)(random_int(0, 1)),
            'text' => (string)substr($lorem_ipsum, 0, $len)
        ];
        array_push($arr, $card);
    };
    return $arr;
};
