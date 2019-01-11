<?php

namespace App\Http\Controllers;

use App\Services\NationalityService;
use App\Http\Requests\NationalityCreateRequest;
use App\Http\Resources\NationalityResource;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;

class NationalityController extends Controller
{
    /**
     * @var $nationalityService
     */
    private $nationalityService;

    /**
     * NationalityController constructor.
     *
     * @param NationalityService $nationalityService
     */
    public function __construct(NationalityService $nationalityService)
    {
        $this->nationalityService = $nationalityService;
    }

    /**
     * Get list of Nationalities
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $searchKey = $request->get('q');
        $result = $this->nationalityService->getNationalitiesList($searchKey);

        if ($result->isEmpty()) {
            return ResponseHelper::sendNotfoundError('Nationality');
        }

        return NationalityResource::collection($result)
            ->additional(['message' => config('api-response-messages.function_type_list_success.message')]);
    }

    /**
     * Creating a new nationality type.
     *
     * @param NationalityCreateRequest $request
     * @return NationalityResource
     */
    public function create(NationalityCreateRequest $request) : NationalityResource
    {
        $result = $this->nationalityService->saveNationality($request->only(['nationality']));

        return (new NationalityResource($result))
            ->additional(['message' => config('api-response-messages.nationality_add_success.message')]);
    }
}
