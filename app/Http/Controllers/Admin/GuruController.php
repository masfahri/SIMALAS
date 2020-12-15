<?php

namespace App\Http\Controllers\Admin;

use App\Exports\GuruExport;
use App\Models\User;
use App\Models\GuruModel;
use App\Imports\GuruImport;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImportRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\AutoIncrementServices;
use App\Services\UploadServices;

class GuruController extends Controller
{
    public function __construct(
        GuruModel $guruModel, 
        AutoIncrementServices $autoIncrementServices,
        UploadServices $uploadServices
    ) {
        $this->guruModel = $guruModel;
        $this->autoIncrementServices = $autoIncrementServices;
        $this->uploadServices = $uploadServices;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = $this->guruModel::all();
        return view('Admin.pages.Guru.index', [
                'pageTitle' => 'Guru',
                'guru' => $guru
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
        return view('Admin.pages.Guru.create', [
            'pageTitle' => 'Tambah Guru',
        ]);
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
     * Import Guru as defined on Table [Users]
     * 
     * @return boolean: .xlsx
     */
    public function import(ImportRequest $request)
    {
        $file = $request->file_import;
        try {
            Excel::import(new GuruImport, $file->getRealPath());
            return redirect()->route('admin.master.guru.index')->with(['success' => 'Berhasil Import Data Guru']);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            session()->flash('error', 'error bos');
            return redirect()->back();
        } 
    }
    
    /**
     * Export Guru as defined on Table [Users]
     * 
     * @return boolean: .xlsx
     */
    public function export()
    {
        return Excel::download(new GuruExport($this->guruModel), 'User.xlsx');
    }
}
