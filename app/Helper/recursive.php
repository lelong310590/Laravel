<?php 

function recursiveListCategory ($category, $category_parent_id = 0, $lvlStr="") {

	foreach ($category as $cat) {
        $id        = $cat['id'];
        $name      = $cat['taxonomy_name'];
        $slug      = $cat['taxonomy_slug'];
        $parent_id = $cat['taxonomy_parent'];
        if ($parent_id == $category_parent_id) {
			echo '
			  <tr>
                  <td>';
                  if ($id != 1) :
                    echo '<input type="checkbox" class="checkCategory" name="catArray[]" value="'.$id.'"/>';
                  endif;
                  echo 
                  '</td>
                  <td>';

                  if ($id != 1) :
                     echo  '<a href="'.route('getEditCategory', $id).'">'.$lvlStr.$name.'</a>';
                  else: 
                     echo  '<i class="icon-folder-close"></id> '.$name;
                  endif;

                  echo 
                  '</td>
                  <td>'.$slug.'</td>
                  <td>';

                  if ($id != 1) :
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
                  endif;
              echo
                  '</td>
              </tr>
              
			';
			recursiveListCategory ($category, $id, $lvlStr.'— ');
		}
	}
}

function recursiveListCategoryToPost ($category, $category_parent_id = 0, $lvlStr="") {
  foreach ($category as $cat) {
    $id        = $cat["id"];
    $name      = $cat["taxonomy_name"];
    $parent_id = $cat['taxonomy_parent'];

    if ($parent_id == $category_parent_id && $cat['id'] != 1) {
      echo '<option value="'.$id.'">'.$lvlStr.$name.'</option>';
      recursiveListCategoryToPost ($category, $id, $lvlStr.'— ');
    }
  }
}


function recursiveEditCategory ($category, $category_parent_id = 0, $lvlStr = " ", $parent_id, $current_cat) {

  // The 5 nd parameters is user for blocking the case which current Category ID can chose itself as a parent Cat

  foreach ($category as $cat) {

    $id                 = $cat["id"];
    $name               = $cat['taxonomy_name'];
    $newCurrentParentID = $parent_id;

    if ($cat['taxonomy_parent'] == $category_parent_id) {
      if ($id == $current_cat) {
        // No display the current Category ID in the option select
      } elseif ( $parent_id == $id) {
        echo '<option value="'.$id.'" selected>'.$lvlStr.$name.'</option>';
      } else {
        echo '<option value="'.$id.'">'.$lvlStr.$name.'</option>';
      }

      recursiveEditCategory ($category, $id, $lvlStr.'— ', $newCurrentParentID, $id);
    }
  }
}

function recursivePostCategory ($category, $category_parent_id = 0, $lvlStr = '') {
  foreach ($category as $cat) {
    $id        = $cat['id'];
    $name      = $cat['taxonomy_name'];
    $parent_id = $cat['taxonomy_parent'];

    if ($parent_id == $category_parent_id) {
      echo '  <div class="checkbox">
                  <label>
                      <input type="checkbox" value="'.$id.'" name="postCatArr[]">
                     '.$lvlStr.$name.'
                  </label>
              </div>';
      recursivePostCategory($category, $id, $lvlStr.'— ');
    }
  }
}


?>