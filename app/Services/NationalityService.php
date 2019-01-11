<?php

namespace App\Services;

use App\Repositories\NationalityRepository;

class NationalityService
{
    /**
     * @var NationalityRepository
     */
    private $nationalityRepository;

    /**
     * To initialize class objects or variables.
     *
     * @param NationalityRepository $nationalityRepository
     */
    public function __construct(NationalityRepository $nationalityRepository)
    {
        $this->nationalityRepository = $nationalityRepository;
    }

    /**
     * To get Nationality types
     *
     * @param $searchKey
     * @return mixed
     */
    public function getNationalitiesList($searchKey)
    {
        return $this->nationalityRepository->getListWithSearch($searchKey);
    }

    /**
     * Add new function type
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function saveNationality(array $data)
    {
        $data['created_by'] = 0;
        return $this->nationalityRepository->create($data);
    }
}