<?php

namespace App\Http\Controllers\Admin;

use App\Models\KelasModel;
use App\Models\JurusanModel;
use Illuminate\Http\Request;
use App\Models\SubKelasModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\KelasRequest;
use App\Models\GuruModel;
use App\Models\KelasSubJurusanModel;

class KelasController extends Controller
{
    public function __construct(
        KelasModel $kelasModel, 
        JurusanModel $jurusanModel, 
        KelasSubJurusanModel $kelasSubJurusanModel,
        SubKelasModel $subKelasModel,
        GuruModel $guruModel) {
        $this->kelasModel = $kelasModel;
        $this->jurusanModel = $jurusanModel;
        $this->guruModel = $guruModel;
        $this->kelasSubJurusanModel = $kelasSubJurusanModel;
        $this->subKelasModel = $subKelasModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.pages.Kelas.index', [
            'pageTitle'          => 'Manajemen Kelas',
            'jurusan'            => $this->jurusanModel::pluck('name', 'kd_jurusan'),
            'sub_kelas'          => $this->subKelasModel::pluck('name', 'kd_sub_kelas'),
            'kelas'              => $this->kelasModel::pluck('name', 'kd_kelas'),
            'guru'               => $this->guruModel::all(),
            'kelasSubJurusan'    => $this->kelasSubJurusanModel::all()
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
    public function store(KelasRequest $request)
    {
        $validated = $request->validated();
        $kelas = $this->kelasSubJurusanModel::where([
            'kd_kelas'      => ''.$request->kd_kelas.'',
            'kd_sub_kelas'  => $request->kd_sub_kelas,
            'kd_guru'       => ''.$request->kd_guru.'',
        ]);
        if ($kelas->count() == 0) {
            if ($validated) {
                return $this->createService([
                    'model' => $this->kelasSubJurusanModel,
                    'data'  => $request->only('kd_kelas', 'kd_jurusan', 'kd_sub_kelas', 'kd_guru'),
                    'pageTitle' => 'Kelas',
                    'message' => 'Berhasil'
                ]);
            }
        } else{
            return redirect()->route('admin.master.kelas.index')->withErrors(['error' => 'Kelas Sudah Ada']);
        }

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
        $data = $this->kelasSubJurusanModel::find($id);
        return $data;
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
            'model' => $this->kelasSubJurusanModel,
            'where'  => ['id' => $id],
            'pageTitle' => 'Kelas',
            'message' => 'Berhasil',
            'redirect' => 'Admin\KelasController\index'
        ]);
    }
}
