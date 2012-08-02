<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function() {
    return '?';
});

$app->get('/{topic}/', function($topic) use($app) {
    return 'Hello!';
});

$app->run();
