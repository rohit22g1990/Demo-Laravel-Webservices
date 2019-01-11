<?php

namespace App\Services;

use App\Repositories\ContactTypeRepository;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;

class ContactTypeService
{
    /**
     * @var ContactTypeRepository
     */
    private $contactTypeRepository;

    /**
     * @var array
     */
    protected $searchableColumns = [
        'type'
    ];

    /**
     * To initialize class objects or variables.
     *
     * @param ContactTypeRepository $contactTypeRepository
     */
    public function __construct(ContactTypeRepository $contactTypeRepository)
    {
        $this->contactTypeRepository = $contactTypeRepository;
    }

    /**
     * get contact types
     *
     * @param $searchKey
     * @return mixed
     */
    public function getContactTypesList($searchKey)
    {
        return $this->contactTypeRepository->getListWithSearch($searchKey);
    }

    /**
     * Add new contact type
     *
     * @param array $saveArray
     * @return mixed
     */
    public function saveContactType(array $saveArray)
    {
        $saveArray['created_by'] = 0;

        return $this->contactTypeRepository->create($saveArray);
    }
}
