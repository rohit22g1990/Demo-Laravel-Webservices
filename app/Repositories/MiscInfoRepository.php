<?php

namespace App\Repositories;

use App\Models\IndividualMiscInfo;

class MiscInfoRepository extends Repository
{
    /**
     * Initialize objects/variables
     *
     * @param IndividualMiscInfo $model
     */
    public function __construct(IndividualMiscInfo $model)
    {
        $this->model = $model;
    }
}
