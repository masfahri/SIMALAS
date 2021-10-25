<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\GuruModel;
use App\Exports\GuruExport;
use App\Imports\GuruImport;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Services\UploadServices;
use App\Http\Requests\GuruRequest;
use Illuminate\Support\Facades\DB;
use Laravolt\Indonesia\Models\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImportRequest;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\AutoIncrementServices;
use Laravolt\Indonesia\Models\Province;


class GuruController extends Controller
{
    public function __construct(
        User $userModel,
        GuruModel $guruModel,
        AutoIncrementServices $autoIncrementServices,
        UploadServices $uploadServices,
        City $cityModel
    )
    {
        $this->userModel = $userModel;
        $this->guruModel = $guruModel;
        $this->autoIncrementServices = $autoIncrementServices;
        $this->uploadServices = $uploadServices;
        $this->cityModel = $cityModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = $this->guruModel::where('flag', 'active')->get();
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
        $citiesModel = $this->cityModel::orderBy('name','asc')->pluck('name', 'id');
        return view('Admin.pages.Guru.create', [
            'pageTitle' => 'Tambah Guru',
            'provinces'  => $citiesModel
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuruRequest $request)
    {
        $validated = $request->validated();
        $kd_guru = $this->getKodeGuru();
        if ($validated) {
            try {
                DB::beginTransaction();
                $user = $this->userModel::create([
                    'email' => $request->email,
                    'password' => Hash::make('simalas'),
                    'name' => $request['name']
                ]);
                $user->assignRole('Guru');
                $guru = $this->guruModel::create([
                    'kd_guru'   => $kd_guru,
                    'user_id'   => $user->id,
                    'nip'   => $request['nip'],
                    'nomor_hp'  => $request['nomor_telf'],
                    'tempat_lahir'  => $request['tempat_lahir'],
                    'tanggal_lahir' => $request['tanggal_lahir'],
                    'agama' => $request['agama'],
                    'status_nikah'  => $request['status_pernikahan'],
                    'nama_ibu'  => $request['nama_ibu'],
                    'nama_ayah' => $request['nama_ayah'],
                    'status_kepegawaian'    => $request['status_kepegawaian'],
                    'jenis_ptk' => $request['jenis_ptk'],
                    'lemabaga_sertifikasi'  => $request[''],
                    'no_sk' => $request['no_sk'],
                    'tgl_sk'    => $request['tgl_sk'],
                    'nuptk' => $request['nuptk'],
                    'tmt_tugas' => $request['tmt_tugas'],
                    'tugas_tambahan'    => $request['tugas_tambahan'],
                    'created_by'    => auth()->user()->id
                ]);
                DB::commit();
                return redirect()->route('admin.master.guru.index')->with('success', 'Guru baru dengan nama '.$request['name'].' Berhasil Ditambahkan');
            } catch (\Throwable $th) {
                DB::rollback();
                dd($th->getMessage());
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
        try {
            $guru = $this->guruModel::where('kd_guru', $id)->firstOrFail();
            $citiesModel = $this->cityModel::orderBy('name','asc')->pluck('name', 'id');
            return view('Admin.pages.Guru.edit', [
                'pageTitle' => 'Edit Guru',
                'provinces' => $citiesModel,
                'guru'      => $guru
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('admin.master.guru.index')->with('error', 'Kode Guru Tidak Ditemukan');
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
            $guru = $this->guruModel::where('kd_guru', $id)->first();
            $user = $guru->GuruToUser;
            DB::beginTransaction();
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $guru->update([
                'nip'           => $request->nip,
                'name'          => $request->name,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir'  => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nomor_telf'    => $request->nomor_telf,
                'pas_foto'      => $request->pas_foto,
                'agama'         => $request->agama,
                'status_nikah'  => $request->status_pernikahan,
                'nama_ibu'      => $request->nama_ibu,
                'nama_ayah'     => $request->nama_ayah,
                'status_kepegawaian'    => $request->status_kepegawaian,
                'jenis_ptk'     => $request->jenis_ptk,
                'lembaga_sertifikasi' => $request->lembaga_sertifikasi,
                'no_sk'         => $request->no_sk,
                'tgl_sk'        => $request->tgl_sk,
                'nuptk'         => $request->nuptk,
                'tmt_tugas'     => $request->tmt_tugas,
            ]);
            DB::commit();
            return redirect()->route('admin.master.guru.index')->with(['success' => 'Data : ' . $request->name . ' Berhasil Diubah']);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('admin.master.guru.index')->with(['error' => 'Data <strong> ' . $request->name . ' </strong> Gagal Diubah (<code>'.$th->getMessage().'<code>)']);
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
        try {
            DB::beginTransaction();
            $guru = $this->guruModel->where('kd_guru', $id)->firstOrFail();
            $user = User::find($guru->user_id)->delete();
            DB::commit();
            return redirect()->route('admin.master.guru.index')->with(['success' => 'Data : ' . $guru->name . ' Berhasil Diubah']);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('admin.master.guru.index')->with(['error' => 'Data Gagal Diubah (<code>'.$th->getMessage().'<code>)']);
        }
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
            $path1 = $request->file('file_import')->store('temp');
            $path=storage_path('app').'/'.$path1;
            Excel::import(new GuruImport,$path);
            // Excel::import(new GuruImport, $file->getRealPath());
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

    /**
     * Get Kode Guru Last
     *
     * @return String
     */
    public function getKodeGuru()
    {
        $autoIncrementServices = new AutoIncrementServices();
        $guruModel = new GuruModel();
        count($guruModel::all()) == 0 ? $guru = 0 : $guru = $guruModel->latest('kd_guru')->first()->kd_guru;
        $kd_guru = $autoIncrementServices->handleIncrement(['data' => $guru, 'prefix' => 'GR-', 'length' => 4]);
        return $kd_guru;
    }
}
