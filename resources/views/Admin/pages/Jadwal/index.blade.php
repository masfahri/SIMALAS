@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-xl-8 col-12">
                <div class="box">
                  <div class="box-header with-border">
                    <h4 class="box-title">Kelas</h4>
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
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm"><i class="ion ion-trash-a"></i></button>
                        <button type="button" class="btn btn-primary btn-sm"><i class="ion ion-reply"></i></button>
                        <button type="button" class="btn btn-primary btn-sm"><i class="ion ion-share"></i></button>
                      </div>
                      <!-- /.btn-group -->
                      <div class="btn-group">
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="ion ion-flag margin-r-5"></i>
                            <span class="caret"></span>
                          </button>
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                        </div>
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="ion ion-folder margin-r-5"></i>
                            <span class="caret"></span>
                          </button>
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                        </div>
                      </div>
                      <!-- /.btn-group -->
                      <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i></button>
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
                          <table class="table table-hover table-striped">
                            <tbody>
                            <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                              <td>
                                  <p class="mailbox-name mb-0 font-size-16 font-weight-600">Johen Doe</p>
                                  <a class="mailbox-subject" href="#"><b>Lorem Ipsum</b> - There are many variations of Ipsum available...</a>
                              </td>
                              <td class="mailbox-attachment"></td>
                              <td class="mailbox-date">2:45 PM</td>
                            </tr>
                            <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                              <td>
                                  <p class="mailbox-name mb-0 font-size-16 font-weight-600">Johen Doe</p>
                                  <a class="mailbox-subject" href="#"><b>Lorem Ipsum</b> - There are many variations of Ipsum available...</a>
                              </td>
                              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                              <td class="mailbox-date">2:45 PM</td>
                            </tr>
                            <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                              <td>
                                  <p class="mailbox-name mb-0 font-size-16 font-weight-600">Johen Doe</p>
                                  <a class="mailbox-subject" href="#"><b>Lorem Ipsum</b> - There are many variations of Ipsum available...</a>
                              </td>
                              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                              <td class="mailbox-date">2:45 PM</td>

                            </tr>
                            <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                              <td>
                                  <p class="mailbox-name mb-0 font-size-16 font-weight-600">Johen Doe</p>
                                  <a class="mailbox-subject" href="#"><b>Lorem Ipsum</b> - There are many variations of Ipsum available...</a>
                              </td>
                              <td class="mailbox-attachment"></td>
                              <td class="mailbox-date">2:45 PM</td>
                            </tr>
                           <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                              <td>
                                  <p class="mailbox-name mb-0 font-size-16 font-weight-600">Johen Doe</p>
                                  <a class="mailbox-subject" href="#"><b>Lorem Ipsum</b> - There are many variations of Ipsum available...</a>
                              </td>
                              <td class="mailbox-attachment"></td>
                              <td class="mailbox-date">2:45 PM</td>
                            </tr>
                            <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                              <td>
                                  <p class="mailbox-name mb-0 font-size-16 font-weight-600">Johen Doe</p>
                                  <a class="mailbox-subject" href="#"><b>Lorem Ipsum</b> - There are many variations of Ipsum available...</a>
                              </td>
                              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                              <td class="mailbox-date">2:45 PM</td>
                            </tr>
                            <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                              <td>
                                  <p class="mailbox-name mb-0 font-size-16 font-weight-600">Johen Doe</p>
                                  <a class="mailbox-subject" href="#"><b>Lorem Ipsum</b> - There are many variations of Ipsum available...</a>
                              </td>
                              <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>

                              <td class="mailbox-date">2:45 PM</td>
                            </tr>
                            <tr>
                              <td><input type="checkbox"></td>
                              <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                              <td>
                                  <p class="mailbox-name mb-0 font-size-16 font-weight-600">Johen Doe</p>
                                  <a class="mailbox-subject" href="#"><b>Lorem Ipsum</b> - There are many variations of Ipsum available...</a>
                              </td>
                              <td class="mailbox-attachment"></td>
                              <td class="mailbox-date">2:45 PM</td>
                            </tr>
                            </tbody>
                          </table>
                        </div>                
                      <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <div class="mailbox-controls">
                      <!-- Check all button -->
                      <button type="button" class="btn btn-primary btn-sm checkbox-toggle"><i class="ion ion-android-checkbox-outline-blank"></i>
                      </button>
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm"><i class="ion ion-trash-a"></i></button>
                        <button type="button" class="btn btn-primary btn-sm"><i class="ion ion-reply"></i></button>
                        <button type="button" class="btn btn-primary btn-sm"><i class="ion ion-share"></i></button>
                      </div>
                      <!-- /.btn-group -->
                      <div class="btn-group">
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="ion ion-flag margin-r-5"></i>
                            <span class="caret"></span>
                          </button>
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                        </div>
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="ion ion-folder margin-r-5"></i>
                            <span class="caret"></span>
                          </button>
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                        </div>
                      </div>
                      <!-- /.btn-group -->
                      <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i></button>
                      <div class="pull-right">
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-chevron-left"></i></button>
                          <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-chevron-right"></i></button>
                        </div>
                        <!-- /.btn-group -->
                      </div>
                      <!-- /.pull-right -->
                    </div>
                  </div>
                </div>
                <!-- /. box -->
              </div>
              <!-- /.col -->

              <div class="col-xl-4 col-12">
                <div class="box">
                  <div class="box-header with-border">
                    <h4 class="box-title">Kelas</h4>
                    <ul class="box-controls pull-right">
                      <li><a class="box-btn-slide" href="#"></a></li>	
                    </ul>
                  </div>
                  <div class="box-body no-padding mailbox-nav">
                    <ul class="nav nav-pills flex-column">
                      <li class="nav-item"><a class="nav-link active" href="javascript:void(0)"><i class="ion ion-ios-email-outline"></i> Inbox
                        <span class="label label-success pull-right">12</span></a></li>
                      <li class="nav-item"><a class="nav-link" href="javascript:void(0)"><i class="ion ion-paper-airplane"></i> Sent</a></li>
                      <li class="nav-item"><a class="nav-link" href="javascript:void(0)"><i class="ion ion-email-unread"></i> Drafts</a></li>
                      <li class="nav-item"><a class="nav-link" href="javascript:void(0)"><i class="ion ion-star"></i>  Starred <span class="label label-warning pull-right">14</span></a>
                      </li>
                      <li class="nav-item"><a class="nav-link" href="javascript:void(0)"><i class="ion ion-trash-a"></i> Trash</a></li>
                    </ul>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /. box -->
                <div class="box">
                  <div class="box-header with-border">
                    <h4 class="box-title">Labels</h4>
                    <ul class="box-controls pull-right">
                      <li><a class="box-btn-slide" href="#"></a></li>	
                    </ul>
                  </div>
                  <div class="box-body no-padding mailbox-nav">
                    <ul class="nav nav-pills flex-column">
                      <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-circle-o text-danger"></i> Important</a></li>
                      <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-circle-o text-warning"></i> Promotions</a></li>
                      <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-circle-o text-info"></i> Social</a></li>
                    </ul>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
                  
                  <div class="contact-bx">
                      <div class="media-list media-list-hover">
                          <div class="media py-10 px-0 align-items-center">
                            <a class="avatar avatar-lg status-success" href="#">
                              <img src="../images/avatar/1.jpg" alt="...">
                            </a>
                            <div class="media-body">
                              <p class="font-size-16">
                                <a href="#">Sarah Kortney</a>
                              </p>
                            </div>
                          </div>

                          <div class="media py-10 px-0 align-items-center">
                            <a class="avatar avatar-lg status-danger" href="#">
                              <img src="../images/avatar/2.jpg" alt="...">
                            </a>
                            <div class="media-body">
                              <p class="font-size-16">
                                <a href="#">Tommy Nash</a>
                              </p>
                            </div>
                          </div>

                          <div class="media py-10 px-0 align-items-center">
                            <a class="avatar avatar-lg status-warning" href="#">
                              <img src="../images/avatar/3.jpg" alt="...">
                            </a>
                            <div class="media-body">
                              <p class="font-size-16">
                                <a href="#">Kathryn Mengel</a>
                              </p>
                            </div>
                          </div>

                          <div class="media py-10 px-0 align-items-center">
                            <a class="avatar avatar-lg status-primary" href="#">
                              <img src="../images/avatar/4.jpg" alt="...">
                            </a>
                            <div class="media-body">
                              <p class="font-size-16">
                                <a href="#">Mayra Sibley</a>
                              </p>
                            </div>
                          </div>			

                          <div class="media py-10 px-0 align-items-center">
                            <a class="avatar avatar-lg status-success" href="#">
                              <img src="../images/avatar/1.jpg" alt="...">
                            </a>
                            <div class="media-body">
                              <p class="font-size-16">
                                <a href="#">Tommy Nash</a>
                              </p>
                            </div>
                          </div>

                          <div class="media py-10 px-0 align-items-center">
                            <a class="avatar avatar-lg status-danger" href="#">
                              <img src="../images/avatar/2.jpg" alt="...">
                            </a>
                            <div class="media-body">
                              <p class="font-size-16">
                                <a href="#">Williemae Lagasse</a>
                              </p>
                            </div>
                          </div>
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
	<script src="{{ asset('v1/vendor_plugins/iCheck/icheck.js') }}"></script>
	<script src="{{ asset('v1/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
	<script src="{{ asset('v1/js/pages/mailbox.js') }}"></script>
	<script src="{{ asset('v1/js/pages/form-compose.js') }}"></script>
	
	<!-- EduAdmin App -->
	<script src="{{ asset('v1/js/template.js') }}"></script>
@endsection