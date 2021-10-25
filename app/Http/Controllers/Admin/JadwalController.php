<?php

namespace App\Http\Controllers\admin;

use App\Models\KelasModel;
use Illuminate\Http\Request;
use App\Models\MataPelajaranModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\KelasSubJurusanModel;
use App\Services\AutoIncrementServices;
use App\Models\MappingJadwalPelajaranModel;

use App\Exceptions\ModelIsExistsException;
use App\Models\MappingMapelToGuruModel;

class JadwalController extends Controller
{
    public function __construct(KelasModel $kelas, MappingJadwalPelajaranModel $mappingJadwalPelajaranModel, KelasSubJurusanModel $kelasSubJurusanModel) {
        $this->kelas = $kelas;
        $this->mappingJadwalPelajaranModel = $mappingJadwalPelajaranModel;
        $this->kelasSubJurusanModel = $kelasSubJurusanModel;
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
        $kd_jadwal_pelajaran = $this->getKodeJadwalPelajaran();
        $kelas_sub_jurusan = $this->kelasSubJurusanModel::find($request->kd_kelas_sub_jur);
        $kelas = $kelas_sub_jurusan->kd_kelas.$kelas_sub_jurusan->kd_sub_kelas;

        try {
            DB::beginTransaction();
            $exists = $this->mappingJadwalPelajaranModel->exists($request->kd_kelas_sub_jur, $request->hari);
            // dd($request->kd_mapping_mapel_to_guru);
            if ($exists->count() == 0) {
                for ($i=0; $i < count($request->kd_mapping_mapel_to_guru); $i++) {
                    $this->createService([
                        'model' => $this->mappingJadwalPelajaranModel,
                        'data'  => array(
                            'kd_mapping_jadwal_pelajaran' => $kd_jadwal_pelajaran,
                            'hari' => $request->hari,
                            'kd_mapels' => $request->kd_mapping_mapel_to_guru[$i],
                            'kd_kelas_sub_jur' => $request->kd_kelas_sub_jur
                        ),
                        'pageTitle' => 'Jadwal',
                        'message' => 'Berhasil'
                    ]);
                }
                $kelas_sub_jurusan = $this->kelasSubJurusanModel::find($request->kd_kelas_sub_jur);
                $kelas = $kelas_sub_jurusan->kd_kelas.$kelas_sub_jurusan->kd_sub_kelas;
                DB::commit();
                return redirect()->back()->with(['success' => 'Jadwal ' . $kelas . ' Pada Hari '.$request->hari.' Berhasil Ditambahkan']);
            }else{
                throw new ModelIsExistsException('Jadwal ' . $kelas . ' Pada Hari '.$request->hari.' Sudah Ditambahkan');
            }
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th->getMessage());
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
        return view('Admin.pages.Jadwal.kelas', [
            'data'      => $this->mappingJadwalPelajaranModel::where('kd_kelas_sub_jur', $id),
            'kelas'     => $this->kelasSubJurusanModel::find($id),
            'mapels'     => $this->getModel(MataPelajaranModel::class),
            'pageTitle' => $this->pageTitle
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hari($id, $hari)
    {
        $jadwal_mapel = $this->mappingJadwalPelajaranModel::where(array('kd_kelas_sub_jur' => $id, 'hari' => $hari))->get();
        return view('Admin.pages.Jadwal.kelas', [
            'data'      => $jadwal_mapel,
            'kelas'     => $this->kelasSubJurusanModel::find($id),
            'mapels'    => $this->getModel(MataPelajaranModel::class),
            'pageTitle' => $this->pageTitle
        ]);

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
     * Get Kode Guru Last
     *
     * @return String
     */
    public function getKodeJadwalPelajaran()
    {
        $autoIncrementServices = new AutoIncrementServices();
        $mappingJadwalPelajaranModel = new MappingJadwalPelajaranModel();
        count($mappingJadwalPelajaranModel::all()) == 0 ? $jadwalPelajaran = 0 : $jadwalPelajaran = $mappingJadwalPelajaranModel->latest('kd_mapping_jadwal_pelajaran')->first()->kd_mapping_jadwal_pelajaran;
        $kd_jadwal_pelajaran = $autoIncrementServices->handleIncrement(['data' => $jadwalPelajaran, 'prefix' => 'JDWL-', 'length' => 5]);
        return $kd_jadwal_pelajaran;
    }
}
