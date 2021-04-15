<?php
include "./lorem.php";

$cardCount = 1;
$colors = [
    "#f8f9fa",
    "#F38181",
    "#FCE38A",
    "#EAFFD0",
    "#F9FFEA",
    "#8785A2",
    "#DBE2EF",
    "#D4A5A5",
    "#6EF3D6"
];

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
            'color' => (string)($colors[random_int(0, 8)]),
            'text' => (string)substr($lorem_ipsum, 0, $lenText),
            'completed' => (bool)(random_int(0, 1)),
        ];
        array_push($arr, $card);
    };
    return $arr;
};
