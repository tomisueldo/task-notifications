<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Employee\App\Transformers\EmployeeTransformer;
use Lightit\Backoffice\Employee\Domain\Actions\ListEmployeeAction;

class ListEmployeeController
{
    public function __invoke(ListEmployeeAction $listEmployeeAction): JsonResponse
    {
        $employees = $listEmployeeAction->execute();

        return responder()
            ->success($employees, EmployeeTransformer::class)
            ->respond();
    }
}
