<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfilePicRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Resources\IndividualResource;
use App\Http\Requests\CreateIndividualRequest;
use App\Services\IndividualService;

class IndividualController extends Controller
{
    /**
     * @var $individualService
     */
    private $individualService;

    /**
     * To initialize objects/variables
     *
     * UserController constructor.
     * @param IndividualService $individualService
     */
    public function __construct(IndividualService $individualService)
    {
        $this->individualService = $individualService;
    }

    /**
     * Create new Individual
     *
     * @param CreateIndividualRequest $request
     * @return IndividualResource
     * @throws \Exception
     */
    public function create(CreateIndividualRequest $request)
    {
        $result = $this->individualService->create($request->all());

        return (new IndividualResource($result))
            ->additional(['message' => config('api-response-messages.user_add_success.message')]);
    }

    /**
     * Update Profile pic of individuals.
     *
     * @param $individual_id
     * @param UpdateProfilePicRequest $request
     * @return mixed
     */
    public function updateProfilePic(string $individual_id, UpdateProfilePicRequest $request)
    {
        $result = $this->individualService->updateProfilePic($individual_id, $request->all());

        return (new IndividualResource($result))
            ->additional(['message' => config('api-response-messages.individual_update_profile_success.message')]);
    }
}
