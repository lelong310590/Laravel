@extends('dashboard.master')
@section('title', 'Sửa tài khoản')
@section('content')
<section id="main-content">
  <section class="wrapper">
      <!-- page start-->
      <div class="row">
          <div class="col-lg-12">
              <!--breadcrumbs start -->
              <ul class="breadcrumb">
                  <li><a href="#"><i class="icon-home"></i> Home</a></li>
                  <li><a href="#">Library</a></li>
                  <li class="active">Data</li>
              </ul>
              <!--breadcrumbs end -->
          </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa tài khoản
                </header>
                <div class="panel-body">
                    @include('dashboard.globalMessages.error')
                    @include('dashboard.globalMessages.flash')
                    <form role="form" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                          <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input type="text" class="form-control" id="inputEditName" disabled value="{!! $selectedAccount['user_login'] !!}">
                            </div>
                            <div class="form-group">
                                <label for="inputEditEmail">Email address</label>
                                <input type="email" class="form-control" id="inputEditEmail" name="inputEditEmail" value={!! $selectedAccount['user_email'] !!}>
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess">Cấp độ tài khoản</label>
                                <select class="form-control m-bot15" <?php echo ($selectedAccount['id'] == 1)? 'disabled' : 'name="inputEditLevel"' ?>>
                                    <option value="0" <?php if ($selectedAccount['user_level'] == 0) echo 'selected' ?>>Administrator</option>
                                    <option value="1" <?php if ($selectedAccount['user_level'] == 1) echo 'selected' ?>>Modarator</option>
                                    <option value="2" <?php if ($selectedAccount['user_level'] == 2) echo 'selected' ?>>Editor</option>
                                    <option value="3" <?php if ($selectedAccount['user_level'] == 3) echo 'selected' ?>>Member</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputEditPassword">Mật khẩu mới</label>
                                <input type="password" class="form-control" id="inputEditPassword" placeholder="Mật khẩu từ 6 - 30 ký tự" name="inputEditPassword">
                            </div>
                            <div class="form-group">
                                <label for="inputEditRePassword">Nhập lại mật khẩu mới</label>
                                <input type="password" class="form-control" id="inputEditRePassword" placeholder="******" name="inputEditRePassword">
                            </div>
                          </div>

                          <div class="col-xs-12 col-md-6">
                            <?php $user_info = json_decode($selectedAccount['user_info'] , true) ?>
                          	<div class="form-group">
                                <label>Họ và tên</label>
                                <input type="text" class="form-control" name="inputEditName" value="{!! $user_info['user_realname'] !!}">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="tel" class="form-control" name="inputEditTel" value="{!! $user_info['user_tel'] !!}">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="inputEditAddress" value="{!! $user_info['user_address'] !!}">
                            </div>
                            <div class="form-group m-bot15">
                                <label>Tài khoản mạng xã hội</label>
                                <input type="text" class="form-control" name="inputEditSocial" value="{!! $user_info['user_social'] !!}">
                            </div>

                            @if ($selectedAccount['id'] != 1 )
                            <div class="form-group">
                                <label class="m-bot10">Trạng thái tài khoản</label>
                                <div class="row m-bot15">
                                    <div class="col-sm-6">
                                        <div class="switch switch-square"
                                             data-on-label="<i class=' icon-ok'></i>"
                                             data-off-label="<i class='icon-remove'></i>">
                                            <input type="checkbox" <?php echo ($selectedAccount['user_status'] == 1)? 'checked' : ''  ?> name="inputEditStatus"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                          </div>

                        </div>
                        <button type="submit" class="btn btn-info">Cập nhật tài khoản</button>
                    </form>

                </div>
            </section>
        </div>
      </div>
      <!-- page end-->
  </section>
</section>
@endsection