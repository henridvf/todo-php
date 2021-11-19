<?php

namespace App\Controllers;

use App\Models\TaskModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class TasksPageController
{
    private PhpRenderer $renderer;
    private TaskModel $taskModel;

    public function __construct(PhpRenderer $renderer, TaskModel $taskModel)
    {
        $this->renderer = $renderer;
        $this->taskModel = $taskModel;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $tasks = $this->taskModel->getTasks();

        return $this->renderer->render($response, 'viewtasks.phtml', ['tasks' => $tasks]);
    }
}