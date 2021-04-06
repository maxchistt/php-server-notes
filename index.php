<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

$user = (string)($_POST["user"]);
$target = $_POST["target"];
$data = json_encode($_POST["data"]);
$filename = $user;
$filepath = file_path($filename);

include "./generate.php";

if (!$_POST) {
    $met = json_encode($_SERVER["REQUEST_METHOD"]);
    $req = json_encode($_REQUEST);
    $fileslist = '[Server] ' . json_encode(scandir(file_path("")));
    include "./std_resp.php";
    echo makeHtmlResp($met, $req, $fileslist);
} else if ($target == "getData") {
    echo (readFileContent($filepath))
        ? (readFileContent($filepath))
        : (writeFileContent($filepath,  json_encode(generate())) ? readFileContent($filepath) : '[Server] Ошибка при генерации данных');
} else if ($target == "setData") {
    echo ($data)
        ? (writeFileContent($filepath, $data) ? '[Server] Данные в файл успешно занесены' : '[Server] Ошибка при записи в файл')
        : ("[Server] Пустой набор данных");
} else {
    echo "[Server] Неверный запрос";
}

function readFileContent($filepath)
{
    if (file_exists($filepath)) return file_get_contents($filepath);
}

function addFileContent($filepath, $text)
{
    return file_put_contents($filepath, $text, FILE_APPEND);
}

function writeFileContent($filepath, $text)
{
    return file_put_contents($filepath, $text);
}

function file_path($filename)
{
    return "./data/" . "$filename";
}
