@extends('dashboard.modules.main')
@section('title', 'Sửa thẻ')
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
                    <b>Sửa Thẻ</b>
                </header>
                <div class="panel-body">
                  @include('dashboard.globalMessages.error')
                  @include('dashboard.globalMessages.flash')
                  <form class="form-horizontal tasi-form" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="tagsId" value="{!! $tags['id'] !!}">
                      <div class="form-group">
                          <label class="col-sm-2 control-label"><b>Tên thẻ</b></label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" value="{!! $tags['tags_name'] !!}" name="inputTagsName">
                              <i>Tên riêng sẽ hiển thị trên trang mạng của bạn.</i>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label"><b>Chuỗi cho đường dẫn tĩnh</b></label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" value="{!! $tags['tags_slug'] !!}" name="inputTagsSlug">
                              <i>Chuỗi cho đường dẫn tĩnh là phiên bản của tên hợp chuẩn với Đường dẫn (URL). Chuỗi này bao gồm chữ cái thường, số và dấu gạch ngang (-).</i>
                          </div>
                      </div>

                      <button type="submit" class="btn btn-info"><i class="icon-save"></i> Sửa Thẻ</button>
                  </form>
                </div>
            </section>
        </div>
      </div>
      <!-- page end-->
  </section>
</section>

@endsection