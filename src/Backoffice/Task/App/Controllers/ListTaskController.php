<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Task\App\Transformers\TaskTransformer;
use Lightit\Backoffice\Task\Domain\Actions\ListTaskAction;

class ListTaskController
{
    public function __invoke(ListTaskAction $listTaskAction): JsonResponse
    {
        $tasks = $listTaskAction->execute();

        return responder()
            ->success($tasks, TaskTransformer::class)
            ->respond(JsonResponse::HTTP_OK);
    }
}
