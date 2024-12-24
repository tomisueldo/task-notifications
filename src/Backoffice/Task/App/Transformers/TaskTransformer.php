<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Task\Domain\Models\Task;

class TaskTransformer extends Transformer
{
    /**
     * @return array{id: int, title: string, description: string, status: string, employee_id: int}
     */
    public function transform(Task $task): array
    {
        return [
            'id' => $task->id,
            'title' => $task->title,
            'description' => $task->description,
            'status' => $task->status,
            'employee_id' => $task->employee_id,
        ];
    }
}
