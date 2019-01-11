<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\CountryCreateRequest;
use App\Http\Resources\CountryResource;
use App\Services\CountryService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * @var $countryService
     */
    private $countryService;

    /**
     * To initialize objects/variables
     *
     * @param CountryService $countryService
     */
    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
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
        $result = $this->countryService->getCountryList($searchKey);

        if ($result->isEmpty()) {
            return ResponseHelper::sendNotfoundError('Countries');
        }

        return CountryResource::collection($result)
            ->additional(['message' => config('api-response-messages.country_list_success.message')]);
    }

    /**
     * Add new country
     *
     * @param CountryCreateRequest $request
     * @return mixed
     */
    public function create(CountryCreateRequest $request)
    {
        $name = $request->get('name');
        $result = $this->countryService->saveCountry($name);

        return (new CountryResource($result))
            ->additional(['message' => config('api-response-messages.country_add_success.message')]);
    }
}
