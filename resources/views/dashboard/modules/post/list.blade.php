@extends('dashboard.modules.main')
@section('title', 'Danh sách tin tức')
@section('content')
<!--main content start-->

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
                        <b>Danh sách tin tức</b>
                    </header>
                    <div class="panel-body">
                        @include('dashboard.globalMessages.error')
                        @include('dashboard.globalMessages.flash')
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                                    <th width="20px"><input type="checkbox" id="checkAllCategory"/></th>
                                    <th><i class="icon-user"></i> Tên tin tức</th>
                                    <th class="hidden-phone"><i class="icon-envelope"></i> Tạo bởi</th>
                                    <th><i class=" icon-edit"></i> Chuyên mục</th>
                                    <th><i class=" icon-edit"></i> Ngày khởi tạo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($postData as $post)
                                    <tr>
                                        <td><input type="checkbox" value="" name="postArr[]" class="checkCategory"></td>
                                        <td>{!! $post['post_name'] !!}</td>
                                        <td>{!! $post->user->toArray()['user_login'] !!}</td>
                                        <td></td>
                                        <td>{!! $post['updated_at'] !!}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>

    </section>
</section>
<!--main content end-->
@endsection