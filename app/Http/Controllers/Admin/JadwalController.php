<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KelasModel;
use App\Models\MataPelajaranModel;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function __construct(KelasModel $kelasModel, MataPelajaranModel $mataPelajaranModel) {
        $this->pageTitle = 'Manajemen Jadwal Pelajaran';
        $this->kelasModel = $kelasModel;
        $this->mataPelajaranModel = $mataPelajaranModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = $this->kelasModel::all(); 
        $mapel = $this->mataPelajaranModel::all();
        return view('Admin.pages.Jadwal.index', [
            'pageTitle' => $this->pageTitle,
            'data'     => array([
                'kelas' => $kelas,
                'mapel' => $mapel
            ])
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
}
