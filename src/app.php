<?php

$app = require_once __DIR__.'/bootstrap.php';

$app->get('/', function() {
    return '?';
});

use dflydev\markdown\MarkdownParser;

$app->get('/{topic}/', function($topic) use($app) {
    $parser  = new MarkdownParser();
    $content = @file_get_contents(__DIR__.'/../data/'. $topic . '.md'); // TODO: Security.

    return $app['twig']->render('view.html.twig', array(
        'story' => $parser->transform($content ?: "#404")
    ));
});

return $app;