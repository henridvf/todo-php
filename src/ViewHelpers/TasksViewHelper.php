<?php

namespace App\ViewHelpers;

use App\Entities\Task;

class TasksViewHelper
{
    private static function displayActionButton(Task $task): string
    {
        if ($task->getCompleted() == 1) {
            $str = '<a href="/deletetask/' . $task->getId() .'">Delete</a>';
        } else {
            $str = '<a href="/completetask/' . $task->getId() .'">Complete</a>';
        }
        return $str;
    }

    public static function displayTasks(array $tasks): string
    {
        $htmlStr = '<table><th style="text-align: left">Task</th><th style="text-align: left">Created</th>';
        $htmlStr .= '<th>Completed</th><th/>';
        foreach ($tasks as $task) {
            $htmlStr .= '<tr><td>' . $task->getName() . '</td><td>' . $task->getDateCreated() . '</td>';
            $htmlStr .= '<td>' . $task->getCompleted() . '</td>';
            $htmlStr .= '<td>' . self::displayActionButton($task) . '</td></tr>';
        }
        $htmlStr .= '</table>';
        return $htmlStr;
    }
}