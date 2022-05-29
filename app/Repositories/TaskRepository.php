<?php

namespace App\Repositories;
use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @param $data
     * @return void
     */
    public function saveTasks($data)
    {
        DB::table('tasks')->insert($data);
    }
    /**
     * @param $data
     * @return void
     */
    public function allTasks()
    {
        return Task::get();
    }



}

