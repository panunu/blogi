<?php

$app = require_once __DIR__.'/bootstrap.php';

$app->get('/', function() use($app) {
    return render('index', $app);
});

$app->get('/{topic}/', function($topic) use($app) {
    return render($topic, $app);
});

use dflydev\markdown\MarkdownParser;

function render($slug, $app) {
    $parser  = new MarkdownParser();
    $content = @file_get_contents(__DIR__.'/../data/'. clean($slug) .'.md');
    $title   = @file_get_contents(__DIR__.'/../data/title.md');

    return $app['twig']->render('view.html.twig', array(
        'story' => $parser->transform($content ?: "#404"),
        'title' => $title
    ));
}

function clean($slug) {
    return preg_replace('~[^\\pL\d]+~u', '-', $slug);
}

return $app;