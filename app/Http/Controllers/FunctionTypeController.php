<?php

namespace App\Http\Controllers;

use App\Services\FunctionTypeService;
use App\Http\Requests\FunctionTypeCreateRequest;
use App\Http\Resources\FunctionTypesResource;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;

class FunctionTypeController extends Controller
{
    /**
     * @var $functionTypeService
     */
    private $functionTypeService;

    /**
     * FunctionTypeController constructor.
     *type
     * @param FunctionTypeService $functionTypeService
     */
    public function __construct(FunctionTypeService $functionTypeService)
    {
        $this->functionTypeService = $functionTypeService;
    }

    /**
     * Get function types.
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $searchKey = $request->get('q');
        $result = $this->functionTypeService->getFunctionTypesList($searchKey);

        if ($result->isEmpty()) {
            return ResponseHelper::sendNotfoundError('Function Type');
        }

        return FunctionTypesResource::collection($result)
            ->additional(['message' => config('api-response-messages.function_type_list_success.message')]);
    }

    /**
     * Creating a new function type.
     *
     * @param FunctionTypeCreateRequest $request
     * @return FunctionTypesResource
     */
    public function create(FunctionTypeCreateRequest $request) : FunctionTypesResource
    {
        $result = $this->functionTypeService->saveFunctionType($request->only(['type']));

        return (new FunctionTypesResource($result))
            ->additional(['message' => config('api-response-messages.function_type_add_success.message')]);
    }

}
