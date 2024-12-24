<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Lightit\Backoffice\Employee\Domain\Enums\TaskStatus;
use Lightit\Backoffice\Employee\Domain\Models\Employee;
use Lightit\Backoffice\Task\Domain\DataTransferObjects\TaskDto;

class UpdateTaskRequest extends FormRequest
{
    public const TITLE = 'title';

    public const DESCRIPTION = 'description';

    public const STATUS = 'status';

    public const EMPLOYEE_ID = 'employeeId';

    public function rules(): array
    {
        return [
            self::TITLE => ['required', 'string'],
            self::DESCRIPTION => ['required', 'string'],
            self::STATUS => ['required', new Enum(TaskStatus::class)],
            self::EMPLOYEE_ID => ['required', 'numeric', 'exists:employees,id'],

        ];
    }

    public function toDto(): TaskDto
    {
        return new TaskDto(
            title: $this->string(self::TITLE)->toString(),
            description: $this->string(self::DESCRIPTION)->toString(),
            status: $this->string(self::STATUS)->toString(),
            employee: Employee::findOrFail($this->integer(self::EMPLOYEE_ID)),
        );
    }
}
