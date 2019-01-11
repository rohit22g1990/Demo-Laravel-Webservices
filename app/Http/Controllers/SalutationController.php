<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\SalutationCreateRequest;
use App\Http\Resources\SalutationResource;
use App\Services\SalutationService;
use Illuminate\Http\Request;

class SalutationController extends Controller
{
    /**
     * @var $salutationService
     */
    private $salutationService;

    /**
     * To initialize objects/variables
     *
     * @param SalutationService $salutationService
     */
    public function __construct(SalutationService $salutationService)
    {
        $this->salutationService = $salutationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $searchKey = $request->get('q');
        $result = $this->salutationService->getSalutationList($searchKey);

        if ($result->isEmpty()) {
            return ResponseHelper::sendNotfoundError('Salutation');
        }

        return SalutationResource::collection($result)
            ->additional(['message' => config('api-response-messages.salutation_list_success.message')]);
    }

    /**
     * Create new Salutation.
     *
     * @param SalutationCreateRequest $request
     * @return SalutationResource
     */
    public function create(SalutationCreateRequest $request) : SalutationResource
    {
        $title = $request->get('title');
        $result = $this->salutationService->saveSalutation($title);

        return (new SalutationResource($result))
            ->additional(['message' => config('api-response-messages.salutation_add_success.message')]);
    }

}
