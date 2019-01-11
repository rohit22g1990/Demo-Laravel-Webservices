<?php

namespace App\Services;

use App\Repositories\RelationTypeRepository;

class RelationTypeService
{
    /**
     * @var RelationTypeRepository
     */
    private $relationTypeRepository;

    /**
     * To initialize class objects or variables.
     *
     * @param RelationTypeRepository $relationTypeRepository
     */
    public function __construct(RelationTypeRepository $relationTypeRepository)
    {
        $this->relationTypeRepository = $relationTypeRepository;
    }

    /**
     * To get Relation types
     *
     * @param $searchKey
     * @return mixed
     */
    public function getRelationTypesList($searchKey)
    {
        return $this->relationTypeRepository->getListWithSearch($searchKey);
    }

    /**
     * Add new relation type
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function saveRelationType(array $data)
    {
        $data['created_by'] = 0;
        return $this->relationTypeRepository->create($data);
    }

}
