<?php

namespace App\Interfaces;

interface TaskRepositoryInterface
{
    public function allTasks();
    public function saveTasks($data);
}
