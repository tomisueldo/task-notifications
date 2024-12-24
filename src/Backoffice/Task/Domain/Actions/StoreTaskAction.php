<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Lightit\Backoffice\Task\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Task\Domain\Models\Task;

class StoreTaskAction
{
    public function execute(TaskDto $taskDto): Task
    {
        return Task::create([
            'title' => $taskDto->title,
            'description' => $taskDto->description,
            'status' => $taskDto->status,
            'employee_id' => $taskDto->employee->id,
        ]);
    }
}
