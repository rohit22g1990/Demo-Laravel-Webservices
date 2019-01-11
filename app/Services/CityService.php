<?php

namespace App\Services;

use App\Repositories\CityRepository;

class CityService
{
    /**
     * @var CityRepository
     */
    private $cityRepository;

    /**
     * To initialize class objects or variables.
     *
     * @param CityRepository $cityRepository
     */
    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * Get all city list
     *
     * @param $searchKey
     * @return mixed
     */
    public function getCityList($searchKey)
    {
        return $this->cityRepository->getListWithSearch($searchKey);
    }

    /**
     * Add new city
     *
     * @param array $saveArray
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function saveCity(array $saveArray)
    {
        return $this->cityRepository->create($saveArray);
    }

    /**
     * Get Cities by country id
     *
     * @param $countryId
     * @param $searchKey
     * @return mixed
     */
    public function getCitiesByCountryId($countryId, $searchKey)
    {
        return $this->cityRepository->getCitiesByCountryId($countryId, $searchKey);
    }

}
