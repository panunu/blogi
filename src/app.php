<?php

$app = require_once __DIR__.'/bootstrap.php';

$app->get('/', function() {
    return '?';
});

use dflydev\markdown\MarkdownParser;

$app->get('/{topic}/', function($topic) use($app) {
    $parser = new MarkdownParser();

    return $app['twig']->render('view.html.twig', array(
        'story' => $parser->transform("#Hello\nPlease, have a read.\n##Moshimoshi")
    ));
});

return $app;