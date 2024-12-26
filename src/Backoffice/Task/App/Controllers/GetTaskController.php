<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Task\App\Transformers\TaskTransformer;
use Lightit\Backoffice\Task\Domain\Actions\GetTaskAction;

class GetTaskController
{
    public function __invoke(int $taskId, GetTaskAction $getTaskAction): JsonResponse
    {
        $task = $getTaskAction->execute($taskId);

        return responder()
            ->success($task, TaskTransformer::class)
            ->respond();
    }
}
