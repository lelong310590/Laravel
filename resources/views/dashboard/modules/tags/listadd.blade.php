@extends('dashboard.modules.main')
@section('title', 'Thêm thẻ Tags mới')
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
                    <b>Thêm thẻ Tags mới</b>
                </header>
                <div class="panel-body">
                	<div class="row">
                		<div class="col-xs-12 col-md-4">
		                    @include('dashboard.globalMessages.error')
		                    @include('dashboard.globalMessages.flash')
		                    <form role="form" method="POST" action="{!! route('postAddTags') !!}">
		                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                        <div class="row">
		                          <div class="col-xs-12">
		                            <div class="form-group">
		                                <label>Tên</label>
		                                <input type="text" class="form-control" name="inputTagsName" required value="{!! old('inputTagsName') !!}">
		                                <i>Tên riêng sẽ hiển thị trên trang mạng của bạn.</i>
		                            </div>
		                            <div class="form-group">
		                                <label>Chuỗi cho đường dẫn tĩnh</label>
		                                <input type="text" class="form-control" name="inputTagsSlug" value={!! old('inputTagsSlug') !!}>
		                                <i>Chuỗi cho đường dẫn tĩnh là phiên bản của tên hợp chuẩn với Đường dẫn (URL). Chuỗi này bao gồm chữ cái thường, số và dấu gạch ngang (-).</i>
		                            </div>
		                          </div>
		                        </div>
		                        <button type="submit" class="btn btn-primary">Thêm thẻ</button>
		                    </form>
                		</div>
                		<div class="col-xs-12 col-md-8">
                      <form method="POST" action="{!! route('postDeleteMultiTags') !!}" role="form">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <a class="btn btn-danger" id="deleteAll" href="#selectEmpty" data-toggle="modal"><i class="icon-trash"></i> Xóa</a>

                         <div class="modal fade" id="selectEmpty">
                           <div class="modal-dialog">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h4 class="modal-title">Thông báo</h4>
                               </div>
                               <div class="modal-body">
                                  Bạn chưa chọn một thẻ nào để xóa
                               </div>
                               <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
                               </div>
                             </div>
                           </div>
                         </div>

                         <div class="modal fade" id="deleteAllDialog">
                           <div class="modal-dialog">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h4 class="modal-title">Thông báo</h4>
                               </div>
                               <div class="modal-body">
                                  Thẻ bị xóa sẽ không thể khôi phục được, mọi bài viết có gắn thẻ này vẫn sẽ tồn tại.
                               </div>
                               <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
                                 <button type="submit" class="btn btn-primary"><i class="icon-trash"></i> Đồng ý xóa</button>
                               </div>
                             </div>
                           </div>
                         </div>

                			   <table class="table table-striped table-advance table-hover">
                          <thead>
                          <tr>
                              <th width="20px"><input type="checkbox" id="checkAllCategory"/></th>
                              <th><i class="icon-bullhorn"></i> Tên</th>
                              <th><i class=" icon-edit"></i> Chuỗi cho đường dẫn tĩnh</th>
                              <th></th>
                          </tr>
                          </thead>
                          <tbody>
                          	@if (!empty($allTags))
	                          	@foreach($allTags as $tags)
	                            <tr>
	                            	<td><input type="checkbox" class="checkCategory" name="tagsArray[]" value="{!! $tags['id'] !!}"/></td>
	                            	<td><a href="{!! route('getEditTags', $tags['id'])  !!}">{!! $tags['tags_name'] !!}</a></td>
	                            	<td>{!! $tags['tags_slug'] !!}</td>
	                            	<td>
	                            		<a href="{!! route('getEditTags', $tags['id'])  !!}" class="btn btn-primary btn-xs"><i class="icon-pencil"></i> Sửa</a>
	                            		<a href="{!! route('getDeleteSingleTag', $tags['id']) !!}" class="btn btn-danger btn-xs"><i class="icon-trash"></i> Xóa</a>
	                            	</td>
	                            </tr>
	                            @endforeach
	                        @else
								<tr>
									<td colspan="4">Chưa có thẻ Tags nào được tạo</td>
								</tr>
	                        @endif
                          </tbody>
                        </table>
                        <div class="text-center">
                        </div>
                      </form>
                		</div>
                	</div>
                </div>
            </section>
        </div>
      </div>
      <!-- page end-->
  </section>
</section>
@endsection