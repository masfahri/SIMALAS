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
                            <h4 class="box-title">{{$pageTitle}}</h4>
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
                                <button type="button" class="btn btn-primary btn-sm checkbox-toggle"><i
                                        class="ion ion-android-checkbox-outline-blank"></i>
                                </button>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm"><i
                                                class="fa fa-chevron-left"></i></button>
                                        <button type="button" class="btn btn-primary btn-sm"><i
                                                class="fa fa-chevron-right"></i></button>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                                <!-- /.pull-right -->
                            </div>
                            <div class="mailbox-messages inbox-bx">
                                <div class="table-responsive">

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
                            <h4 class="box-title">Master Materi</h4>
                            <ul class="box-controls pull-right">
                                <li><a class="box-btn-slide" href="#"></a></li>
                            </ul>
                        </div><br>
                        <div class="box-body no-padding mailbox-nav">
                            <div class="container">
                                <form action="{{route('guru.materi.store')}}" method="post">
                                    @csrf
                                    {!! Form::hidden('kd_guru_mapel', Request::segment(5), null) !!}
                                    {!! Form::hidden('kd_kelas', Request::segment(4), null) !!}
                                    <div class="form-group">
                                        <h5>Judul Materi <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            {!! Form::text('judul_materi', '', ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Deskripsi Materi <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            {!! Form::textarea('deskripsi_materi', '', ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <input type="submit" value="Simpan" class="btn btn-primary float-right">
                                </form>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
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
