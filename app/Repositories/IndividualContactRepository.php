<?php

namespace App\Repositories;

use App\Models\IndividualContact;

class IndividualContactRepository extends Repository
{
    /**
     * Initialize objects/variables
     *
     * @param IndividualContact $model
     */
    public function __construct(IndividualContact $model)
    {
        $this->model = $model;
    }
}