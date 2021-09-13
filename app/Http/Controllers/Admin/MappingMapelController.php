<?php

namespace App\Http\Controllers\Admin;

use App\Models\GuruModel;
use Illuminate\Http\Request;
use App\Models\MataPelajaranModel;
use App\Http\Controllers\Controller;
use App\Models\MappingMapelToGuruModel;

class MappingMapelController extends Controller
{
    public function __construct(GuruModel $guruModel, MataPelajaranModel $mapelModel, MappingMapelToGuruModel $mappingMapelToGuruModel) {
        $this->guruModel = $guruModel;
        $this->mapelModel = $mapelModel;
        $this->mappingMapelToGuruModel = $mappingMapelToGuruModel;

        $this->pageTitle = 'Mapping Mata Pelajaran to Guru';

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->mappingMapelToGuruModel::where('kd_mapel', request()->segment(6))->get();
        $matapelajaran = $this->mapelModel::where('kd_mapel', request()->segment(6))->first();
        $guru = $this->guruModel::all();
        return view('Admin.pages.Mapel.mapping', [
            'pageTitle' => 'Mapping Mata Pelajaran Ke Guru',
            'data'       => $data,
            'guru'       => $guru,
            'matapelajaran' => $matapelajaran
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
        count($this->mappingMapelToGuruModel::all()) == 0 ? $data = 0 : $data = $this->mappingMapelToGuruModel->latest('kd_mapping_mapel_to_guru')->first()->kd_mapping_mapel_to_guru;
        $request['kd_mapping_mapel_to_guru'] = $this->getKodeIncrement($this->mappingMapelToGuruModel, ['data' => $data, 'prefix' => 'GM-', 'length' => 4]);
        for ($i=0; $i < count($request->kd_guru); $i++) { 
            $exists = $this->checkService([
                'model' => $this->mappingMapelToGuruModel,
                'data'  => array(
                    'kd_mapel' => $request->kd_mapel,
                    'kd_guru'  => $request->kd_guru[$i]
                ),
                'pageTitle' => $this->pageTitle,
                'message'   => 'Guru '.$request->kd_guru[$i].' dan Mata Pelajaran '.$request->kd_mapel.' Sudah di Mapping'
            ]);
            $mapel = $this->mapelModel::where('kd_mapel', $request->kd_mapel)->first();
            if (!$exists) {
                $create = $this->createService([
                    'model' => $this->mappingMapelToGuruModel,
                    'data'  => array(
                        'kd_mapel' => $request->kd_mapel,
                        'kd_guru' => $request->kd_guru[$i],
                        'kd_mapping_mapel_to_guru' => $request['kd_mapping_mapel_to_guru'],
                    ),
                    'pageTitle' => $this->pageTitle,
                    'message' => 'Berhasil'
                ]);
            }else{
                $message[$i] = 'Guru '.$request->kd_guru[$i].' dan Mata Pelajaran '.$mapel->nama_mapel.' Sudah di Mapping';
                $create = redirect()->back()->with(['error' => $message]);
            }
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
     * Display all Guru from kd_mapel
     * 
     * @param String $kd_mapel
     * @return Collection Mapping Mapel to Guru Model
     */
    public function getAllGuru($kd_mapel)
    {
        $data = $this->mappingMapelToGuruModel::where('kd_mapel', $kd_mapel)->get();
        return \Response::json($data);
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
            'model' => $this->mappingMapelToGuruModel,
            'where'  => ['id' => $id],
            'pageTitle' => $this->pageTitle,
            'message' => 'Berhasil Dihapus Guru Pelajaran',
            'redirect' => 'Admin\MappingMapelController\index'
        ]);
    }
}
