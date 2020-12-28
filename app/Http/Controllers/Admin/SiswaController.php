<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\SiswaModel;
use App\Exports\GuruExport;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SiswaRequest;
use Laravolt\Indonesia\Models\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImportRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\AutoIncrementServices;

class SiswaController extends Controller
{
    public function __construct(SiswaModel $siswaModel, User $userModel, City $cityModel) {
        $this->siswaModel = $siswaModel;
        $this->cityModel = $cityModel;
        $this->userModel = $userModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->siswaModel::all();
        return view('Admin.pages.Siswa.index', [
            'pageTitle' => 'Siswa',
            'data'    => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citiesModel = $this->cityModel::orderBy('name','asc')->pluck('name', 'id');
        return view('Admin.pages.Siswa.create', [
            'pageTitle' => 'Tambah Siswa',
            'provinces'  => $citiesModel
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiswaRequest $request)
    {
        $validated = $request->validated();
        $kd_siswa = $this->getKodeSiswa();
        if ($validated) {
            try {
                DB::beginTransaction();
                $user = $this->userModel::create([
                    'email' => $request->email,
                    'password' => $request->password,
                    'name' => $request['name']
                ]);
                $user->assignRole('Siswa');
                $this->siswaModel::create([
                    'user_id' => $user->id,
                    'nis' => $request->nis, 
                    'kd_siswa' => $kd_siswa,
                    'nisn' => $request->nisn, 
                    'nomor_telf' => $request->nomor_telf,
                    'jenis_kelamin' => $request->jenis_kelamin, 
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir, 
                    'agama' => $request->agama,
                    'nama_ayah' => $request->nama_ayah,
                    'nama_ibu' => $request->nama_ibu, 
                    'pas_foto' => ''
                ]);
                DB::commit();
                return redirect()->route('admin.master.siswa.index')->with('success', 'Siswa baru dengan nama '.$request['name'].' Berhasil Ditambahkan');
            } catch (\Throwable $th) {
                DB::rollback();
                return redirect()->back()->with('error', $th->getMessage());
            }
        }else{
            return redirect()->back()->with('error', $request->fails());
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
     * Import SIswa as defined on Table [Users]
     * 
     * @return boolean: .xlsx
     */
    public function import(ImportRequest $request)
    {
        $file = $request->file_import;
        try {
            Excel::import(new SiswaImport, $file->getRealPath());
            return redirect()->route('admin.master.siswa.index')->with(['success' => 'Berhasil Import Data Siswa']);
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

    /**
     * Get Kode Guru Last
     * 
     * @return String
     */
    public function getKodeSiswa()
    {
        $autoIncrementServices = new AutoIncrementServices();
        $siswaModel = new SiswaModel();
        count($siswaModel::all()) == 0 ? $siswa = 0 : $siswa = $siswaModel->latest('kd_siswa')->first()->kd_siswa;
        $kd_siswa = $autoIncrementServices->handleIncrement(['data' => $siswa, 'prefix' => 'SS-', 'length' => 4]);
        return $kd_siswa;
    }
}
