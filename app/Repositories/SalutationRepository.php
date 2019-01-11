<?php

namespace App\Repositories;

use App\Models\Salutation;

class SalutationRepository extends Repository
{
    /**
     * @var array
     */
    protected $searchableColumns = [
        'title'
    ];

    /**
     * Initialize objects/variables
     *
     * @param Salutation $model
     */
    public function __construct(Salutation $model)
    {
        $this->model = $model;
    }
}
