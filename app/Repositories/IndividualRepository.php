<?php

namespace App\Repositories;

use App\Models\Individual;

class IndividualRepository extends Repository
{
    /**
     * @var model
     */
    public $model;

    /**
     * Initialize objects/variables
     *
     * @param Individual $model
     */
    public function __construct(Individual $model)
    {
        $this->model = $model;
    }
}