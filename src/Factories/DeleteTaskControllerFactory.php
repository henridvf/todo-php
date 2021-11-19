<?php

namespace App\Factories;

use App\Controllers\DeleteTaskController;
use Psr\Container\ContainerInterface;

class DeleteTaskControllerFactory
{
    public function __invoke(ContainerInterface $container): DeleteTaskController
    {
        $taskModel = $container->get('TaskModel');
        return new DeleteTaskController($taskModel);
    }
}