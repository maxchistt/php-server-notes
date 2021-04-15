<?php
include "./lorem.php";

$cardCount = 1;
$colors = ["#F38181", "#FCE38A", "#EAFFD0"];

function generate()
{
    global $lorem_ipsum, $cardCount, $colors;
    $arr = [];
    for ($index = 0; $index < 8; $index++) {
        $lenText = random_int(1, strlen($lorem_ipsum));
        $lenName = random_int(1, strlen($lorem_ipsum));
        $card = (object) [
            'id' => (int)($cardCount++),
            'name' => (string)substr($lorem_ipsum, $lenName, ($lenName + 30) > strlen($lorem_ipsum) ? ($lenName + 30) - strlen($lorem_ipsum) : (random_int(10, 30))),
            'color' => (string)($colors[random_int(0, 2)]),
            'text' => (string)substr($lorem_ipsum, 0, $lenText),
            'completed' => (bool)(random_int(0, 1)),
        ];
        array_push($arr, $card);
    };
    return $arr;
};
