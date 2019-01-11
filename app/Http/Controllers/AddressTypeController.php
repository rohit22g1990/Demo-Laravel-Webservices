<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Services\AddressTypeService;
use App\Http\Resources\AddressTypesResource;
use App\Http\Requests\AddressTypeCreateRequest;
use Illuminate\Http\Request;

class AddressTypeController extends Controller
{
    /**
     * @var $addressTypeService
     */
    private $addressTypeService;

    /**
     * AddressTypeController constructor.
     * @param AddressTypeService $addressTypeService
     */
    public function __construct(AddressTypeService $addressTypeService)
    {
        $this->addressTypeService = $addressTypeService;
    }

    /**
     * Get address types
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $result = $this->addressTypeService->getAddressTypesList($request->get('q'));

        if ($result->isEmpty()) {
            return ResponseHelper::sendNotfoundError('Address Type');
        }

        return AddressTypesResource::collection($result)
            ->additional(['message' => config('api-response-messages.address_type_list_success.message')]);
    }

    /**
     * Save address type
     *
     * @param AddressTypeCreateRequest $request
     * @return mixed
     */
    public function create(AddressTypeCreateRequest $request)
    {
        $result = $this->addressTypeService->saveAddressType($request->only(['type', 'is_default']));

        return (new AddressTypesResource($result))
            ->additional(['message' => config('api-response-messages.address_type_add_success.message')]);
    }
}
