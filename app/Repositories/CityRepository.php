<?php

namespace App\Repositories;

use App\Models\City;

class CityRepository extends Repository
{
    /**
     * Initialize objects/variables
     *
     * @param City $model
     */
    public function __construct(City $model)
    {
        $this->model = $model;
    }

    /**
     * Get all cities from country id
     *
     * @param $id
     * @param $searchKey
     * @return mixed
     */
    public function getCitiesByCountryId($id, $searchKey)
    {
        $entity = $this->model->where('country_id',$id)->orderBy('name', 'ASC');
        return empty($searchKey)
            ? $entity->get()
            : $this->getSearchedRecords($searchKey, $entity, $this->searchableColumns);
    }
}
