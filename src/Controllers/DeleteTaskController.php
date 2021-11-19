<?php

namespace App\Controllers;

use App\Models\TaskModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class DeleteTaskController
{
    private TaskModel $taskModel;

    public function __construct(TaskModel $taskModel)
    {
        $this->taskModel = $taskModel;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $result = $this->taskModel->deleteTask((int)$args['id']);

        if (!$result) {
            $statusCode = 400;
        } else {
            $statusCode = 200;
        }
        return $response->withHeader('Location', '../tasks')->withStatus($statusCode);
    }
}