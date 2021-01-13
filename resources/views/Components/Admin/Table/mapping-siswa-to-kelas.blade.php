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
        <form style="margin-top: 20px; display:none;" action="{{ $route['import'] }}" method="post" id="form-import" enctype='multipart/form-data'>
            @csrf
            {!! Form::file('file_import', ['class' => 'form-control']) !!}
            {!! Form::submit('submit', ['class' => 'form-control']) !!}
        </form>
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
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->Siswa->nis }}</td>
                    <td>{{ $item->Siswa->SiswaToUser->name }}</td>
                    <td>{{ $item->Siswa->SiswaToUser->email }}</td>
                    <td><center><img style="width: 35%" class="img-thumbnail" src="{{ ($item->Siswa->pas_foto == '') ? 'http://simalas.local:88/v1/images/simalas.png' : $item->Siswa->pas_foto }}" alt=""></center></td>
                    <td>
                        <a onclick="event.preventDefault(); document.getElementById('delete').submit();" href="#"><span class="fa fa-trash fa-lg" style="font-size: 20"></span></a></center>
                        <form id="delete" action="{{ route('admin.master.siswa.mapping.delete', $item->Siswa->kd_siswa) }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            {!! method_field('delete') !!}
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
@component('Components.Admin.Modal.mapping-siswa-to-kelas', [
    'siswa'    => $siswa,

])
    
@endcomponent