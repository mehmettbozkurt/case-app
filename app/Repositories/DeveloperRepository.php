<?php

namespace App\Repositories;

use App\Interfaces\DeveloperRepositoryInterface;
use App\Models\Developer;

class DeveloperRepository implements DeveloperRepositoryInterface
{
    /**
     * @param $column
     * @param $order
     * @return mixed
     */
    public function allDeveloper($column, $order)
    {
        return Developer::orderBy($column, $order)->get();
    }
}
