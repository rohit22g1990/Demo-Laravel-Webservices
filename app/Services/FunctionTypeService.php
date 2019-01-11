<?php

namespace App\Services;

use App\Repositories\FunctionTypeRepository;

class FunctionTypeService
{
    /**
     * @var FunctionTypeRepository
     */
    private $functionTypeRepository;

    /**
     * To initialize class objects or variables.
     *
     * @param FunctionTypeRepository $functionTypeRepository
     */
    public function __construct(FunctionTypeRepository $functionTypeRepository)
    {
        $this->functionTypeRepository = $functionTypeRepository;
    }

    /**
     * To get Function types
     *
     * @param $searchKey
     * @return mixed
     */
    public function getFunctionTypesList($searchKey)
    {
        return $this->functionTypeRepository->getListWithSearch($searchKey);
    }

    /**
     * Add new function type
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function saveFunctionType(array $data)
    {
        $data['created_by'] = 0;
        return $this->functionTypeRepository->create($data);
    }
}