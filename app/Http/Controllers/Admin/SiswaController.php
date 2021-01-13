<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\SiswaModel;
use App\Exports\GuruExport;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SiswaRequest;
use Laravolt\Indonesia\Models\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImportRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\AutoIncrementServices;
use Illuminate\Support\Facades\Validator;

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
        $nis = $this->generateNIS();
        $citiesModel = $this->cityModel::orderBy('name','asc')->pluck('name', 'id');
        return view('Admin.pages.Siswa.create', [
            'pageTitle' => 'Tambah Siswa',
            'provinces'  => $citiesModel,
            'nis'       => $nis
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
        $kd_siswa = $this->getKodeSiswa();
        $validated = $request->validated();
        if ($request->validated()) {
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
                return redirect()->route('admin.master.siswa.index')->with('error', $th->getMessage());
            }
        }else{
            return new \Throwable("Something went wrong!");
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
        $citiesModel = $this->cityModel::orderBy('name','asc')->pluck('name', 'id');
        try {
            $data = $this->siswaModel::where('kd_siswa', $id)->firstOrFail();
            return view('Admin.pages.Siswa.edit', [
                'data' => $data,
                'pageTitle' => 'Edit Siswa',
                'provinces' => $citiesModel
            ]);
        } catch (\Throwable $th) {
            return view('welcome', [
                'data' => null,
                'pageTitle' => 'Edit Siswa',
                'provinces' => $citiesModel
            ]);
        }

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
        try {
            $data = $this->siswaModel::where('kd_siswa', $id)->firstOrFail();
            $user = $this->userModel::find($data->user_id);
            DB::beginTransaction();
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            $data->update([
                'nis'           => $request->nis,
                'nisn'          => $request->nisn,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir'  => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nomor_telf'    => $request->nomor_telf,
                'pas_foto'      => $request->pas_foto == null ? '' : $request->pas_foto,
                'agama'         => $request->agama,
                'nama_ibu'      => $request->nama_ibu,
                'nama_ayah'     => $request->nama_ayah,
            ]);
            DB::commit();
            return redirect()->route('admin.master.siswa.index')->with(['success' => 'Data : ' . $request->name . ' Berhasil Diubah']);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('admin.master.siswa.index')->with(['error' => 'Data <strong> ' . $request->name . ' </strong> Gagal Diubah (<code>'.$th->getMessage().'<code>)']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->siswaModel::where('kd_siswa', $id)->firstOrFail();
        try {
            DB::beginTransaction();
            User::find($data->user_id)->delete();
            DB::commit();
            return redirect()->route('admin.master.siswa.index')->with(['success' => ' Berhasil Dihapus']);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('admin.master.siswa.index')->with(['error' => 'Data Gagal Diubah (<code>'.$th->getMessage().'<code>)']);
        }
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
            $data = new SiswaImport();
            $data->import($file->getRealPath());
            return redirect()->route('admin.master.siswa.index')->with(['success' => 'Berhasil Import Data Siswa']);
        } catch (\Throwable $e) {
            $failures = $e->getMessage();
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
        return Excel::download(new SiswaExport($this->siswaModel), 'Siswa.xlsx');
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

    /**
     * Get Kode Guru Last
     * 
     * @return String
     */
    public function generateNIS()
    {
        $autoIncrementServices = new AutoIncrementServices();
        
        $siswaModel = new SiswaModel();
        count($siswaModel::all()) == 0 ? $siswa = 0 : $siswa = $siswaModel->latest('nis')->first()->nis;
        $kd_siswa = $autoIncrementServices->handleNIS(['data' => $siswa, 'nsm' => '99999999999999', 'thn_masuk' => '20', 'length' => 16]);
        return $kd_siswa;
    }
}
