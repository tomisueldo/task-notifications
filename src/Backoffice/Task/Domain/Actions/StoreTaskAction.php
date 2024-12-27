<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Lightit\Backoffice\Employee\App\Notifications\TaskAssignmentNotification;
use Lightit\Backoffice\Task\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Task\Domain\Models\Task;

class StoreTaskAction
{
    public function execute(TaskDto $taskDto): Task
    {
        $task = Task::create([
            'title' => $taskDto->title,
            'description' => $taskDto->description,
            'status' => $taskDto->status,
            'employee_id' => $taskDto->employee->id,
        ]);

        $this->notifyAssignedEmployee($task);

        return $task;
    }

    public function notifyAssignedEmployee(Task $task): void
    {
        $task->employee->notify(new TaskAssignmentNotification($task));
    }
}
