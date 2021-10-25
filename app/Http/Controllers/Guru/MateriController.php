<?php

namespace App\Http\Controllers\Guru;

use App\Models\Guru\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\FileUpload;
use App\Services\AutoIncrementServices;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $materis = new Materi();
        $materi = $materis::where(['kd_guru_mapel' => $request->kd_guru_mapel, 'kd_kelas' => $request->kd_kelas]);
        if ($materi->count() == 0) {
            try {
                DB::beginTransaction();
                $materi = Materi::create([
                    'kd_materi' => $this->getKodeMateri(),
                    'kd_guru_mapel' => $request->kd_guru_mapel,
                    'kd_kelas'  => $request->kd_kelas,
                    'judul_materi'  => $request->judul_materi,
                    'deskripsi_materi'  => $request->deskripsi_materi
                ]);

                FileUpload::create([
                    'user_id' => auth()->user()->id,
                    'parent_id' => $materi->kd_materi,
                    'key' => 'Materi',
                    'value' => 'Video Materi'
                ]);
                DB::commit();
                return redirect()->back()->with('success', 'Materi baru dengan nama '.$request->judul_materi.' Berhasil Ditambahkan');
            } catch (\Throwable $th) {
                dd($th->getMessage());
                DB::rollback();
            }
        }else{
            FileUpload::create([
                'user_id' => auth()->user()->id,
                'parent_id' => $materi->first()->kd_materi,
                'key' => 'Materi',
                'value' => 'Video Materi'
            ]);
            return redirect()->back()->with('success', 'Materi baru dengan nama '.$request->judul_materi.' Berhasil Ditambahkan');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show($kd_kelas, $kd_mapel)
    {
        $pageTitle = 'Materi';
        return view('Guru.pages.materi.index', compact('pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        //
    }

    /**
     * Get Kode Materi Last
     *
     * @return String
     */
    public function getKodeMateri()
    {
        $autoIncrementServices = new AutoIncrementServices();
        $materiModel = new Materi();
        count($materiModel::all()) == 0 ? $materi = 0 : $materi = $materiModel->latest('kd_materi')->first()->kd_materi;
        $kd_guru = $autoIncrementServices->handleIncrement(['data' => $materi, 'prefix' => 'MT-', 'length' => 4]);
        return $kd_guru;
    }
}
