<?php

namespace App\Services;

use App\Repositories\IndividualAddressRepository;
use App\Repositories\IndividualContactRepository;
use App\Repositories\IndividualRepository;
use App\Repositories\RepositoryInterfaces\IndividualRepositoryInterface;
use App\Repositories\MiscInfoRepository;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Validator;
use App\Traits\UploadBase64Files;

class IndividualService
{
    use UploadBase64Files;

    /**
     * @var IndividualRepository
     */
    private $individualRepository;

    /**
     * @var UserRepository
     */
    private $contactRepository;

    /**
     * @var UserAddressRepository
     */
    private $addressRepository;

    /**
     * @var MiscInfoRepository
     */
    private $miscInfoRepository;

    /**
     * @var array
     */
    protected $searchableColumns = [
        'first_name',
        'middle_name',
        'last_name'
    ];

    /**
     * To initialize class objects or variables.
     *
     * @param IndividualRepository $individualRepository
     * @param IndividualContactRepository $contactRepository
     * @param IndividualAddressRepository $addressRepository
     * @param MiscInfoRepository $miscInfoRepository
     */
    public function __construct(IndividualRepositoryInterface $individualRepository,
                                IndividualContactRepository $contactRepository,
                                IndividualAddressRepository $addressRepository,
                                MiscInfoRepository $miscInfoRepository)
    {
        $this->individualRepository = $individualRepository;
        $this->contactRepository = $contactRepository;
        $this->addressRepository = $addressRepository;
        $this->miscInfoRepository = $miscInfoRepository;
    }

    public function create(array $saveArray)
    {

        $saveArray['profile_pic'] = (gettype($saveArray['profile_pic']) == "string")
            ? $this->uploadBase64Files($saveArray['profile_pic'], config('constants.PROFILE_PIC_PATH'))
            : $this->uploadProfilePic($saveArray['profile_pic'], config('constants.PROFILE_PIC_PATH'));
        $saveArray['created_by'] = 0;

        $result = $this->individualRepository->create($saveArray);

        empty($saveArray['user_contacts']) ? '' :$this->saveUserContacts($saveArray['user_contacts'], $result->id);
        empty($saveArray['user_addresses']) ? '' : $this->saveIndividualAddresses($saveArray['user_addresses'], $result->id);
        empty($saveArray['miscellaneous']) ? '' : $this->saveMiscInfo($saveArray['miscellaneous'], $result->id);

        return $result;
    }

    /**
     * Save individual's contacts
     *
     * @param string $userContacts
     * @param string $individualId
     * @throws \Exception
     */
    public function saveUserContacts(string $userContacts, string $individualId)
    {
        $contacts = json_decode($userContacts, true);
        $saveArray = [];
        foreach ($contacts as $contact) {
            $contact['id'] = Uuid::generate();
            $contact['individual_id'] = $individualId;
            $contact['created_at'] = $contact['updated_at'] = new \DateTime();
            $saveArray[] = $contact;
        }
        $this->contactRepository->insert($saveArray);
    }

    /**
     * Save individual's misc info
     *
     * @param string $miscInfo
     * @param string $individualId
     */
    public function saveMiscInfo(string $miscInfo, string $individualId)
    {
        $miscInfo = json_decode($miscInfo, true);

        $miscInfo['id_scan_copy'] = !empty($miscInfo['id_scan_copy']) ? $this->uploadBase64Files($miscInfo['id_scan_copy'], config('constants.DOCUMENT_PATH')) : null; //store id scan copy in documents folder
        $miscInfo['individual_id'] = $individualId;

        $this->miscInfoRepository->create($miscInfo);
    }

    /**
     * Save Individual's Address
     *
     * @param $userAddresses
     * @param $individualId
     * @throws \Exception
     */
    public function saveIndividualAddresses(string $userAddresses, string $individualId)
    {
        $userAddresses = json_decode($userAddresses, true);
        $saveArray = [];
        foreach ($userAddresses as $userAddress) {
            //if effective_by empty set null as default
            $userAddress['effective_by'] = (isset($userAddress['effective_by']) && !empty($userAddress['effective_by']))
                ? $userAddress['effective_by']
                : null;

            $userAddress['id'] = Uuid::generate();
            $userAddress['individual_id'] = $individualId;//Individual's Id
            $userAddress['created_at'] =new \DateTime();
            $saveArray [] = $userAddress;
        }

        $this->addressRepository->insert($saveArray);
    }

    /**
     * Update the profile pic of individual
     *
     * @param $individual_id
     * @param $profilePicData
     * @return bool
     */
    public function updateProfilePic(string $individual_id, array $profilePicData)
    {
        $profilePic = $profilePicData['profile_pic'];
        $profilePicPath = (gettype($profilePic) == "string")
            ? $this->uploadBase64Files($profilePic, config('constants.PROFILE_PIC_PATH'))
            : $this->uploadProfilePic($profilePic, config('constants.PROFILE_PIC_PATH'));

        $result = $this->getIndividualDetailsById($individual_id);

        if ($this->individualRepository->update($individual_id, ['profile_pic' => $profilePicPath])) {
            //Delete existing profile pic.
            $existingProfilePic = $result->getAttribute('profile_pic');
            if ($existingProfilePic) {
                chmod($existingProfilePic, 0777);
                unlink(public_path($existingProfilePic));
            }

            $result['profile_pic'] = $profilePicPath;
        }

        return $result;
    }

    /**
     * Get Individuals details by id
     *
     * @param string $individual_id
     * @return mixed
     */
    public function getIndividualDetailsById(string $individual_id)
    {
        return $this->individualRepository->find($individual_id);
    }

    /**
     * Upload Profile Pic Object
     *
     * @param $imageFile
     * @param $profilePath
     * @return string
     */
    public function uploadProfilePic($imageFile, $profilePath) : string
    {
        $name = time().uniqid(rand()).'.'.$imageFile->getClientOriginalExtension();//generate unique id for file name
        $destinationPath = public_path('/'.$profilePath );
        $imagePath = $profilePath . $name;
        $imageFile->move($destinationPath, $name);

        return $imagePath;
    }

    /**
     * Validate user profile pic, only jpg images are allowed.
     *
     * @param array $profilePic
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validateImage(array $profilePic)
    {
        $rules = [
            'imageType' => 'is_jpg'
        ];
        $message = [
            'imageType.is_jpg' => 'Only jpg images are allowed.',
        ];

        return Validator::make($profilePic, $rules, $message);
    }

}