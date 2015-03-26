<?php
namespace MyModule;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class MyModuleServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['my_module.options.title'] = 'mister';
        $app['my_module.options.root_url'] = '/mymodule';

        $app->extend('twig.loader.filesystem', function ($loader, $app) {
            $loader->addPath(__DIR__.'/Resources/Templates', 'MyModule');

            return $loader;
        });

        $app['my_module.my_section_service'] = function () use ($app) {
            return new Services\MySectionService($app['my_module.options.title']);
        };

        $app->mount($app['my_module.options.root_url'], new Controllers\MySectionControllerProvider());
        // ... other mounts....
    }
}
