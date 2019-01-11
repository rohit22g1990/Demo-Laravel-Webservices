<?php
/**
 * Created by PhpStorm.
 * User: rohitghotkar
 * Date: 7/1/19
 * Time: 2:10 PM
 */

namespace App\Services;

use App\Repositories\SalutationRepository;
use Illuminate\Http\Request;

class SalutationService
{
    /**
     * @var SalutationRepository
     */
    private $salutationRepository;

    /**
     * To initialize class objects or variables.
     *
     * @param SalutationRepository $salutationRepository
     */
    public function __construct(SalutationRepository $salutationRepository)
    {
        $this->salutationRepository = $salutationRepository;
    }

    /**
     * To get Salutation list
     *
     * @param Request $request
     * @return mixed
     */
    public function getSalutationList($searchKey)
    {
        return $this->salutationRepository->getListWithSearch($searchKey);
    }

    /**
     * Add new salutation
     *
     * @param $title
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function saveSalutation($title)
    {
        $saveArray = [
            'title' => $title,
            'created_by' => 0 //Here we can save the login user id
        ];

        return $this->salutationRepository->create($saveArray);
    }

}