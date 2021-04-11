<?php
function makeHtmlResp($met, $req, $fileslist)
{
    return '
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    '."
    <br/>
    <div class='container mt-3' style='white-space: normal;word-wrap: break-word;'>
    
    <a href='?clear-all' class='btn btn-info'>Delete all</a>
    <a href='/' class='btn btn-info'>Back</a>
    </div>
    <div class='container' style='white-space: normal;word-wrap: break-word;'>
    <hr/>
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
};
