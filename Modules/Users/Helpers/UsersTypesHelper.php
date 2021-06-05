<?php

namespace Modules\Users\Helpers;
use Modules\Users\Repositories\UserTypeRepository;

class UsersTypesHelper
{

    protected $repository;

    public function __construct(UserTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function admin(){
        return 'Admin';
    }

    public function clients(){
        return 'Clients';
    }

    public function getAdminTypeId(){
        return $this->repository->getTypeID('ADMIN');
    }

    public function getClientsTypeId(){
        return $this->repository->getTypeID('CLIENTS');
    }

}
