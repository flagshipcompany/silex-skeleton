<?php
namespace MyModule\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Silex\Api\ControllerProviderInterface;
use Silex\Application;
use Silex\ControllerCollection;

class MySectionControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controller = $app['controllers_factory'];

        $this->makeMiddleware($controller, $app);
        $this->makeRoutes($controller, $app);

        return $controller;
    }

    protected function makeMiddleware(ControllerCollection $controller, Application $app)
    {
        $controller->before(function (Request $request, Application $app) {
            //E.G Make security....
            //[...]
            //$app->abort(403);
        });
    }
    protected function makeRoutes(ControllerCollection $controller, Application $app)
    {
        $controller->get('/{name}', function (Request $request, $name) use ($app) {

            $modifiedName = $app['my_module.my_section_service']->makeTitle($name);

            return $app['twig']->render('@MyModule/MySectionPage.html.twig', ['name' => $modifiedName]);

        });
    }
}
