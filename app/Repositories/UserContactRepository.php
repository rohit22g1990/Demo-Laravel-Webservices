<?php

namespace App\Repositories;

use App\Models\UserContacts;

class UserContactRepository extends Repository
{
    /**
     * Initialize objects/variables
     *
     * @param UserContacts $model
     */
    public function __construct(UserContacts $model)
    {
        $this->model = $model;
    }
}
