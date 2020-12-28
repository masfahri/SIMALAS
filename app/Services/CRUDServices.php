<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class CRUDServices 
{

    /**
     * handleCreate for Insert Data
     * @param $params
     * @return void
     */
    public function handleCreate($request)
    {
        try {
            DB::beginTransaction();
            $data = $request['model']::create($request['data']);
            DB::commit();
            if ($data->name != null) {
                return redirect()->back()->with(['success' => $request['pageTitle'].': <strong>' . $data->name . '</strong> Ditambahkan']);
            }else{
                return redirect()->back()->with(['success' => $request['pageTitle'].': <strong>' . $request['message'] . '</strong> Ditambahkan']);
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    /**
     * handleUpdate for Update Data
     * @param $params
     * @return void
     */
    public function handleUpdate($request)
    {
        try {
            DB::beginTransaction();
            $request['model']::where($request['where'])->update($request['data']);
            DB::commit();
            if (!empty($request['data']['name'])) {
                return redirect()->action($request['redirect'])->with(['success' => $request['pageTitle'].': <strong>' . $request['data']['name'] . '</strong> Berhasil Diubah']);
            }else{
                return redirect()->action($request['redirect'])->with(['success' => $request['pageTitle'].': <strong>' . $request['messages'] . '</strong> Berhasil Diubah']);
            }
            // return redirect()->action($request['redirect'])->with(['success' => $request['pageTitle'].': <strong>' . $request['data']['name'] . '</strong> Diubah']);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    
    /**
     * handleUpdate for Delete Data
     * @param $params
     * @return void
     */
    public function handleDelete($request)
    {
        try {
            DB::beginTransaction();
            $request['model']::where($request['where'])->delete();
            DB::commit();
            return redirect()->back()->with(['success' => $request['pageTitle'].': <strong>' . $request['pageTitle'] . '</strong> Berhasil Dihapus']);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }
}
