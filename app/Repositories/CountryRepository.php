<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository extends Repository
{
    /**
     * @var array
     */
    protected $searchableColumns = [
        'name'
    ];

    /**
     * Initialize objects/variables
     *
     * @param Country $model
     */
    public function __construct(Country $model)
    {
        $this->model = $model;
    }

    /**
     * Get or Search the countries
     *
     * @param $searchKey
     * @return mixed
     */
    public function getCountries($searchKey)
    {
        $entity = $this->model->orderBy('name', 'ASC');
        if (!empty($searchKey)) {
            $result = $this->getSearchedRecords($searchKey, $entity, $this->searchableColumns);
        } else {
            $result = $entity->get();
        }

        return $result;
    }
}
