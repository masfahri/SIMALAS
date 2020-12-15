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
                    <td>{{ $item->GuruToUser->name }}</td>
                    <td>{{ $item->GuruToUser->email }}</td>
                    <td>{{ $item->agama }}</td>
                    <td>{{ $item->status_nikah }}</td>
                    <td>{{ $item->status_kepegawaian }}</td>
                    <td>{{ $item->jenis_ptk }}</td>
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