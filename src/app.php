<?php

$app = require_once __DIR__.'/bootstrap.php';

use dflydev\markdown\MarkdownParser;

$app->get('/', function() {
    return '?';
});

$app->get('/{topic}/', function($topic) use($app) {
    $parser = new MarkdownParser();

    return $parser->transform("#Hello!");
});

return $app;