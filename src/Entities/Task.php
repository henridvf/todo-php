<?php

namespace App\Entities;

class Task
{
    private int $id;
    private string $task;
    private string $date_created;
    private int $completed;


    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->task;
    }

    public function getCompleted(): int
    {
        return $this->completed;
    }

    public function getDateCreated(): string
    {
        return $this->date_created;
    }
}