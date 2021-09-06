<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KelasModel;
use App\Models\KelasSubJurusanModel;
use App\Models\MataPelajaranModel;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function __construct(KelasModel $kelas) {
        $this->kelas = $kelas;
        $this->pageTitle = 'Jadwal Pelajaran';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.pages.Jadwal.index', [
            'kelas'     => $this->kelas::all(),
            'mapels'     => $this->getModel(MataPelajaranModel::class),
            'pageTitle' => $this->pageTitle
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
        //
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
        //
    }

    /**
     * Get Jadwal Per Kelas
     * 
     * @param int $id_kelas_sub_jurusan
     * @return array
     */
    public function jadwalKelas($id_kelas_sub_jurusan)
    {
        dd($this->mapelModel::all());
        return view('Admin.pages.Jadwal.index', [
            'kelas'     => $this->kelas::all(),
            'mapels'     => $this->mapelModel::all(),
            'pageTitle' => $this->pageTitle
        ]);
    }
}
