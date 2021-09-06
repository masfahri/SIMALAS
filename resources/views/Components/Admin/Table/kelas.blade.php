<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Data {{ $pageTitle }}</h3>
        <div class="pull-right btn-group">
            <a href="#" data-toggle="modal" data-target="#modal-center" class="waves-effect waves-light btn btn-success" data-toggle="tooltip" data-placement="top" title="Tambah Data"><i class="fa fa-plus"></i></a>
        </div>
        @if ($errors->any())
            <center>
                <span class="badge badge-danger w-100" style="padding: 4px; margin: 10px; width: 100% !important">
                    @foreach ($errors->all() as $error) {{ 
                        $error 
                    }}
                    @endforeach
                </span>
            </center>
        @endif
        @if (session('success'))
            <center><span class="badge badge-success w-100" style="padding: 4px; margin: 10px; width: 100% !important">{{ session('success') }}</span></center>
        @endif
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
          <table id="example5" class="table table-bordered table-striped" style="width:100%">
            <thead>
                <tr>
                    @foreach ($th as $list)
                        <th>{{ $list }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($kelasSubJurusan as $item)
                <tr>
                    <td>{{ $item->kd_kelas }} {{ $item->kd_jurusan == 0 ? '' : $item->Jurusan->name }} - {{ $item->SubKelas->name }}</td>
                    <td>{{ $item->Guru->GuruToUser->name }}</td>
                    <td> {{ $item->MappingSiswa->count() }} Siswa</td>
                    <td>
                        <a href="#" data-id="{{ $item->id }}" data-toggle="modal" id="edit-kelas" data-target="#modal-edit" data-toggle="tooltip" data-placement="top"><span class="fa fa-edit fa-lg" style="font-size: 20"></span></a>
                        <a href="{{ route('admin.master.siswa.mapping.index', $item->id) }}"><span class="fa fa-user fa-lg" style="font-size: 20"></span></a>
                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('admin.master.guru.delete', $item->kd_guru) }}"><span class="fa fa-trash fa-lg" style="font-size: 20"></span></a></center>
                        <form id="logout-form" action="{{ route('admin.master.kelas.delete', $item->id) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            @method('delete')
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                @foreach ($th as $list)
                    <th>{{ $list }}</th>
                @endforeach
                </tr>
            </tfoot>
          </table>
        </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->   
  @component('Components.Admin.Modal.create-kelas', [
      'kelas'    => $kelas,
      'jurusan'  => $jurusan,
      'subKelas' => $subKelas,
      'guru'     => $guru

  ])
      
  @endcomponent

@component('Components.Admin.Modal.edit-kelas', [
    'kelas'    => $kelas,
    'jurusan'  => $jurusan,
    'subKelas' => $subKelas,
    'guru'     => $guru

])
    
@endcomponent