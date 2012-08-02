<?php

require_once __DIR__.'/../vendor/autoload.php';

use dflydev\markdown\MarkdownParser;

$app = new Silex\Application();

$app->get('/', function() {
    return '?';
});

$app->get('/{topic}/', function($topic) use($app) {
    return 'Hello!';
});

return $app;