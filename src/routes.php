<?php

$app->get('/users/list', 'App\Users\Controller\IndexController::listAction')->bind('users.list');
$app->get('/computers/list', 'App\Computers\Controller\IndexController::listAction')->bind('computers.list');
$app->get('/association/list', 'App\Association\Controller\IndexController::listAction')->bind('association.list');

$app->get('/users/edit/{id}', 'App\Users\Controller\IndexController::editAction')->bind('users.edit');
$app->get('/computers/edit/{id}', 'App\Computers\Controller\IndexController::editAction')->bind('computers.edit');
$app->get('/association/edit/{id}', 'App\Association\Controller\IndexController::editAction')->bind('association.edit');

$app->get('/users/new', 'App\Users\Controller\IndexController::newAction')->bind('users.new');
$app->get('/computers/new', 'App\Computers\Controller\IndexController::newAction')->bind('computers.new');
$app->get('/association/new', 'App\Association\Controller\IndexController::newAction')->bind('association.new');

$app->post('/users/delete/{id}', 'App\Users\Controller\IndexController::deleteAction')->bind('users.delete');
$app->post('/computers/delete/{id}', 'App\Computers\Controller\IndexController::deleteAction')->bind('computers.delete');
$app->post('/association/delete/{id}', 'App\Association\Controller\IndexController::deleteAction')->bind('association.delete');

$app->post('/users/save', 'App\Users\Controller\IndexController::saveAction')->bind('users.save');
$app->post('/computers/save', 'App\Computers\Controller\IndexController::saveAction')->bind('computers.save');
$app->post('/association/save', 'App\Association\Controller\IndexController::saveAction')->bind('association.save');
