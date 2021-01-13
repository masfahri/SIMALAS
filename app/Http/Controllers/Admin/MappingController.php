<?php

namespace App\Http\Controllers\Admin;

use App\Models\KelasModel;
use App\Models\SiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\MappingSiswaToKelasModel;

class MappingController extends Controller
{

    public function __construct(SiswaModel $siswaModel, KelasModel $kelasModel, MappingSiswaToKelasModel $mappingSiswaToKelasModel) {
        $this->siswaModel = $siswaModel;
        $this->kelasModel = $kelasModel;
        $this->mappingSiswaToKelasModel = $mappingSiswaToKelasModel;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = $this->siswaModel::leftJoin('mapping_siswa_to_kelas', 'siswa.kd_siswa', '=', 'mapping_siswa_to_kelas.kd_siswa')
                                    ->where('mapping_siswa_to_kelas.kd_siswa')->get();
        $data = $this->mappingSiswaToKelasModel::where('kd_kelas', request()->segment(6))->get();
        return view('Admin.pages.Siswa.mapping', [
            'pageTitle' => 'Mapping',
            'siswa'      => $siswa,
            'data'       => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        count($this->mappingSiswaToKelasModel::all()) == 0 ? $data = 0 : $data = $this->mappingSiswaToKelasModel->latest('kd_mapping_siswa_to_kelas')->first()->kd_mapping_siswa_to_kelas;
        $request['kd_mapping_siswa_to_kelas'] = $this->getKodeIncrement($this->mappingSiswaToKelasModel, ['data' => $data, 'prefix' => 'MP-', 'length' => 4]);
        for ($i=0; $i < count($request->kd_siswa); $i++) { 
            $create = $this->createService([
                'model' => $this->mappingSiswaToKelasModel,
                'data'  => array(
                    'kd_kelas' => $request->kd_kelas,
                    'kd_siswa' => $request->kd_siswa[$i],
                    'kd_mapping_siswa_to_kelas' => $request->kd_mapping_siswa_to_kelas,
                ),
                'pageTitle' => 'Kelas',
                'message' => 'Berhasil'
            ]);
        }
        return $create;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->deleteService([
            'model' => $this->mappingSiswaToKelasModel,
            'where'  => ['kd_siswa' => $id],
            'pageTitle' => 'Siswa',
            'message' => 'Berhasil Dihapus Dari Kelas',
            'redirect' => 'Admin\MappingController\index'
        ]);
    }
}
