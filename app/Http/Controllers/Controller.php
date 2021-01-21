<?php

namespace App\Http\Controllers;

use App\Services\CRUDServices;
use App\Services\AutoIncrementServices;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Check Data
     * @param array $request
     * @return Boolean
     */
    public function checkService($request)
    {
        $services = new CRUDServices;
        return $services->handleExists($request);
    }

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

    /**
     * Update Data
     * @param array $request
     * @return array with Messages
     */
    public function updateService($request)
    {
        $services = new CRUDServices;
        return $services->handleUpdate($request);
    }

    /**
     * Get Kode Guru Last
     * @param $model $field in $model
     * @return String
     */
    public function getKodeIncrement($model, $incrementParams)
    {
        $autoIncrementServices = new AutoIncrementServices();
        $result = $autoIncrementServices->handleIncrement($incrementParams);
        return $result;
    }
}
