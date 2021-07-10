<?php

namespace Modules\Yacht\Services\CMS;

use Throwable;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Modules\Yacht\Enums\FuelTypeEnum;
use Modules\Yacht\Enums\HullTypeEnum;
use Modules\Yacht\Enums\YachtTypeEnum;
use Illuminate\Support\Facades\Session;
use Modules\Yacht\Enums\EngineTypeEnum;
use Modules\Yacht\Enums\TripStatusEnum;
use Modules\Yacht\Enums\YachtStatusEnum;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Yacht\Enums\PaymentMethodsEnum;
use Modules\Users\Repositories\UserRepository;
use Modules\Users\Services\CMS\ClientsService;
use Modules\Yacht\Repositories\TripRepository;
use Modules\Base\Services\Classes\MediaService;
use Modules\Yacht\Repositories\YachtRepository;
use Modules\Base\Repositories\CountryRepository;
use Modules\Yacht\Transformers\CMS\EnumResource;
use Modules\Yacht\Transformers\CMS\TripResource;
use Modules\Users\Repositories\ClientsRepository;
use Modules\Yacht\Transformers\CMS\YachtResource;
use Modules\Yacht\Repositories\TimeSlotRepository;
use Modules\Frontend\Repositories\BannersRepository;
use Modules\Notifications\Services\CMS\EmailService;
use Modules\Services\Repositories\ServiceRepository;
use Modules\Yacht\Repositories\YachtImageRepository;
use Modules\Frontend\Transformers\CMS\BannerResource;
use Modules\Yacht\Transformers\CMS\TripEnumsResource;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\Services\Transformers\CMS\ServiceResource;
use Modules\Yacht\Transformers\CMS\YachtEnumsResource;

class TripService extends LaravelServiceClass
{
    protected $repository, $client_service, $time_slot_repo, $country_repo,$email_service;

    public function __construct(TripRepository $repository,
                                UserRepository $user_repo,
                                ClientsRepository $clientRepository,
                                TimeSlotRepository $time_slot_repo,
                                CountryRepository $country_repo,
                                EmailService $email_service
                                )
    {
        $this->repository = $repository;
        $this->user_repo = $user_repo;
        $this->clientRepository = $clientRepository;
        $this->time_slot_repo = $time_slot_repo;
        $this->country_repo = $country_repo;
        $this->email_service = $email_service;
    }

    public function index()
    {
        $pagination = null;
        if (request('is_pagination')) {
            list($model, $pagination) = parent::paginate($this->repository);
        } else {
            $model = parent::all($this->repository, true);
        }

        $model->load(['yacht']);
        $model = TripResource::collection($model);
        return ApiResponse::format(200, $model, null, $pagination);
    }

    /**
     * Handles Add New Admin
     *
     * @param null $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store($request = null)
    {
        return DB::transaction(function () use ($request) {

            $data = $request->validated();

            //$client = $this->createClient($request->only(['name','email','address','title','country_id','phone']));
                             
            //$model = $this->repository->create($request->validated() + ['client_id'=>$client->id]);
                 
            $model = $this->repository->create($request->validated());

            // Session::put('locale', 'en');
            // $this->email_service->email($model->email,'Yacht','emails.reservation','confirm reservation proccess',['trip'=>$model]);
            
            $model = new TripResource($model);
            
            return ApiResponse::format(200, $model, 'Added!');
        });

    }

    public function show($id)
    {
        $model = $this->repository->get($id);
        $model->load(['country','yacht']);
        
        $model = TripResource::make($model);
        return ApiResponse::format(200, $model);
    }

    public function update($id, $request = null)
    {
        return DB::transaction(function () use ($request,$id) {

           
                             
            $model =  $this->repository->update($id, $request->validated());
           
            // $this->updateClient($request->only(['name','email','address','title','country_id','phone']),$model->client_id);
             
            $model = TripResource::make($model);

            return ApiResponse::format(200, $model, 'updated!');
        });

        
    }

    public function delete($id)
    {
        $model = $this->repository->delete($id);
        return ApiResponse::format(200, $model, 'Deleted!');
    }


    public function listTripStatus()
    {
        return TripStatusEnum::translatedValues();
    }

    public function listPaymentMethodsTypes()
    {
        return PaymentMethodsEnum::translatedValues();
    }

    
    public function listEnums()
    {
        $enums = new TripEnumsResource(
                                    $this->listTripStatus(),
                                    $this->listPaymentMethodsTypes(),
                                    $this->time_slot_repo->all(),
                                    $this->country_repo->all()
                                );
        return ApiResponse::format(200, $enums, 'query successfully !');                                
    }

    public function createClient($data)
    {
        return DB::transaction(function () use ($data) {

        $data['user_type'] = 2;

        $user =  $this->user_repo->create($data + ['password'=>bcrypt($data['phone'])]);
            
        $client=  $this->clientRepository->create([
                    'user_id' => $user->id,
                    'phone' => $data['phone'],
                    'address'=>$data['address'],
                    'title'=>$data['title'],
                    'country_id'=> isset($data['country_id']) ? $data['country_id'] : null
                ]);
          
          return $client;

        });   
    }


    public function updateClient($data,$id)
    {
        return DB::transaction(function () use ($data,$id) {
            
        $client=  $this->clientRepository->update($id, [
                    'phone' => $data['phone'],
                    'address'=>$data['address'],
                    'title'=>$data['title'],
                    'country_id'=> isset($data['country_id']) ? $data['country_id'] : null
        ]);
          
         $this->user_repo->update($client->user_id,$data);

        });   
    }
}
