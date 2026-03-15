<?php

namespace App\Contracts;

use App\Models\Task;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TaskServiceInterface
{
    public function listTasks(int $perPage = 10): LengthAwarePaginator;

    public function createTask(array $data): Task;

    public function updateTask(Task $task, array $data): Task;

    public function deleteTask(Task $task): void;
}
