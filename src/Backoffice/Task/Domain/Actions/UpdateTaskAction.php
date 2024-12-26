<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Lightit\Backoffice\Employee\App\Notifications\TaskAssignmentNotification;
use Lightit\Backoffice\Task\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Task\Domain\Models\Task;

class UpdateTaskAction
{
    public function execute(Task $task, TaskDto $taskDto): Task
    {
        $previousEmployeeId = $task->employee_id;

        $task->fill([
            'title' => $taskDto->title,
            'description' => $taskDto->description,
            'status' => $taskDto->status,
            'employee_id' => $taskDto->employee->id,
        ]);

        $task->save();

        $this->notifyNewEmployee($task, $previousEmployeeId);

        return $task;
    }

    public function notifyNewEmployee(Task $updatedTask, int $previousEmployeeId): void
    {
        if ($previousEmployeeId !== $updatedTask->employee_id) {
            $updatedTask->employee->notify(new TaskAssignmentNotification($updatedTask));
        }
    }
}
