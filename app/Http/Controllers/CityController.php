<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\CityCreateRequest;
use App\Http\Resources\CityResource;
use App\Services\CityService;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * @var $cityService
     */
    private $cityService;

    /**
     * CityController constructor.
     *
     * @param CityService $cityService
     */
    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    /**
     * Get list of cities
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $searchKey = $request->get('q');
        $result = $this->cityService->getCityList($searchKey);

        if ($result->isEmpty()) {
            return ResponseHelper::sendNotfoundError('City');
        }

        return CityResource::collection($result)
            ->additional(['message'=>config('api-response-messages.city_list_success.message')]);
    }

    /**
     * Create new city
     *
     * @param CityCreateRequest $request
     * @return mixed
     */
    public function create(CityCreateRequest $request)
    {
        $result = $this->cityService->saveCity($request->all());

        return (new CityResource($result))
            ->additional(['message' => config('api-response-messages.city_add_success.message')]);
    }

    /**
     * Get cities by country id
     *
     * @param $countryId
     * @param Request $request
     * @return mixed
     */
    public function getCitiesByCountryId(string $countryId, Request $request)
    {
        $searchKey = $request->get('q');
        $result = $this->cityService->getCitiesByCountryId($countryId, $searchKey);

        if ($result->isEmpty()) {
            return ResponseHelper::sendNotfoundError('cities');
        }

        return CityResource::collection($result)
            ->additional(['message' => config('api-response-messages.city_list_success.message')]);
    }
}
