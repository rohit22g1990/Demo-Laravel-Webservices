<?php

namespace App\Repositories;

use App\Models\AccountManager;

class AccountManagerRepository extends Repository
{
    /**
     * Initialize objects/variables
     *
     * @param AccountManager $model
     */
    public function __construct(AccountManager $model)
    {
        $this->model = $model;
    }
}
