<?php

namespace Modules\Users\Http\Controllers\CMS;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Base\Requests\PaginationRequest;
use Modules\Users\Http\Requests\ClientsRequest;
use Modules\Users\Services\CMS\ClientsService;
use Modules\Users\Services\Common\UserService;
use Throwable;

class ClientsController extends Controller
{
    private $userService;
    private $client_service;

    public function __construct(UserService $user, ClientsService $client)
    {
        $this->userService = $user;
        $this->client_service = $client;
    }


    // API RESOURCE METHODS

    /**
     *
     * @param PaginationRequest $request
     * @return JsonResponse
     */
    public function index(PaginationRequest $request)
    {
        return $this->client_service->index();
    }

    /**
     * Handles Add New Client
     *
     * @param ClientsRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(ClientsRequest $request)
    {
        return $this->client_service->store($request);
    }

    public function show(ClientsRequest $request)
    {
        return $this->client_service->show($request->client);
    }

    public function update(ClientsRequest $request)
    {
        return $this->client_service->update($request->client, $request);
    }

    public function destroy(ClientsRequest $request)
    {
        return $this->client_service->delete($request->client);
    }


    /**
     *
     * @param PaginationRequest $request
     * @return JsonResponse
     */
    public function export(PaginationRequest $request)
    {
        return $this->client_service->export();
    }
}
