<?php
$user = getallheaders()["user"];
$filename = $user || "default";
$filepath = file_path($filename);

include "./generate.php";

if ($_GET) {
    echo (readFileContent($filepath))
        ? (readFileContent($filepath))
        : (writeFileContent($filepath, generate()) ? readFileContent($filepath) : 'Ошибка при генерации данных');
} else if ($_POST) {
    echo ($_POST)
        ? (writeFileContent($filepath, $_POST) ? 'Данные в файл успешно занесены' : 'Ошибка при записи в файл')
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

function str_replace_once($search, $replace, $text)
{
    $pos = strpos($text, $search);
    return $pos !== false ? substr_replace($text, $replace, $pos, strlen($search)) : $text;
}
