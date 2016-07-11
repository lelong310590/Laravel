@extends('dashboard.modules.main')
@section('title', 'Thêm tin tức mới')
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
        <form role="form" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <div class="col-lg-9 col-xs-12">
              <section class="panel">
                  <header class="panel-heading">
                      <b>Thêm bài viết</b>
                  </header>
                  <div class="panel-body">
                      <div class="form-group">
                          <label>Tiêu đề</label>
                          <input type="text" class="form-control" id="inputTitle" placeholder="" name="inputTitle" value="{!! old('inputTitle') !!}">
                      </div>
                       <div class="form-group">
                          <label>Chuỗi cho đường dẫn tĩnh</label>
                          <input type="text" class="form-control" id="inputSlug" placeholder="" name="inputSlug" value="{!! old('inputSlug') !!}">
                      </div>
                      <div class="form-group">
                          <label>Nội dung</label>
                            <textarea class="form-control ckeditor" name="inputContent" rows="6"></textarea>
                      </div>
                  </div>
              </section>

              <section class="panel">
                  <header class="panel-heading">
                      <b>SEO</b>
                  </header>
                  <div class="panel-body">
                      <div class="form-group">
                          <label>Tiêu đề SEO</label>
                          <input type="text" class="form-control" placeholder="" name="inputSeoTitle" value="{!! old('inputSeoTitle') !!}">
                      </div>
                      <div class="form-group">
                          <label>Từ khóa chính</label>
                          <input type="text" class="form-control" placeholder="" name="inputKeyword" value="{!! old('inputKeyWord') !!}">
                      </div>
                      <div class="form-group">
                          <label>- Thẻ miêu tả</label>
                          <textarea name="" id="input" class="form-control" rows="3" name="inputMetaDesc" value="{!! old('inputMetaDesc') !!}"></textarea>
                      </div>
                  </div>
              </section>

              <section class="panel hidden">
                  <header class="panel-heading">
                      <b>Snippet Preview</b>
                  </header>
                  <div class="panel-body">
                      
                  </div>
              </section>
          </div>

          <div class="col-lg-3 col-xs-12">
              <section class="panel">
                  <header class="panel-heading">
                      <b>Đăng bài viết</b>
                  </header>
                  <div class="panel-body">
                      <div class="form-group">
                          <label for="inputSuccess"><i class="icon-key"></i> Trạng thái bài viết</label>
                          <div class="radio">
                              <label>
                                  <input type="radio" name="inputStatus" id="" value="public" checked>
                                  Xuất bản
                              </label>
                          </div>
                          <div class="radio">
                              <label>
                                  <input type="radio" name="inputStatus" id="" value="draft">
                                 Lưu nháp
                              </label>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-info pull-right">Đăng bài viết</button>
                  </div>
              </section>
              <section class="panel">
                  <header class="panel-heading">
                      <b>Chuyên mục</b>
                  </header>
                  <div class="panel-body" style="height:250px; overflow-y: scroll">
                      <?php recursivePostCategory($cat, 0, '') ?>
                  </div>
              </section>

              <section class="panel hidden">
                  <header class="panel-heading">
                      <b>Thẻ Tags</b>
                      <span class="tools pull-right">
                        <a class="icon-chevron-down" href="javascript:;"></a>
                    </span>
                  </header>
                  <div class="panel-body">
                      <input name="inputTags" id="tagsinput" class="tagsinput" value="{!! old('inputTags') !!}" />
                  </div>
              </section>

              <section class="panel">
                  <header class="panel-heading">
                      <b>Ảnh đại diện</b>
                  </header>
                  <div class="panel-body">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 100%; height: 150px; margin: 0 auto 30px">
                          <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="width: 100%; max-height: 150px; line-height: 20px; margin: 0 auto 30px"></div>
                      <div>
                         <span class="btn btn-white btn-file">
                         <span class="fileupload-new"><i class="icon-paper-clip"></i> Chọn ảnh</span>
                         <span class="fileupload-exists"><i class="icon-undo"></i> Đổi ảnh khác</span>
                         <input type="file" class="default" name="inputFeaturedImage" />
                         </span>
                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Bỏ ảnh này</a>
                      </div>
                    </div>
                    <br>
                    <span class="label label-danger">Chú ý !</span>
                    <span>Tính năng upload ảnh này chỉ hiển thị tốt nhất trên các trình duyệt FireFox, Goolge Chrome và Internet Explorer từ bản 10 trở lên.</span>
                  </div>
              </section>
          </div>

        </form>
      </div>
      <!-- page end-->
  </section>
</section>
@endsection