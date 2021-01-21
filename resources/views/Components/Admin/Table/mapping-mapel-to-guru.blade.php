<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Data Guru {{ $matapelajaran->nama_mapel }}</h3>
        <div class="pull-right btn-group">
            <a href="#" data-toggle="modal" data-target="#modal-mapping_guru-To-Mapel" class="waves-effect waves-light btn btn-success" data-toggle="tooltip" data-placement="top" title="Tambah Data"><i class="fa fa-plus"></i></a>
        </div>
        @if (session('error'))
            <center>
                <span class="badge badge-danger w-100" style="padding: 4px; margin: 10px; width: 100% !important">
                    @foreach (session('error') as $item)
                        {{ $item }}</br>
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
                @foreach ($data as $item)
                    @foreach ($item->Guru as $guru)
                    <tr>
                        <td>{{ $item->kd_guru }}</td>
                        <td>{{ $guru->GuruToUser->name }}</td>
                        <td>
                            <a onclick="event.preventDefault(); confirm ('Yakin?'); document.getElementById('delete{{ $item->id }}').submit();" href="#"><span class="fa fa-trash fa-lg" style="font-size: 20"></span></a></center>
                            <form id="delete{{ $item->id }}" action="{{ route('admin.master.mapel.mapping.delete', $item->id) }}" method="POST" style="display:none">
                                {{ csrf_field() }}
                                {!! method_field('delete') !!}
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                    @endforeach
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
@component('Components.Admin.Modal.Mapel.mapping-guru-to-mapel', [
    'pageTitle' => $pageTitle,
    'guru'      => $gurus
])
    
@endcomponent
