<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//Request::setTrustedProxies(array('127.0.0.1'));
Request::enableHttpMethodParameterOverride();

$app->get('/', function () use ($app) {

    return new Response($app['twig']->render('index.html.twig', []), 200);
});

$app->error(function (\Exception $e, Request $request, $code) use ($app) {

    if ($app['debug']) {
        return;
    }
    $errormsg = $e->getMessage();

    /*
     * IF USING A SESSION:
     */
    // if (!empty($errormsg)) {
    //     $app['session']->getFlashBag()->add(
    //         'notifications',
    //         [
    //             'class' => 'danger',
    //             'message' => $errormsg,
    //         ]
    //     );
    // }

    return new Response($app['twig']->render('errors/default.html.twig', []), $code);
});
