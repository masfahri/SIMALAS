<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Data {{ $pageTitle }}</h3>
        <div class="pull-right btn-group">
            <a href="{{ $route['export'] }}" class="waves-effect waves-light btn btn-success" data-toggle="tooltip" data-placement="top" title="Export Data"><i class="fa fa-upload"></i></a>
            <a href="#" id="import" class="waves-effect waves-light btn btn-success" data-toggle="tooltip" data-placement="top" title="Import Data"><i class="fa fa-download"></i></a>
            <a href="{{ $route['create'] }}" class="waves-effect waves-light btn btn-success" data-toggle="tooltip" data-placement="top" title="Tambah Data"><i class="fa fa-plus"></i></a>
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
                @foreach ($guru as $item)
                <tr>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->GuruToUser->name }}</td>
                    <td>{{ $item->GuruToUser->email }}</td>
                    <td><center><img style="width: 35%" class="img-thumbnail" src="{{ ($item->pas_foto == null) ? 'http://simalas.local:8088/v1/images/simalas.png' : asset($item->pas_foto) }}" alt=""></center></td>
                    <td>
                        <center><a href="{{ route('admin.master.guru.edit', $item->kd_guru) }}"><span class="fa fa-edit fa-lg" style="font-size: 20"></span></a>
                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('admin.master.guru.delete', $item->kd_guru) }}"><span class="fa fa-trash fa-lg" style="font-size: 20"></span></a></center>
                        <form id="logout-form" action="{{ route('admin.master.guru.delete', $item->kd_guru) }}" method="POST" style="display: none;">
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