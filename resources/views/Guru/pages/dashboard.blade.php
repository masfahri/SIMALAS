@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row align-items-end">
                <div class="col-xl-9 col-12">
                    <div class="box bg-primary-light pull-up">
                        <div class="box-body p-xl-0">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-3"><img
                                        src="https://www.multipurposethemes.com/admin/eduadmin-template/images/svg-icon/color-svg/custom-14.svg"
                                        alt=""></div>
                                <div class="col-12 col-lg-9">
                                    <h2>Hello {{ auth()->user()->name }}, Welcome Back!</h2>
                                    <p class="text-dark mb-0 font-size-16">
                                        Your course Overcoming the fear of public speaking was completed by 11 New users
                                        this week!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-12">
                    <div class="box bg-transparent no-shadow">
                        <div class="box-body p-xl-0 text-center">
                            <h3 class="px-30 mb-20">Have More<br>knoledge to share?</h3>
                            <button type="button" class="waves-effect waves-light btn-block btn btn-primary"><i
                                    class="fa fa-plus mr-15"></i> Cheate New Course</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="box no-shadow mb-0 bg-transparent">
                        <div class="box-header no-border px-0">
                            <h4 class="box-title">Your Courses</h4>
                            <ul class="box-controls pull-right d-md-flex d-none">
                                <li>
                                    <button class="btn btn-primary-light px-10">View All</button>
                                </li>
                                <li class="dropdown">
                                    <button class="dropdown-toggle btn btn-primary-light px-10" data-toggle="dropdown"
                                        href="#" aria-expanded="false">Most Popular</button>
                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                        <a class="dropdown-item active" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Yesterday</a>
                                        <a class="dropdown-item" href="#">Last week</a>
                                        <a class="dropdown-item" href="#">Last month</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="box bg-secondary-light pull-up"
                        style="background-image: url(https://www.multipurposethemes.com/admin/eduadmin-template/images/svg-icon/color-svg/st-1.svg); background-position: right bottom; background-repeat: no-repeat;">
                        <div class="box-body">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center pr-2 justify-content-between">
                                    <div class="d-flex">
                                        <span class="badge badge-primary mr-15">Active</span>
                                        <span class="badge badge-primary mr-5"><i class="fa fa-lock"></i></span>
                                        <span class="badge badge-primary"><i class="fa fa-clock-o"></i></span>
                                    </div>
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#" class="px-10 pt-5"><i
                                                class="ti-more-alt"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                            <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                            <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mt-25 mb-5">It & software</h4>
                                <p class="text-fade mb-0 font-size-12">45 Days Left</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="box bg-secondary-light pull-up"
                        style="background-image: url(https://www.multipurposethemes.com/admin/eduadmin-template/images/svg-icon/color-svg/st-2.svg); background-position: right bottom; background-repeat: no-repeat;">
                        <div class="box-body">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center pr-2 justify-content-between">
                                    <div class="d-flex">
                                        <span class="badge badge-dark mr-15">Finished</span>
                                    </div>
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#" class="px-10 pt-5"><i
                                                class="ti-more-alt"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                            <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                            <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mt-25 mb-5">Programming</h4>
                                <p class="text-fade mb-0 font-size-12">1 Days Left</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="box bg-secondary-light pull-up"
                        style="background-image: url(https://www.multipurposethemes.com/admin/eduadmin-template/images/svg-icon/color-svg/st-3.svg); background-position: right bottom; background-repeat: no-repeat;">
                        <div class="box-body">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center pr-2 justify-content-between">
                                    <div class="d-flex">
                                        <span class="badge badge-primary mr-15">Active</span>
                                        <span class="badge badge-primary mr-5"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#" class="px-10 pt-5"><i
                                                class="ti-more-alt"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                            <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                            <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mt-25 mb-5">Networking</h4>
                                <p class="text-fade mb-0 font-size-12">15 days Left</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-12">
                    <div class="box bg-secondary-light pull-up"
                        style="background-image: url(https://www.multipurposethemes.com/admin/eduadmin-template/images/svg-icon/color-svg/st-4.svg); background-position: right bottom; background-repeat: no-repeat;">
                        <div class="box-body">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center pr-2 justify-content-between">
                                    <div class="d-flex">
                                        <span class="badge badge-warning-light mr-15">Paused</span>
                                        <span class="badge badge-warning-light mr-5"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#" class="px-10 pt-5"><i
                                                class="ti-more-alt"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                            <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                            <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mt-25 mb-5">Network Security</h4>
                                <p class="text-fade mb-0 font-size-12">21 Days Left</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Jadwal {{ Request::segment(3) == null ? Carbon\Carbon::now()->isoFormat('dddd') : Request::segment(3) }}</h4>
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
                                        <button type="button"
                                            class="btn btn-primary btn-sm {{ Request::segment(3) || strtolower(Carbon\Carbon::now()->isoFormat('dddd')) == 'senin' ? 'active' : '' }}"><a
                                                href="{{route('guru.jadwal.hari', 'senin')}}"
                                                style="color: white">Senin</a></button>
                                        <button type="button"
                                            class="btn btn-primary btn-sm {{ Request::segment(3) || strtolower(Carbon\Carbon::now()->isoFormat('dddd')) == 'selasa' ? 'active' : '' }}"><a
                                                href="{{route('guru.jadwal.hari', 'selasa')}}"
                                                style="color: white">Selasa</a></button>
                                        <button type="button"
                                            class="btn btn-primary btn-sm {{ Request::segment(3) || strtolower(Carbon\Carbon::now()->isoFormat('dddd')) == 'rabu' ? 'active' : '' }}"><a
                                                href="{{route('guru.jadwal.hari', 'rabu')}}"
                                                style="color: white">Rabu</a></button>
                                        <button type="button"
                                            class="btn btn-primary btn-sm {{ Request::segment(3) || strtolower(Carbon\Carbon::now()->isoFormat('dddd')) == 'kamis' ? 'active' : '' }}"><a
                                                href="{{route('guru.jadwal.hari', 'kamis')}}"
                                                style="color: white">Kamis</a></button>
                                        <button type="button"
                                            class="btn btn-primary btn-sm {{ Request::segment(3) || strtolower(Carbon\Carbon::now()->isoFormat('dddd')) == 'jumat' ? 'active' : '' }}"><a
                                                href="{{route('guru.jadwal.hari', 'jumat')}}"
                                                style="color: white">Jumat</a></button>
                                    </div>
                                </div>
                            </div>
                            <div class="mailbox-messages inbox-bx">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <tbody>
                                            <tr>
                                                <td><h4>Kelas</h4></td>
                                                <td></td>
                                                <td><h4>Mata Pelajaran</h4></td>
                                                <td></td>
                                                <td>Aksi</td>
                                            </tr>
                                            @forelse ($data as $items)
                                                @forelse ($items->Jadwal as $item)
                                                <tr>
                                                    <td>
                                                        <p class="mailbox-name mb-0 font-size-16 font-weight-600">
                                                            {{$item->Kelas->kd_kelas.'-'.$item->Kelas->kd_sub_kelas}}</p>
                                                    </td>
                                                    <td class="mailbox-star"><a href="#"><i
                                                                class="fa fa-star text-yellow"></i></a></td>
                                                    <td>
                                                        <p class="mailbox-name mb-0 font-size-16 font-weight-600">
                                                            {{$item->Mapel->MataPelajaran->nama_mapel}}</p>
                                                            <span></span>
                                                    </td>
                                                    <td class="mailbox-attachment"></td>
                                                    <td class="mailbox-date">
                                                        <a href="{{route('guru.materi.show', [$item->Kelas->kd_kelas, $item->kd_mapels])}}">Materi</a>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="5">
                                                        <center><h1>Kamu tidak ada Jadwal disini, Selamat beristirahat</h1></center>
                                                    </td>
                                                </tr>
                                                @endforelse
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
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

<script src="{{ asset('v1/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
<script src="{{ asset('v1/vendor_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('v1/vendor_components/fullcalendar/fullcalendar.js') }}"></script>

<!-- EduAdmin App -->
<script src="{{ asset('v1/js/template.js') }}"></script>
<script src="{{ asset('v1/js/pages/dashboard3.js') }}"></script>
<script src="{{ asset('v1/js/pages/calendar.js') }}"></script>

@endsection
