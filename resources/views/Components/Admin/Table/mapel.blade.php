<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Data {{ $pageTitle }}</h3>
        <div class="pull-right btn-group">
            <a href="{{ $route['create'] }}" data-toggle="modal" data-target="#modal-center" class="waves-effect waves-light btn btn-success" data-toggle="tooltip" data-placement="top" title="Tambah Data"><i class="fa fa-plus"></i></a>
        </div>
        @if (session('error'))
            <center>
                <span class="badge badge-danger w-100" style="padding: 4px; margin: 10px; width: 100% !important">{{ session('error') }}</span>
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
                @foreach ($data['mapel'] as $item)
                <tr>
                    <td>{{ $item->kd_mapel }}</td>
                    <td>({{ $item->summon }}) - {{ $item->nama_mapel }} <br>[ {{$item->Gurus->count()}} - Guru ]</td>
                    <td>
                        <a href="#" data-id="{{ $item->id }}" data-toggle="modal" id="edit-mapel" data-target="#modal-edit" data-toggle="tooltip" data-placement="top"><span class="fa fa-edit fa-lg" style="font-size: 20"></span></a>
                        <a href="{{ route('admin.master.mapel.mapping.index', $item->kd_mapel) }}"><span class="fa fa-user fa-lg" style="font-size: 20"></span></a>
                        <a onclick="event.preventDefault(); confirm ('Yakin?'); document.getElementById('logout-form{{ $item->id }}').submit();" href="#"><span class="fa fa-trash fa-lg" style="font-size: 20"></span></a></center>
                        <form id="logout-form{{ $item->id }}" action="{{ route('admin.master.mapel.delete', $item->kd_mapel) }}" method="POST" style="">
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
@component('Components.Admin.Modal.mapel.create', [
    'pageTitle' => $pageTitle,
])

@endcomponent

@component('Components.Admin.Modal.mapel.edit', [
    'pageTitle' => $pageTitle,
])

@endcomponent
