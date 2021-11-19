<?php

namespace App\Factories;

use App\Controllers\AddTaskPageController;
use Psr\Container\ContainerInterface;

class AddTaskPageControllerFactory
{
    public function __invoke(ContainerInterface $container): AddTaskPageController
    {
        $renderer = $container->get('renderer');
        return new AddTaskPageController($renderer);
    }
}