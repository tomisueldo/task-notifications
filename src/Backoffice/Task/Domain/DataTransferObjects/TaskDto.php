<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\DataTransferObjects;

use Lightit\Backoffice\Employee\Domain\Models\Employee;

readonly class TaskDto
{
    public function __construct(
        public string $title,
        public string $description,
        public string $status,
        public Employee $employee,
    ) {
    }
}
