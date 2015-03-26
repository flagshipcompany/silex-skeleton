<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\RoutingServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Provider\LocaleServiceProvider;
use Silex\Provider\SessionServiceProvider;

$app = new Application();
$app->register(new RoutingServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app->register(new TranslationServiceProvider());
$app->register(new LocaleServiceProvider());
$app->register(new FormServiceProvider());
$app->register(new SessionServiceProvider());

$app->register(new Flagship\Components\Helpers\DbProvider());
$app->register(new Flagship\Components\Helpers\TwigProvider());
$app->register(new Flagship\Components\Helpers\EncoderProvider());

$app['twig.form.templates'] = array('bootstrap_3_layout.html.twig');

$app->register(new MyModule\MyModuleServiceProvider());
$app['my_module.options.title'] = 'Master Commander'; // by default the option is in the provider.

return $app;
