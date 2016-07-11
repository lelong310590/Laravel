@extends('dashboard.modules.main')
@section('title', 'Chuyên mục')
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
                    <b>Thêm chuyên mục mới</b>
                </header>
                <div class="panel-body">
                	<div class="row">
                		<div class="col-xs-12 col-md-4">
		                    @include('dashboard.globalMessages.error')
		                    @include('dashboard.globalMessages.flash')
		                    <form role="form" method="POST" action="{!! route('postAddCategory') !!}">
		                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <?php $cat = $catData->toArray();  ?>
		                        <div class="row">
		                          <div class="col-xs-12">
		                            <div class="form-group">
		                                <label>Tên chuyên mục</label>
		                                <input type="text" class="form-control" name="inputCategoryName" required value="{!! old('inputCategoryName') !!}">
		                                <i>Tên riêng sẽ hiển thị trên trang mạng của bạn.</i>
		                            </div>
		                            <div class="form-group">
		                                <label>Chuỗi cho đường dẫn tĩnh</label>
		                                <input type="text" class="form-control" name="inputCategorySlug" value={!! old('inputCategorySlug') !!}>
		                                <i>Chuỗi cho đường dẫn tĩnh là phiên bản của tên hợp chuẩn với Đường dẫn (URL). Chuỗi này bao gồm chữ cái thường, số và dấu gạch ngang (-).</i>
		                            </div>
		                            <div class="form-group">
		                                <label for="inputSuccess">Chuyên mục cha</label>
		                                <select class="form-control m-bot15" name="inputCategoryParentId">
                                            <option value="0">Không chọn</option>
                                           <?php
                                            if (Route::is('postSearchCategory')) {
                                                recursiveListCategoryToPost($allCat, $id = 0);
                                            } else {
                                                recursiveListCategoryToPost($cat, $id = 0);
                                            }
                                           ?>
		                                </select>
		                                <i>Chuyên mục khác với thẻ, bạn có thể sử dụng nhiều cấp chuyên mục. Ví dụ: Trong chuyên mục nhạc, bạn có chuyên mục con là nhạc Pop, nhạc Jazz. Việc này hoàn toàn là tùy theo ý bạn.</i>
		                            </div>
                                <h4>SEO</h4>
                                <div class="form-group">
                                    <label>- Tiêu đề</label>
                                    <input type="text" class="form-control" name="inputCategorySeoTitle" value="{!! old('inputCategorySeoTitle') !!}">
                                </div>
                                <div class="form-group">
                                    <label>- Từ khóa chính</label>
                                    <input type="text" class="form-control" name="inputCategoryKeyword" value="{!! old('inputCategoryKeyword') !!}">
                                    <i>Mỗi từ khóa cách nhau bằng dấu ","</i>
                                </div>
                                <div class="form-group">
                                    <label>- Thẻ miêu tả</label>
                                    <textarea name="" id="input" class="form-control" rows="3" name="inputCategoryMetaDesc" value="{!! old('inputCategoryMetaDesc') !!}"></textarea>
                                </div>
		                          </div>
		                        </div>
		                        <button type="submit" class="btn btn-primary">Thêm chuyên mục</button>
		                    </form>
                		</div>
                		<div class="col-xs-12 col-md-8">
                        <form method="POST" action="{!! route('postSearchCategory') !!}" role="form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" class="form-control search pull-right" name="searchCategory" placeholder="Tìm chuyên mục">
                        </form>

                      <form method="POST" action="{!! route('postDelCategory') !!}" role="form">
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
                                  Bạn chưa chọn một danh mục nào để xóa
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
                                  Chuyên mục bị xóa sẽ không thể khôi phục được, mọi bài viết thuộc chuyên mục này sẽ chuyển về chuyên mục <b>Chưa phần loại</b>
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
                                  <th><i class="icon-bullhorn"></i> Tên chuyên mục</th>
                                  <th><i class=" icon-edit"></i> Chuỗi cho đường dẫn tĩnh</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php
                                    if (Route::is('getListAddCategory')) :
                                        recursiveListCategory($cat, $id = 0);
                                    else :
                                        if (!empty($cat)) {
                                            foreach ($cat as $resultItem) {
                                            $id        = $resultItem['id'];
                                            $name      = $resultItem['taxonomy_name'];
                                            $slug      = $resultItem['taxonomy_slug'];
                                            $parent_id = $resultItem['taxonomy_parent'];
                                            echo
                                            '<tr>
                                                <td>';
                                                    if ($id != 1) {
                                                        echo '<input type="checkbox" class="checkCategory" name="catArray[]" value="'.$id.'"/>';
                                                    }
                                            echo
                                            '</td>
                                            <td>';

                                            if ($id != 1) {
                                                echo  '<a href="'.route('getEditCategory', $id).'">'.$name.'</a>';
                                            } else {
                                                echo  '<i class="icon-folder-close"></id> '.$name;
                                            }

                                            echo
                                            '</td>
                                            <td>'.$slug.'</td>
                                            <td>';

                                            if ($id != 1) {
                                                echo
                                                        '<a href="'.route('getEditCategory', $id).'" class="btn btn-primary btn-xs"><i class="icon-pencil"></i> Sửa</a>
                                                       <a class="btn btn-danger btn-xs" data-toggle="modal" href="#modal-del-single-cat-'.$slug.'"><i class="icon-trash"></i> Xóa</a>
                                                        <div class="modal fade" id="modal-del-single-cat-'.$slug.'">
                                                          <div class="modal-dialog">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">Thông báo</h4>
                                                              </div>
                                                              <div class="modal-body">
                                                                Bạn có muốn xóa chuyên mục <b>'.$name.'</b>. Mọi dữ liệu về chuyên mục bị xóa sẽ không thể khôi phục được.
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
                                                                <a href="'.route('getDelSingleCat', $id).'" class="btn btn-primary"><i class="icon-trash"></i> Xóa chuyên mục</a>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>';
                                            }
                                            echo
                                            '</td>
                                              </tr>

                                            ';
                                        }
                                        } else {
                                            echo '<td colspan="4">Không tìm thấy kết quả nào !</td>';
                                        }
                                    endif;
                                ?>
                              </tbody>
                          </table>
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