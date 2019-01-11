<?php

namespace App\Repositories;

use App\Models\RelationType;

class RelationTypeRepository extends Repository
{
    /**
     * Initialize objects/variables
     *
     * @param RelationType $model
     */
    public function __construct(RelationType $model)
    {
        $this->model = $model;
    }
}
