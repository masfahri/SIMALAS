@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-xl-8 col-lg-8 col-12">
                <div class="box">
                  <div class="box-header with-border">
                    <h4 class="box-title">Jadwal {{ Request::segment(5) }}</h4>
                      <div class="box-controls pull-right">
                      <div class="box-header-actions">
                        <div class="lookup lookup-sm lookup-right d-none d-lg-block">
                          <input type="text" name="s" placeholder="Search">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="mailbox-controls">
                      <!-- Check all button -->
                      <button type="button" class="btn btn-primary btn-sm checkbox-toggle"><i class="ion ion-android-checkbox-outline-blank"></i>
                      </button>
                      <div class="pull-right">
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary btn-sm {{ Request::segment(5) == 'senin' ? 'active' : '' }}"><a href="{{ route('admin.master.jadwal.hari', array(Request::segment(4), 'senin')) }}" style="color: white">Senin</a></button>
                          <button type="button" class="btn btn-primary btn-sm {{ Request::segment(5) == 'selasa' ? 'active' : '' }}"><a href="{{ route('admin.master.jadwal.hari', array(Request::segment(4), 'selasa')) }}" style="color: white">Selasa</a></button>
                          <button type="button" class="btn btn-primary btn-sm {{ Request::segment(5) == 'rabu' ? 'active' : '' }}"><a href="{{ route('admin.master.jadwal.hari', array(Request::segment(4), 'rabu')) }}" style="color: white">Rabu</a></button>
                          <button type="button" class="btn btn-primary btn-sm {{ Request::segment(5) == 'kamis' ? 'active' : '' }}"><a href="{{ route('admin.master.jadwal.hari', array(Request::segment(4), 'kamis')) }}" style="color: white">Kamis</a></button>
                          <button type="button" class="btn btn-primary btn-sm {{ Request::segment(5) == 'jumat' ? 'active' : '' }}"><a href="{{ route('admin.master.jadwal.hari', array(Request::segment(4), 'jumat')) }}" style="color: white">Jumat</a></button>
                          <button type="button" class="btn btn-primary btn-sm {{ Request::segment(5) == 'sabtu' ? 'active' : '' }}"><a href="{{ route('admin.master.jadwal.hari', array(Request::segment(4), 'sabtu')) }}" style="color: white">Sabtu</a></button>
                        </div>
                      </div>
                    </div>
                    <div class="mailbox-messages inbox-bx">
                        <div class="table-responsive">
                          @if (Request::segment(5) == null)
                            <br><center><h1>Mohon Pilih Hari</h1><center>
                          @else
                            @if ($data == null)
                              <br><center><h1>Belum Ada Jadwal Dipilih</h1><center>
                            @else
                              @component('Components.Admin.Table.Jadwal', [
                                'matapelajaran' => $data
                              ])
                                  
                              @endcomponent
                            @endif
                          @endif
                        </div>                
                      <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                  </div>
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
            <div class="col-xl-4 col-lg-4 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Kelas</h4>
                    <ul class="box-controls pull-right">
                    <li><a class="box-btn-slide" href="#"></a></li>	
                    </ul>
                </div>
                  <h5 class="nav-link"><i class="fa fa-circle-o text-danger"></i>{{ $kelas->kd_kelas }} - {{ $kelas->kd_sub_kelas }} ({{ $kelas->Guru->GuruToUser->name }})</h5>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box">
                <div class="box-header with-border">
                <h4 class="box-title">Mata Pelajaran</h4>
                <ul class="box-controls pull-right">
                    <li><a class="box-btn-slide" href="#"></a></li>	
                </ul>
                </div>
                <div class="box-body no-padding mailbox-nav">
                  <div class="container">
                    <form action="{{ route('admin.master.jadwal.store', Request::segment(4)) }}" method="post">
                      <br>
                        @csrf
                        <div class="form-group">
                          <label for="hari">Pilih Hari</label>
                          <select name="hari" class="form-control {{ Request::segment(5) != null ? '' : 'select2' }}" readonly>
                            <option value="">Pilih Hari</option>
                            <option {{ Request::segment(5) == 'senin' ? 'selected' : '' }} value="Senin">Senin</option>
                            <option {{ Request::segment(5) == 'selasa' ? 'selected' : '' }} value="Selasa">Selasa</option>
                            <option {{ Request::segment(5) == 'rabu' ? 'selected' : '' }} value="Rabu">Rabu</option>
                            <option {{ Request::segment(5) == 'kamis' ? 'selected' : '' }} value="Kamis">Kamis</option>
                            <option {{ Request::segment(5) == 'jumat' ? 'selected' : '' }} value="Jumat">Jumat</option>
                            <option {{ Request::segment(5) == 'sabtu' ? 'selected' : '' }} value="Sabtu">Sabtu</option>
                          </select>
                        </div>
                        {!! Form::hidden('kd_kelas_sub_jur', Request::segment(4)) !!}
                        <label for="pilihmapel">Pilih Mata Pelajaran</label><br>
                          @foreach ($mapels as $mapel)
                          <div class="form-group">
                            <input type="checkbox" id="{{ $mapel->kd_mapel }}" name="kd_mapels[]" value="{{ $mapel->kd_mapel }}">
                            <label for="{{ $mapel->kd_mapel }}"> {{ $mapel->nama_mapel }}</label><br>
                          </div>
                          <div class="form-group" id="pilihguru{{ $mapel->kd_mapel }}" style="display: none;">
                            <select class="form-control select2">
                              <option value="">ASd</option>
                            </select>
                          </div>
                          @endforeach
                        <div class="from-group" style="margin-bottom: 10px">
                        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </form>
                  </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
      </section>
      <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->
@endsection
@section('js')
<!-- Vendor JS -->
<script src="{{ asset('v1/js/vendors.min.js') }}"></script>
<script src="{{ asset('v1/js/pages/chat-popup.js') }}"></script>
<script src="{{ asset('v1/icons/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('v1/vendor_plugins/iCheck/icheck.js') }}"></script>
<script src="{{ asset('v1/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script src="{{ asset('v1/js/pages/mailbox.js') }}"></script>
<script src="{{ asset('v1/js/pages/form-compose.js') }}"></script>

<!-- EduAdmin App -->
<script src="{{ asset('v1/js/template.js') }}"></script>
<script src="{{ asset('v1/vendor_components/select2/dist/js/select2.full.js') }}"></script>

<script>
  $('.select2').select2();
</script>
<script>

$('input[type=checkbox]').change(function () {
    if ($(this).is(':checked')) {
      $.getJSON("/admin/master/mapel/mapping/guruMapels/"+ $(this).val(), function(jsonData){
            select = '<select name="position" class="form-control input-sm " required id="position" >';
              $.each(jsonData, function(i,data)
              {
                console.log(data)
                select +='<option value="'+data.position_id+'">'+data.name+'</option>';
              });
            select += '</select>';
            $("#position").html(select);
            console.log(jsonData)
        });
    }else{
      alert('test123')
    }
  
});

</script>
@endsection