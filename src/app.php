<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\DoctrineServiceProvider;

$app = new Application();

// Ajout des fournisseurs de services
$app->register(new DoctrineServiceProvider());
$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

//Ajout des repository
$app['repository.user'] = function ($app) {
    return new App\Users\Repository\UserRepository($app['db']);

};
$app['repository.computer'] = function ($app) {
    return new App\Computers\Repository\ComputerRepository($app['db']);
};
$app['repository.association'] = function ($app) {
    return new App\Association\Repository\AssociationRepository($app['db']);    
};
