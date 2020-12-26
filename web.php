<?php

// This is it!

require __DIR__ . "/vendor/autoload.php";

$url = $_GET["url"];

if(!$url)
{
  die(header("Location: /"));
}

$headers = array('User-agent' => 'RockyProxy (https://github.com/RiversideRocks/RockyProxy)');
$content = Requests::get($url, $headers);

echo $content->body;
