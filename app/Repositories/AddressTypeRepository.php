<?php

namespace App\Repositories;

use App\Models\AddressType;

class AddressTypeRepository extends Repository
{
    /**
     * Initialize objects/variables
     *
     * @param AddressType $model
     */
    public function __construct(AddressType $model)
    {
        $this->model = $model;
    }
}
