<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a href="index.html">
                    <i class="icon-dashboard"></i>
                    <span>Bảng điều khiển</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="<?php if (Route::is('getListAccount') || Route::is('getAddAccount') || Route::is('getEditAccount')) echo 'active'; ?>">
                    <i class="icon-group"></i>
                    <span>Tài khoản</span>
                </a>
                <ul class="sub">
                    <li><a href="{!! route('getListAccount') !!}">Danh sách tài khoản</a></li>
                    <li><a href="{!! route('getAddAccount') !!}">Thêm mới</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="<?php if ( Route::is('getListPost') || Route::is('getAddPost') || Route::is('getListAddCategory') || Route::is('getEditCategory') || Route::is('getListAddTags') || Route::is('postSearchCategory') || Route::is('postAddTags') || Route::is('getEditTags')) echo 'active'; ?>">
                    <i class="icon-file-text"></i>
                    <span>Tin tức</span>
                </a>
                <ul class="sub">
                    <li><a href="{!! route('getListPost') !!}">Danh sách Tin tức</a></li>
                    <li><a href="{!! route('getAddPost') !!}">Thêm mới</a></li>
                    <li><a href="{!! route('getListAddCategory') !!}">Chuyên mục</a></li>
                    <li><a href="{!! route('getListAddTags') !!}">Thẻ Tags</a></li>
                </ul>
            </li>
            <!--multi level menu end-->
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->