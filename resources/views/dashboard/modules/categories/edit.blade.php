@extends('dashboard.modules.main')
@section('title', 'Sửa chuyên mục')
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
                    <b>Sửa chuyên mục</b>
                </header>
                <div class="panel-body">
                  @include('dashboard.globalMessages.error')
                  @include('dashboard.globalMessages.flash')
                  <form class="form-horizontal tasi-form" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="categoryId" value="{{ $cat['id'] }}">
                      <div class="form-group">
                          <label class="col-sm-2 control-label"><b>Tên chuyên mục</b></label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" value="{!! $cat['category_name'] !!}" name="inputCategoryName">
                              <i>Tên riêng sẽ hiển thị trên trang mạng của bạn.</i>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label"><b>Chuỗi cho đường dẫn tĩnh</b></label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" value="{!! $cat['category_slug'] !!}" name="inputCategorySlug">
                              <i>Chuỗi cho đường dẫn tĩnh là phiên bản của tên hợp chuẩn với Đường dẫn (URL). Chuỗi này bao gồm chữ cái thường, số và dấu gạch ngang (-).</i>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label"><b>Chuyên mục cha</b></label>
                          <div class="col-sm-10">
                            <select class="form-control m-bot15" name="inputCategoryParentId" name="inputCategoryParentId">
                               <option value="0">Không chọn</option>
                               <?php recursiveEditCategory($catData, 0, "", $cat['category_parent'], $cat['id']) ?>
                            </select>
                            <i>Chuyên mục khác với thẻ, bạn có thể sử dụng nhiều cấp chuyên mục. Ví dụ: Trong chuyên mục nhạc, bạn có chuyên mục con là nhạc Pop, nhạc Jazz. Việc này hoàn toàn là tùy theo ý bạn.</i>
                          </div>
          						</div>
                      <h4>SEO</h4>
                      <div class="form-group">
                          <label class="col-sm-2 control-label"><b>- Tiêu đề</b></label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control"  value="{!! $cat['category_seo_title'] !!}" name="inputCategorySeoTitle">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label"><b>- Từ khóa chính</b></label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" value="{!! $cat['category_focus_keyword'] !!}" name="inputCategoryKeyword">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 control-label"><b>- Thẻ miêu tả</b></label>
                          <div class="col-sm-10">
                              <textarea id="input" class="form-control" rows="3" name="inputCategoryMetaDesc" value="{!! $cat['category_meta_description'] !!}">{!! $cat['category_meta_description'] !!}</textarea>
                          </div>
                      </div>

                      <button type="submit" class="btn btn-info"><i class="icon-save"></i> Sửa chuyên mục</button>
                  </form>
                </div>
            </section>
        </div>
      </div>
      <!-- page end-->
  </section>
</section>

@endsection