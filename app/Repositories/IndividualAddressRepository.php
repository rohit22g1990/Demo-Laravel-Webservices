<?php

namespace App\Repositories;

use App\Models\IndividualAddress;

class IndividualAddressRepository extends Repository
{
    /**
     * Initialize objects/variables
     *
     * @param IndividualAddress $model
     */
    public function __construct(IndividualAddress $model)
    {
        $this->model = $model;
    }
}
