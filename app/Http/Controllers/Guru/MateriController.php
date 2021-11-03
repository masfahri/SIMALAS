<?php

namespace App\Http\Controllers\Guru;

use App\Models\FileUpload;
use App\Models\Guru\Materi;
use Illuminate\Http\Request;
use App\Services\UploadServices;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\AutoIncrementServices;
use App\Transaction\Constants\FileUploadKey;

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
        $this->validate($request, [
			'fileUpload' => 'mimes:mp4,flv,mov,pdf,doc,docx,ppt,pptx',
		]);
        try {
            DB::beginTransaction();
            $materi = Materi::create([
                'kd_materi' => $this->getKodeMateri(),
                'kd_guru_mapel' => $request->kd_guru_mapel,
                'kd_kelas'  => $request->kd_kelas,
                'judul_materi'  => $request->judul_materi,
                'deskripsi_materi'  => $request->deskripsi_materi
            ]);
            $uploadService = new UploadServices();
            $fileUpload = $uploadService->handleUploadtoSpecifiedFolder([
                'file' => $request->file('fileUpload'),
                'folder_name' => $request->kd_kelas.'/'.auth()->user()->name,
                'file_name' => $request->judul_materi
            ]);
            if ($fileUpload['success']) {
                FileUpload::create([
                    'user_id' => auth()->user()->id,
                    'parent_id' => $materi->kd_materi,
                    'key' => FileUploadKey::MATERI,
                    'value' =>  json_encode([
                        'filename'  => $fileUpload['fileName'],
                        'path'      => $fileUpload['path'],
                        'extention' => $fileUpload['extention']
                    ])
                ]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Materi baru dengan nama '.$request->judul_materi.' Berhasil Ditambahkan');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Materi tidak berhasil ditambah bcs'.$th->getMessage());
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
        $data = FileUpload::where('user_id', auth()->user()->id)->get();
        return view('Guru.pages.materi.index', compact('pageTitle', 'data'));
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
