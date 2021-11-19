<?php

namespace App\Factories;

use App\Controllers\CompleteTaskController;
use Psr\Container\ContainerInterface;

class CompleteTaskControllerFactory
{
    public function __invoke(ContainerInterface $container): CompleteTaskController
    {
        $taskModel = $container->get('TaskModel');
        return new CompleteTaskController($taskModel);
    }
}