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
                    <h4 class="box-title">Jadwal</h4>
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
                          <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-chevron-left"></i></button>
                          <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-chevron-right"></i></button>
                        </div>
                        <!-- /.btn-group -->
                      </div>
                      <!-- /.pull-right -->
                    </div>
                    <div class="mailbox-messages inbox-bx">
                        <div class="table-responsive">
                          <center><h1>Mohon Pilih Kelas</h1><center>
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
                <div class="box-body no-padding mailbox-nav">
                    <ul class="nav nav-pills flex-column">
                        @foreach ($kelas as $item)
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" data-target="#{{ $item->kd_kelas }}"><i class="fa fa-circle-o text-danger"></i>{{ $item->kd_kelas }}</a>
                            <div id="{{ $item->kd_kelas }}" class="collapse">
                              <ul>
                                @foreach ($item->KelasSubJurusan as $items)
                                <li><a href="{{ route('admin.master.jadwal.kelas', $items->id) }}">{{ $items->kd_kelas }} - {{ $items->kd_sub_kelas }}</a></li>
                                @endforeach
                              </ul>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box">
                <div class="box-header with-border">
                <h4 class="box-title">Folders</h4>
                <ul class="box-controls pull-right">
                    <li><a class="box-btn-slide" href="#"></a></li>	
                </ul>
                </div>
                <div class="box-body no-padding mailbox-nav">
                <ul class="nav nav-pills flex-column">
                  @foreach ($mapels as $mapel)
                  <li class="nav-item"><a class="nav-link active" href="javascript:void(0)"><i class="ion ion-ios-email-outline"></i> Inbox
                  @endforeach
                </ul>
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
@endsection