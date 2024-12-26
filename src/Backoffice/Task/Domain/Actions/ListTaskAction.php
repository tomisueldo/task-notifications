<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Lightit\Backoffice\Task\Domain\Models\Task;
use Spatie\QueryBuilder\QueryBuilder;

class ListTaskAction
{
    /**
     * @return Collection<int, Model>
     */
    public function execute(): Collection
    {
        return QueryBuilder::for(Task::class)
            ->allowedFilters(['title'])
            ->allowedSorts('title')
            ->get();
    }
}
