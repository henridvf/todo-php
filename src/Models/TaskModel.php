<?php

namespace App\Models;

use App\Entities\Task;
use PDO;

class TaskModel
{
    private PDO $dbConnection;

    public function __construct(PDO $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    /**
     * Retrieves single task object
     * @param int $id
     * @return Task
     */
    public function getTask(int $id): Task
    {
        $sql = 'SELECT '
            . '`id`, `task`, `completed` '
            . 'FROM '
            . '`tasks` '
            . 'WHERE `id`=:id;';
        $query = $this->dbConnection->prepare($sql);
        $query->setFetchMode(PDO::FETCH_CLASS, Task::class);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    /**
     * Retrieves all tasks
     * @return array
     */
    public function getTasks(): array
    {
        $sql = 'SELECT `id`, `task`, `date_created`, `completed` FROM `tasks` WHERE `deleted` = 0;';
        $query = $this->dbConnection->prepare($sql);
        $query->setFetchMode(PDO::FETCH_CLASS, Task::class);
        $query->execute();
        return $query->fetchAll();
    }

    public function storeTask(array $task): bool
    {
        $query = $this->dbConnection->prepare(
            "INSERT INTO `tasks` (`task`) VALUES (:task);");

        $query->bindValue(':task', $task['task']);

        return $query->execute();
    }

    public function completeTask(int $id): bool
    {
        $query = $this->dbConnection->prepare(
            "UPDATE `tasks` SET `completed` = 1 WHERE `id` = :id;");

        return $query->execute(['id' => $id]);
    }

    public function deleteTask(int $id): bool
    {
        $query = $this->dbConnection->prepare(
            "UPDATE `tasks` SET `deleted` = 1 WHERE `id` = :id;");

        return $query->execute(['id' => $id]);
    }
}