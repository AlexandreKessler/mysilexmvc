<?php

namespace App\Association\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
    public function listAction(Request $request, Application $app)
    {
        $associations = $app['repository.association']->getAll();

        return $app['twig']->render('association.list.html.twig', array('associations' => $associations));
    }

    public function deleteAction(Request $request, Application $app)
    {
        $parameters = $request->attributes->all();
        $app['repository.association']->delete($parameters['id']);

        return $app->redirect($app['url_generator']->generate('associations.list'));
    }

    public function editAction(Request $request, Application $app)
    {
        $parameters = $request->attributes->all();
        $user = $app['repository.association']->getById($parameters['id']);

        return $app['twig']->render('associations.form.html.twig', array('association' => $user));
    }

    public function saveAction(Request $request, Application $app)
    {
        $parameters = $request->request->all();
        if ($parameters['id']) {
            $user = $app['repository.association']->update($parameters);
        } else {
            $user = $app['repository.association']->insert($parameters);
        }

        return $app->redirect($app['url_generator']->generate('associations.list'));
    }

    public function newAction(Request $request, Application $app)
    {
        return $app['twig']->render('associations.form.html.twig');
    }
}
