<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\ContactTypeCreateRequest;
use App\Http\Resources\ContactTypesResource;
use App\Services\ContactTypeService;
use Illuminate\Http\Request;

class ContactTypeController extends Controller
{
    /**
     * @var $contactTypeService
     */
    private $contactTypeService;

    /**
     * To initialize objects/variables
     *
     * @param ContactTypeService $contactTypeService
     */
    public function __construct(ContactTypeService $contactTypeService)
    {
        $this->contactTypeService = $contactTypeService;
    }

    /**
     * Get Contact types.
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $searchKey = $request->get('type');
        $result = $this->contactTypeService->getContactTypesList($searchKey);

        if ($result->isEmpty()) {
            return ResponseHelper::sendNotfoundError('Contact Type');
        }

        return ContactTypesResource::collection($result)
            ->additional(['message' => config('api-response-messages.contact_type_list_success.message')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ContactTypeCreateRequest $request
     * @return ContactTypesResource
     */
    public function create(ContactTypeCreateRequest $request) : ContactTypesResource
    {
        $result = $this->contactTypeService->saveContactType($request->only(['type', 'is_default','type_of']));

        return (new ContactTypesResource($result))
            ->additional(['message' => config('api-response-messages.contact_type_add_success.message')]);
    }
}