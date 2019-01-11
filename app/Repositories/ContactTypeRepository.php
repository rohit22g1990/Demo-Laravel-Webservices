<?php

namespace App\Repositories;

use App\Models\ContactType;

class ContactTypeRepository extends Repository
{
    /**
     * Initialize objects/variables
     *
     * @param ContactType $model
     */
    public function __construct(ContactType $model)
    {
        $this->model = $model;
    }
}
