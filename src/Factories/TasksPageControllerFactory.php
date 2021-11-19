<?php

namespace App\Factories;

use App\Controllers\TasksPageController;
use Psr\Container\ContainerInterface;

class TasksPageControllerFactory
{
    public function __invoke(ContainerInterface $container): TasksPageController
    {
        $renderer = $container->get('renderer');
        $taskModel = $container->get('TaskModel');
        return new TasksPageController($renderer, $taskModel);
    }
}