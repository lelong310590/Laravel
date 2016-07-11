@extends('dashboard.master')
@section('title', 'Thêm mới tài khoản')
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
                    Thêm tài khoản mới
                </header>
                <div class="panel-body">
                    @include('dashboard.globalMessages.error')
                    <form role="form" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                          <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="inputLoginName">Tên đăng nhập</label>
                                <input type="text" class="form-control" id="inputLoginName" placeholder="VD: username01" name="inputLoginName" value="{!! old('inputLoginName') !!}">
                            </div>
                            <div class="form-group">
                                <label for="inputLoginEmail">Email address</label>
                                <input type="email" class="form-control" id="inputLoginEmail" placeholder="VD: abc@gmail.com" name="inputLoginEmail" value="{!! old('inputLoginEmail') !!}">
                            </div>
                            <div class="form-group">
                                <label for="inputSuccess">Cấp độ tài khoản</label>
                                <select class="form-control m-bot15" name="inputLoginLevel">
                                    <option value="0">Administrator</option>
                                    <option value="1">Modarator</option>
                                    <option value="2">Editor</option>
                                    <option value="3">Member</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputLoginPassword">Mật khẩu</label>
                                <input type="password" class="form-control" id="inputLoginPassword" placeholder="Mật khẩu từ 6 - 30 ký tự" name="inputLoginPassword">
                            </div>
                            <div class="form-group">
                                <label for="inputLoginRePassword">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" id="inputLoginRePassword" placeholder="Mật khẩu từ 6 - 30 ký tự" name="inputLoginRePassword">
                            </div>
                          </div>

                          <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="inputLoginName">Họ và tên</label>
                                <input type="text" class="form-control" name="inputLoginRealName" placeholder="VD: Lê Ngọc Long" value="{!! old('inputLoginRealName') !!}">
                            </div>
                            <div class="form-group">
                                <label for="inputLoginName">Số điện thoại</label>
                                <input type="tel" class="form-control" name="inputLoginTel" placeholder="VD: 01282236969" value="{!! old('inputLoginTel') !!}">
                            </div>
                            <div class="form-group">
                                <label for="inputLoginName">Địa chỉ</label>
                                <input type="text" class="form-control" name="inputLoginAddress" placeholder="VD: 11/215/143 - Nguyễn Chính" value="{!! old('inputLoginAddress') !!}">
                            </div>
                            <div class="form-group">
                                <label for="inputLoginName">Tài khoản mạng xã hội</label>
                                <input type="text" class="form-control" name="inputLoginSocial" placeholder="VD: https://www.facebook.com/train.heartnet.180072" value="{!! old ('inputLoginSocial') !!}">
                            </div>
                          </div>

                        </div>
                        <button type="submit" class="btn btn-info">Tạo tài khoản</button>
                    </form>

                </div>
            </section>
        </div>
      </div>
      <!-- page end-->
  </section>
</section>
@endsection