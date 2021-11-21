<?php

namespace App\ViewHelpers;

use App\Entities\Task;

class TasksViewHelper
{
    private static function displayActionButtons(Task $task): string
    {
        if ($task->getCompleted() == 1) {
            $str = '<td><input class="form-check-input position-relative top-50 start-50 translate-middle-x" type="checkbox" value="" disabled checked></td>';
            $str .= '<td><a href="/deletetask/' . $task->getId() .'" class="btn btn-sm btn-outline-danger">Delete</a></td>';
        } else {
            $str = '<td><input class="form-check-input position-relative top-50 start-50 translate-middle-x" type="checkbox" value="" disabled></td>';
            $str .= '<td><a href="/completetask/' . $task->getId() .'" class="btn btn-sm btn-outline-success">Complete</a></td>';
        }
        return $str;
    }

    public static function displayTasks(array $tasks): string
    {
        $htmlStr = '<table class="table table-sm table-bordered shadow-sm"><thead class="table-light"><th scope="col">Task</th><th scope="col">Created</th>';
        $htmlStr .= '<th class="text-center">Completed</th><th/></thead>';
        foreach ($tasks as $task) {
            $htmlStr .= '<tr scope="row"><td>' . $task->getName() . '</td><td>' . $task->getDateCreated() . '</td>';
            $htmlStr .= self::displayActionButtons($task) . '</tr>';
        }
        $htmlStr .= '</table>';
        return $htmlStr;
    }
}