<?php

namespace App\Controllers;

use App\Models\TaskModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AddTaskController
{
    private TaskModel $taskModel;

    public function __construct(TaskModel $taskModel)
    {
        $this->taskModel = $taskModel;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $taskData = $request->getParsedBody();

        $result = $this->taskModel->storeTask($taskData);

        if (!$result) {
            $statusCode = 400;
        } else {
            $statusCode = 200;
        }
        return $response->withStatus($statusCode)->withHeader('Location', './tasks');
    }
}