<?php

namespace App\Repositories;

use App\Models\Nationality;

class NationalityRepository extends Repository
{
    /**
     * Initialize objects/variables
     *
     * @param Nationality $model
     */
    public function __construct(Nationality $model)
    {
        $this->model = $model;
    }
}
