<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Illuminate\Database\Eloquent\Model;
use Lightit\Backoffice\Task\Domain\Models\Task;
use Spatie\QueryBuilder\QueryBuilder;

class GetTaskAction
{
    public function execute(): Model|null
    {
        return QueryBuilder::for(Task::class)
            ->first();
    }
}
