<?php

namespace App\Repositories;

use App\Models\FunctionType;

class FunctionTypeRepository extends Repository
{
    /**
     * Initialize objects/variables
     *
     * @param FunctionType $model
     */
    public function __construct(FunctionType $model)
    {
        $this->model = $model;
    }
}
