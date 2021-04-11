<?php
include "./lorem.php";

$cardCount = 1;

function generate()
{
    global $lorem_ipsum, $cardCount;
    $arr = [];
    for ($index = 0; $index < 8; $index++) {
        $lenText = random_int(1, strlen($lorem_ipsum));
        $lenName = random_int(1, strlen($lorem_ipsum));
        $card = (object) [
            'id' => (int)($cardCount++),
            'name' => (string)substr($lorem_ipsum, $lenName, ($lenName + 10) > strlen($lorem_ipsum) ? strlen($lorem_ipsum) : ($lenName + 10)),
            'completed' => (bool)(random_int(0, 1)),
            'text' => (string)substr($lorem_ipsum, 0, $lenText)
        ];
        array_push($arr, $card);
    };
    return $arr;
};
