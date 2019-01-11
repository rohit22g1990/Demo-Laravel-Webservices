<?php

namespace App\Repositories;

use App\Models\Individual;
use App\Repositories\RepositoryInterfaces\IndividualRepositoryInterface;

class IndividualRepository implements IndividualRepositoryInterface
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

    public function index()
    {

    }

    public function create(array $saveArray)
    {
        return $this->model->create($saveArray);
    }
}