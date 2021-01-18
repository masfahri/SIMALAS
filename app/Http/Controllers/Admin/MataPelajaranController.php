<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\MataPelajaranModel;
use App\Http\Controllers\Controller;
use App\Models\GuruModel;

class MataPelajaranController extends Controller
{
    public function __construct(MataPelajaranModel $mataPelajaranModel, GuruModel $guruModel) {
        $this->mataPelajaranModel = $mataPelajaranModel;
        $this->guruModel = $guruModel;
        $this->pageTitle = 'Mata Pelajaran';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->mataPelajaranModel::all();
        // $guru = $this->guruModel::leftJoin('mapping_siswa_to_kelas', 'siswa.kd_siswa', '=', 'mapping_siswa_to_kelas.kd_siswa')
        // ->where('mapping_siswa_to_kelas.kd_siswa')->get();
        return view('Admin.pages.mapel.index', [
            'pageTitle' => 'Mata Pelajaran',
            'data'      => array('mapel' => $data)
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
        count($this->mataPelajaranModel::all()) == 0 ? $data = 0 : $data = $this->mataPelajaranModel->latest('kd_mapel')->first()->kd_mapel;
        $request['kd_mapel'] = $this->getKodeIncrement($this->mataPelajaranModel, ['data' => $data, 'prefix' => 'MPL-', 'length' => 5]);
        $count = $this->mataPelajaranModel::where('nama_mapel', $request->nama_mapel)->orWhere('summon', $request->summon)->count();
        if ($count == 0) {
            $create = $this->createService([
                'model' => $this->mataPelajaranModel,
                'data'  => array(
                    'nama_mapel' => $request->nama_mapel,
                    'kd_mapel' => $request->kd_mapel,
                    'summon' => $request->summon
                ),
                'pageTitle' => 'Kelas',
                'message' => 'Berhasil'
            ]);
            return $create;
        } return redirect()->back()->with(['error' => 'Nama Mapel atau Kode Mapel Sudah Ada']);

               
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
        $data = $this->mataPelajaranModel::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $count = $this->mataPelajaranModel::where('summon', $request->summon)->count();
        if ($count == 1) {
            $update = $this->updateService([
                'model' => $this->mataPelajaranModel,
                'data'  => array(
                    'nama_mapel' => $request->nama_mapel,
                    'summon' => $request->summon
                ),
                'where' => array(
                    'summon' => $request->summon
                ),
                'pageTitle' => $this->pageTitle,
                'message' => 'Berhasil'
            ]); return $update;
        } return redirect()->back()->with(['error' => 'Kode Mapel Tidak Ditemukan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = $this->mataPelajaranModel::where('kd_mapel', $id)->count();
        if ($count == 1) {
            $delete = $this->deleteService([
                'model' => $this->mataPelajaranModel,
                'where' => array(
                    'kd_mapel' => $id
                ),
                'pageTitle' => $this->pageTitle,
                'message' => 'Berhasil'
            ]); return $delete;
        } return redirect()->back()->with(['error' => 'Kode Mapel Tidak Ditemukan']);
    }
}
