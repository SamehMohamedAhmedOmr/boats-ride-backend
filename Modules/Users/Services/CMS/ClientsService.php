<?php

namespace Modules\Users\Services\CMS;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Modules\Base\Facade\ExcelExportHelper;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\Base\Services\Classes\MediaService;
use Modules\Users\ExcelExports\ClientExport;
//use Modules\Users\Repositories\AddressRepository;
use Modules\Users\Repositories\ClientsRepository;
use Modules\Users\Repositories\UserRepository;
use Modules\Users\Transformers\ClientsResource;
use Throwable;

class ClientsService extends LaravelServiceClass
{
    private $user_repo;
    private $clientRepository;
    protected $patient_type = 2;
    private $mediaService;

    public function __construct(UserRepository $user_repo,
                                MediaService $mediaService,
                                ClientsRepository $clientRepository)
    {
        $this->user_repo = $user_repo;
        $this->clientRepository = $clientRepository;
        $this->mediaService = $mediaService;

    }

    public function index()
    {
        $pagination = null;
        if (request('is_pagination')) {
            list($users, $pagination) = parent::paginate($this->clientRepository, true, [
                'user_type' => $this->patient_type
            ]);
        } else {
            $users = parent::all($this->clientRepository, true, [
                'user_type' => $this->patient_type
            ]);
        }


        $users = ClientsResource::collection($users);
        return ApiResponse::format(200, $users, null, $pagination);
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
            $user_data = $request->validated();
            $user_data['user_type'] = $this->patient_type;

            if (isset($user_data['password'])){
                $user_data['password'] = bcrypt($user_data['password']);
            }
            else{
                $user_data['password'] = bcrypt($this->randomPassword());
            }

            $user =  $this->user_repo->create($user_data);
            
            $this->clientRepository->create([
                'user_id' => $user->id,
                'phone' => $request->phone,
            ]);
            
            $user = ClientsResource::make($user);
            
            return ApiResponse::format(201, $user, 'Client Added!');
        });

    }

    public function show($id)
    {
        $user = $this->user_repo->get($id, [
            'user_type' => $this->patient_type
        ]);


        $user = ClientsResource::make($user);
        return ApiResponse::format(200, $user);
    }

    public function update($id, $request = null)
    {
        $user = $this->user_repo->update($id, $request->only('name', 'email', 'is_active'));

        $data = [];
        if ($request->phone) {
            $data['phone'] = $request->phone;
        }

        $this->clientRepository->update($user->id, $data, [], 'user_id');

        $user = ClientsResource::make($user);
        return ApiResponse::format(200, $user);
    }

    public function delete($id)
    {
        $user = $this->user_repo->get($id);
        foreach ($user->tokens as $token) {
            $token->revoke();
        }
        $user->delete();
        return ApiResponse::format(200, $user, 'Client Deleted!');
    }


    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function export(){
        $file_path = ExcelExportHelper::export('Customers', \App::make(ClientExport::class));

        return ApiResponse::format(200, $file_path);
    }
}
