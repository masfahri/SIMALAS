<?php

namespace App\Http\Controllers\Guru;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MappingMapelToGuruModel;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = MappingMapelToGuruModel::where('kd_guru', auth()->user()->Guru->kd_guru)->with(['Jadwal' => function($query){
            $query->where('hari', Carbon::now()->isoFormat('dddd'))->get();
        }])->get();
        return view('Guru.pages.dashboard',
            [
                'pageTitle' => 'Dashboard',
                'data'     => $mapel,
            ]
        );
    }

    /**
     * Show Jadwal by Hari
     */
    public function hari($hari)
    {
        $mapel = MappingMapelToGuruModel::where('kd_guru', auth()->user()->Guru->kd_guru)->with(['Jadwal' => function($query) use($hari){
            $query->where('hari', $hari)->get();
        }])->get();
        return view('Guru.pages.dashboard',
            [
                'pageTitle' => 'Dashboard',
                'data'     => $mapel,
            ]
        );
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
