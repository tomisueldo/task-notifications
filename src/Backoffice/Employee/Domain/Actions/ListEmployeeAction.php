<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Lightit\Backoffice\Employee\Domain\Models\Employee;
use Spatie\QueryBuilder\QueryBuilder;

class ListEmployeeAction
{
    /**
     * @return Collection<int, Model>
     */
    public function execute(): Collection
    {
        return QueryBuilder::for(Employee::class)
            ->allowedFilters(['email'])
            ->allowedSorts(['email'])
            ->get();
    }
}
