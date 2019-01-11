<?php

namespace App\Services;

use App\Repositories\CountryRepository;

class CountryService
{
    /**
     * @var CountryRepository
     */
    private $countryRepository;

    /**
     * To initialize class objects or variables.
     *
     * @param CountryRepository $countryRepository
     */
    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * To get Country list
     *
     * @param $searchKey
     * @return mixed
     */
    public function getCountryList($searchKey)
    {
        return $this->countryRepository->getCountries($searchKey);
    }

    /**
     * Add new country
     *
     * @param $name
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function saveCountry($name)
    {
        return $this->countryRepository->create(['name' => $name]);
    }

}
