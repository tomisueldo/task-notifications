<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Lightit\Backoffice\Task\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Task\Domain\Models\Task;
use Throwable;

class UpdateTaskAction
{
    /**
     * @throws Throwable
     */
    public function execute(Task $task, TaskDto $taskDto): Task
    {
        $task->fill([
            'title' => $taskDto->title,
            'description' => $taskDto->description,
            'status' => $taskDto->status,
            'employee_id' => $taskDto->employee->id,
        ]);

        $task->saveOrFail();

        return $task;
    }
}
