<?php

namespace App\Http\Controllers;

use App\Services\CRUDServices;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create Data
     * @param array $request
     * @return array with Messages
     */
    public function createService($request)
    {
        $services = new CRUDServices;
        return $services->handleCreate($request);
    }

    /**
     * Delete Data
     * @param array $request
     * @return array with Messages
     */
    public function deleteService($request)
    {
        $services = new CRUDServices;
        return $services->handleDelete($request);
    }
}
