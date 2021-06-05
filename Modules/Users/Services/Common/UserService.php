<?php

namespace Modules\Users\Services\Common;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\Base\Services\Classes\MediaService;
use Modules\Operations\Repositories\PackagesRepository;
use Modules\Users\Facades\DoctorSpecialitiesHelper;
use Modules\Users\Repositories\DoctorLocationRepository;
use Modules\Users\Repositories\DoctorRepository;
use Modules\Users\Repositories\DoctorTitleRepository;
use Modules\Users\Repositories\ClientsRepository;
use Modules\Users\Repositories\UserRepository;
use Modules\Users\Transformers\AdminResource;
use Modules\Users\Transformers\DoctorLocationResource;
use Modules\Users\Transformers\DoctorResource;
use Modules\Users\Transformers\DoctorTitlesResource;
use Modules\Users\Transformers\ClientsResource;
use Modules\Users\Transformers\UserSummaryResource;

class UserService extends LaravelServiceClass
{
    private $user_repo;
    private $client_repo;
    private $doctor_repo;
    private $doctorTitleRepository;
    private $mediaService;
    private $packagesRepository;
    private $doctorLocationRepository;

    protected $admin_type = 1;
    protected $client_type = 2;
    protected $doctor_type = 3;


    public function __construct(
        UserRepository $user,
        ClientsRepository $client_repo,
        DoctorRepository $doctor_repo,
        DoctorTitleRepository $doctorTitleRepository,
        PackagesRepository $packagesRepository,
        MediaService $mediaService,
        DoctorLocationRepository $doctorLocationRepository
    )
    {
        $this->user_repo = $user;
        $this->client_repo = $client_repo;
        $this->doctor_repo = $doctor_repo;

        $this->doctorTitleRepository = $doctorTitleRepository;
        $this->mediaService = $mediaService;
        $this->packagesRepository = $packagesRepository;
        $this->doctorLocationRepository = $doctorLocationRepository;
    }

    public function listDoctors()
    {
        list($users, $pagination) = parent::paginate($this->doctor_repo, true, [
            'user_type' => $this->doctor_type , 'is_active' => 1
        ]);

        $users = DoctorResource::collection($users);
        return ApiResponse::format(200, $users, null, $pagination);
    }

    public function getDoctor($id)
    {
        $doctor = $this->user_repo->get($id);

        if ($doctor->user_type != $this->doctor_type){
            $doctor = null;
        }

        if ($doctor){
            $doctor->with(['doctor']);
            $doctor = DoctorResource::make($doctor);
        }

        return ApiResponse::format(200, $doctor);
    }

    public function userSummary()
    {
        if (request('is_pagination')) {
            list($users, $pagination) = parent::paginate($this->user_repo, false, [
                'user_type' => $this->client_type
            ]);
        } else {
            $users = $this->user_repo->all([
                'user_type' => $this->client_type
            ]);
            $pagination = null;
        }

        $users->load('patient');

        $users = UserSummaryResource::collection($users);
        return ApiResponse::format(200, $users, [], $pagination);
    }

    public function get()
    {
        $user = Auth::user();

        $user = $this->getUserResource($user);

        return ApiResponse::format(201, $user);
    }

    public function update($id, $request = null)
    {
        $user = $this->user_repo->update($id, $request->all());
        $image = ($request->image) ? $this->mediaService->uploadImageBas64($request->image, 'profile') : null;

        if ($request->has('phone') && $user->user_type == $this->client_type) {
            $data = [
                'phone' => $request->phone,
            ];

            if ($image){
                $data['image'] = $image;
            }
            $this->client_repo->update($user->patient->id, $data);
        }

        $user = $this->getUserResource($user);

        return ApiResponse::format(201, $user);
    }

    public function updateDoctor($id, $request = null)
    {
        list($specialities_list, $services_list) =  DoctorSpecialitiesHelper::specialities($request->specialities);

        $image = ($request->image) ? $this->mediaService->uploadImageBas64($request->image, 'profile') : null;

        $certificate = ($request->certificate) ? $this->mediaService->uploadImageBas64($request->certificate, 'profile') : null;

        $card_image = ($request->card_image) ? $this->mediaService->uploadImageBas64($request->card_image, 'profile') : null;

        $user = $this->user_repo->update($id, $request->all());

        if ($user->user_type == $this->doctor_type) {
            $data = [];
            if ($request->has('phone')){
                $data['phone'] = $request->phone;
            }
            if ($request->has('bio')){
                $data['bio'] = $request->bio;
            }
            if ($request->has('date_of_birth')){
                $data['date_of_birth'] = $request->date_of_birth;
            }
            if ($request->has('title_id')){
                $data['title_id'] = $request->title_id;
            }
            if ($request->has('location')){
                $data['location'] = $request->location;
            }
            if ($request->has('package_id')){
                $data['package_id'] = $request->package_id;

                $package = $this->packagesRepository->get($request->package_id);
                $duration = $package->duration;
                $expiration_date = Carbon::now()->addDays($duration)->toDateString();
                $data['package_expiration_date'] = $expiration_date;
            }
            if ($image){
                $data['image'] = $image;
            }

            if ($certificate){
                $data['certificate'] = $certificate;
            }

            if ($card_image){
                $data['card_image'] = $card_image;
            }

            if ($specialities_list){
                $this->doctor_repo->syncSpecialities($user->doctor, $specialities_list);
            }

            if ($services_list){
                $this->doctor_repo->syncServices($user->doctor, $services_list);
            }

            if (isset($request->locations)){
                $this->doctor_repo->syncLocations($user->doctor, $request->locations);
            }

            if (count($data)){
                $this->doctor_repo->update($user->doctor->id, $data);
            }
        }

        $user = $this->getUserResource($user);

        return ApiResponse::format(201, $user);
    }

    private function getUserResource($user)
    {
        if ($user->user_type == $this->admin_type) {
            $user->load('admin');
            $user = AdminResource::make($user);
        } elseif ($user->user_type == $this->client_type) {
            $user->load('patient');
            $user = ClientsResource::make($user);
        } elseif ($user->user_type == $this->doctor_type) {
            $user->load(['doctor.specialities.doctorServices.currentDoctorServices', 'doctor.pendingReservations','doctor.locations','doctor.pendingOperations']);
            $user = DoctorResource::make($user);
        }
        return $user;
    }

    public function titles(){
        $titles = $this->doctorTitleRepository->all();

        $titles = DoctorTitlesResource::collection($titles);
        return ApiResponse::format(200, $titles);
    }


    public function locations(){
        $locations = $this->doctorLocationRepository->all();

        $locations = DoctorLocationResource::collection($locations);
        return ApiResponse::format(200, $locations);
    }


    public function bulkUpdateDoctorLocations()
    {
        $doctors = $this->doctor_repo->allDoctors();
        $location = [['district_id'=>3, 'location' =>'cairo']];
        foreach ($doctors as $key => $doctor) {
           if(!$this->doctor_repo->getIfDoctorHasLocations($doctor)){
             $this->doctor_repo->syncLocations($doctor, $location);
           }

        }
    }
}
