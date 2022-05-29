<?php

namespace App\Http\Controllers;

use App\Interfaces\DeveloperRepositoryInterface;
use App\Interfaces\TaskRepositoryInterface;

class TodoListController extends Controller
{
    public $developerRepository;
    public $taskRepository;

    public function __construct(DeveloperRepositoryInterface $developerRepository , TaskRepositoryInterface $taskRepository)
    {
        $this->developerRepository = $developerRepository;
        $this->taskRepository = $taskRepository;
    }

    public function todoList()
    {

        $developers = $this->developerRepository->allDeveloper('difficulty', 'asc');
        $tasks = $this->taskRepository->allTasks();

        $totalWorkingHours= 45;

        $weeklyPlans = [];
        $taskArray = [];

        // loop through all developers
        foreach($developers as $developer){
            // setting up week and task array
            $week = 1;
            $weeklyPlans[$developer->name][$week] = [
                'totalWorkingHour' => 0,
            ];

            // loop through all tasks
            foreach($tasks as $task){
                // check if developer is assigned to this task
                if($task->level <= $developer->difficulty && ($weeklyPlans[$developer->name][$week]['totalWorkingHour'] + $task->estimated_duration) <= $totalWorkingHours){
                    // checking if task is already assigned to another developer
                    if(in_array($task->id, $taskArray)){
                        continue;
                    }

                    // assign task to developer
                    $weeklyPlans[$developer->name][$week][] = [$task->name, $task->estimated_duration];
                    $weeklyPlans[$developer->name][$week]['totalWorkingHour'] += $task->estimated_duration;
                    $taskArray[] = $task->id;

                    // check if developer is done with this week
                } else if($task->level <= $developer->difficulty && ($weeklyPlans[$developer->name][$week]['totalWorkingHour'] + $task->estimated_duration) >= $totalWorkingHours){
                    // checking if task is already assigned to another developer
                    if(in_array($task->id, $taskArray)){
                        continue;
                    }

                    // assign task to developer and start new week
                    $week++;
                    $weeklyPlans[$developer->name][$week]['totalWorkingHour'] = 0;
                    $weeklyPlans[$developer->name][$week][] = [$task->name, $task->estimated_duration];
                    $weeklyPlans[$developer->name][$week]['totalWorkingHour'] += $task->estimated_duration;
                    $taskArray[] = $task->id;;
                }
            }
        }


        return view('todo-list', [
            'todoLists' => $weeklyPlans,
            'deadline' => $week
        ]);
    }
}
