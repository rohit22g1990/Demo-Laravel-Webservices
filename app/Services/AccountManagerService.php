<?php

namespace App\Services;

use App\Repositories\AccountManagerRepository;

class AccountManagerService
{
    /**
     * @var AccountManagerRepository
     */
    private $accountManagerRepository;

    /**
     * To initialize class objects or variables.
     *
     * @param AccountManagerRepository $accountManagerRepository
     */
    public function __construct(AccountManagerRepository $accountManagerRepository)
    {
        $this->accountManagerRepository = $accountManagerRepository;
    }

    /**
     * To get account manager accounts
     *
     * @param $searchKey
     * @return mixed
     */
    public function getAccountManagerList($searchKey)
    {
        return $this->accountManagerRepository->getListWithSearch($searchKey);
    }
}
