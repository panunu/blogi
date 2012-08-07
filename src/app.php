<?php

$app = require_once __DIR__.'/bootstrap.php';

$app->get('/', function() use($app) {
    return render('index', $app);
});

$app->get('/{topic}/', function($topic) use($app) {
    return render($topic, $app);
});

use dflydev\markdown\MarkdownParser;

function render($filename, $app) {
    $parser  = new MarkdownParser();
    $content = @file_get_contents(__DIR__.'/../data/'.$filename.'.md'); // TODO: Security.

    return $app['twig']->render('view.html.twig', array(
        'story' => $parser->transform($content ?: "#404")
    ));
}

return $app;