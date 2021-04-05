<?php
function makeHtmlResp($met, $req, $fileslist)
{
    return "
    <div style='paddig:3em;margin:2em;white-space: normal;word-wrap: break-word;'>
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
};
