<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', function ($request, $response, $args) use ($container) {
        $renderer = $container->get('renderer');
        return $renderer->render($response, "index.php", $args);
    });

    $app->get('/tasks', 'TasksPageController');

    $app->get('/task', 'AddTaskPageController');
    $app->post('/task', 'AddTaskController');

    $app->get('/completetask/{id}', 'CompleteTaskController');

    $app->get('/deletetask/{id}', 'DeleteTaskController');
//    $app->delete('/tasks/{id}', 'DeleteTaskController');
};
