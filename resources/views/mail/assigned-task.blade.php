<x-mail::message>
# Task Assigned

You have been assigned a new task: **{{ $title }}**.

**Assigned on:** {{ $date }}

---

## Task Description

{{ $description }}

---

<x-mail::button :url="'#'">
    View Task
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
