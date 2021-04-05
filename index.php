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
    $fileslist = json_encode(scandir(file_path("")));
    echo "
        <div class='container p-3' style='paddig:3em;margin:2em;white-space: normal;word-wrap: break-word;'>
        [ if (!\$_POST) ]
        <br/><br/><hr/>
        REQUEST_METHOD:
        <br/>
        $met
        <br/>
        REQUEST:
        <br/>
        $req
        <br/><hr/>
        Files on server: 
        <br/>
        $fileslist
        <br/><hr/>
        </div>
        ";
} else if ($target == "getData") {
    echo (readFileContent($filepath))
        ? (readFileContent($filepath))
        : (writeFileContent($filepath,  json_encode(generate())) ? readFileContent($filepath) : 'Ошибка при генерации данных');
} else if ($target == "setData") {
    echo ($data)
        ? (writeFileContent($filepath, $data) ? 'Данные в файл успешно занесены' : 'Ошибка при записи в файл')
        : ("Пустой набор слов");
} else {
    echo "неверный запрос";
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
