<?php

namespace App\Services;

use App\Repositories\AddressTypeRepository;
use Illuminate\Http\Request;

class AddressTypeService
{
    /**
     * @var AddressTypeRepository
     */
    private $addressTypeRepository;

    /**
     * To initialize class objects or variables.
     *
     * @param AddressTypeRepository $addressTypeRepository
     */
    public function __construct(AddressTypeRepository $addressTypeRepository)
    {
        $this->addressTypeRepository = $addressTypeRepository;
    }

    /**
     * To get Address types
     *
     * @param $searchKey
     * @return Collection
     */
    public function getAddressTypesList($searchKey)
    {
        return $this->addressTypeRepository->getListWithSearch($searchKey);
    }

    /**
     * Add new address type
     *
     * @param array $saveArray
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function saveAddressType(array $saveArray)
    {
        $saveArray['created_by'] = 0;

        return $this->addressTypeRepository->create($saveArray);
    }
}
