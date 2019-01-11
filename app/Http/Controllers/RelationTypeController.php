<?php

namespace App\Http\Controllers;

use App\Services\RelationTypeService;
use App\Http\Requests\RelationTypeCreateRequest;
use App\Http\Resources\RelationTypesResource;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;

class RelationTypeController extends Controller
{
    /**
     * @var $relationTypeService
     */
    private $relationTypeService;

    /**
     * RelationTypeController constructor.
     * @param RelationTypeService $relationTypeService
     */
    public function __construct(RelationTypeService $relationTypeService)
    {
        $this->relationTypeService = $relationTypeService;
    }

    /**
     * Get all relation types.
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $searchKey = $request->get('q');
        $result = $this->relationTypeService->getRelationTypesList($searchKey);

        if ($result->isEmpty()) {
            return ResponseHelper::sendNotfoundError('Relation Type');
        }

        return RelationTypesResource::collection($result)
            ->additional(['message' => config('api-response-messages.relation_type_list_success.message')]);
    }

    /**
     * Creating a new relation type.
     *
     * @param RelationTypeCreateRequest $request
     * @return RelationTypesResource
     */
    public function create(RelationTypeCreateRequest $request) : RelationTypesResource
    {
        $result = $this->relationTypeService->saveRelationType($request->only(['type']));

        return (new RelationTypesResource($result))
            ->additional(['message' => config('api-response-messages.relation_type_add_success.message')]);
    }

}