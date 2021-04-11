<?php
function clearAll()
{
    $del = 0;
    //$three_days_ago = strtotime("-3 days");
    $str = '';
    $directory = './data/';
    $scanned_directory = array_diff(scandir($directory), array('..', '.', ".gitkeep"));
    foreach ($scanned_directory as $value) {
        //$filetime = filemtime("$directory" . "$value");команда для обновления с гитхаба
        //if ($filetime < $three_days_ago) {};
        $str .= (($del++ + 1) . ". $value - " . (unlink("$directory" . "$value") ? "del" : "fail") . " <br>" . "\r\n");
    }
    if (!$str) $str = "none";
    return "
    <br/>
    <div class='container mt-3' style='white-space: normal;word-wrap: break-word;'>
    
    Deleted files:
    <br/><hr/>
    $str
    <br/><hr/>
    </div>
    ";
}
