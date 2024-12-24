<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\Domain\Actions;

use Lightit\Backoffice\Employee\Domain\DataTransferObjects\EmployeeDto;
use Lightit\Backoffice\Employee\Domain\Models\Employee;

class StoreEmployeeAction
{
    public function execute(EmployeeDto $employeeDto): Employee
    {
        return Employee::create([
            'name' => $employeeDto->name,
            'email' => $employeeDto->email,
        ]);
    }
}
