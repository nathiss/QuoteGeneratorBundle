<?php

if(!is_file($file = __DIR__.'/../vendor/autoload.php'))
    throw new \RuntimeException('Could not find autoload.php in vendor/. Did you run "composer install --dev"?');

$loader = require_once $file;
