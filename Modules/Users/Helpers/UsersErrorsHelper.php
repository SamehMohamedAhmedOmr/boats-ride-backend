<?php

namespace Modules\Users\Helpers;

use Illuminate\Validation\ValidationException;


class UsersErrorsHelper
{

    /**
     * @throws ValidationException
     */
    public function unAuthenticated()
    {
        throw ValidationException::withMessages([
            'credential' => trans('users::errors.credential'),
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function inActiveAccount()
    {
        throw ValidationException::withMessages([
            'credential' => trans('users::errors.inActiveAccount'),
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function inCorrectPassword()
    {
        throw ValidationException::withMessages([
            'credential' => trans('users::errors.inCorrectPassword'),
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function tokenInvalid()
    {
        throw ValidationException::withMessages([
            'credential' => trans('users::errors.token_invalid'),
        ]);
    }


    /**
     * @throws ValidationException
     */
    public function tokenExpired()
    {
        throw ValidationException::withMessages([
            'credential' => trans('users::errors.token_expired'),
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function maxNumberOfAdmin()
    {
        throw ValidationException::withMessages([
            'max_number_of_admin' => trans('users::errors.max_number_of_admin'),
        ]);
    }

    public function regexName(){
        return '/^[a-zA-Z0-9 \p{L} ,.\'_-]+$/iu';
    }

    /**
     * @throws ValidationException
     */
    public function serviceNotBelongToSpecialities()
    {
        throw ValidationException::withMessages([
            'service' => trans('users::errors.serviceNotBelongToSpecialities'),
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function unAuthorized()
    {
        throw ValidationException::withMessages([
            'access' => trans('users::errors.access'),
        ]);
    }
}
