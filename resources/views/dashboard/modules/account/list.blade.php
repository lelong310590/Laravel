@extends('dashboard.master')
@section('title', 'Danh sách người dùng')
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
                      Danh sách tài khoản
                  </header>
                  <div class="panel-body">
                  	  @include('dashboard.globalMessages.flash')
	                  <table class="table table-striped table-advance table-hover">
	                      <thead>
	                      <tr>
	                      	  <th widh="10px">STT</th>
	                          <th><i class="icon-user"></i> Tên đăng nhập</th>
	                          <th class="hidden-phone"><i class="icon-envelope"></i> Địa chỉ Email</th>
	                          <th width="11%"><i class=" icon-edit"></i> Cấp độ</th>
	                          <th width="19%"></th>
	                      </tr>
	                      </thead>
	                      <tbody>
	                      		<?php $stt = 1 ?>
	                      		@foreach( $accounts as $account )
				                      <tr>
				                      	  <td>{!! $stt ++ !!}</td>
				                          <td class="hidden-phone"><a href="{!! route('getEditAccount', $account['id']) !!}">{!! $account['user_login'] !!}</a></td>
				                          <td>{!! $account['user_email'] !!}</td>
				                          <td>
				                          		@if (($account['id'] == 1) && ($account['user_level'] == 0))
													Super Aministrator
				                          		@elseif ($account['user_level'] == 0)
													Administrator
												@elseif ($account['user_level'] == 1)
													Moderator
												@elseif ($account['user_level'] == 2)
													Editor
				                          		@else
													Member
				                          		@endif 
				                          </td>
				                          <td>
				                          	 <!--  Permission for change user status
				                          	  SuperAdmin can change all other user, Administrator can change normal user, but can't change the user at the same level and can't change SuperAdmin User -->
				                          	  @if ($account['user_status'] == 1)
				                              	<a class="btn btn-success btn-xs" 
				                              	@if((Auth::user()->id != $account['id'] && (Auth::user()->user_level != $account['user_level'])) || ((Auth::user()->id == 1) && (Auth::user()->id != $account['id'])) ) 
				                              		href="{!! route('getChangeAccountStatus', $account['id']) !!}" 
				                              	@else 
				                              		data-toggle="modal" href='#modal-error-{!! $account['id'] !!}' 
				                              	@endif
				                              		><i class="icon-ok"></i> Đang hoạt động</a>
				                          	  @else 
				                              	<a class="btn btn-default btn-xs" 
				                              	@if(Auth::user()->id != $account['id'] && (Auth::user()->user_level != $account['user_level']) || ((Auth::user()->id == 1) && (Auth::user()->id != $account['id'])) ) 
				                              		href="{!! route('getChangeAccountStatus', $account['id']) !!}" 
				                              	@else 
				                              		data-toggle="modal" href='#modal-error-{!! $account['id'] !!}' 
				                              	@endif
				                              		><i class="icon-ban-circle"></i> Đang tạm khóa</a>
											  @endif
				                              <a class="btn btn-primary btn-xs" 

															
				                              @if (Auth::user()->user_level != $account['user_level'] || Auth::user()->id == 1)
				                              	href="{!! route('getEditAccount', $account['id']) !!}
				                              @else
				                              	data-toggle="modal" href="#modal-edit-{!! $account['id'] !!}
				                              @endif

				                              	"><i class="icon-pencil"></i> Sửa</a>
				                              <a class="btn btn-danger btn-xs" data-toggle="modal" href='#modal-{!! $account['id'] !!}'><i class="icon-trash "></i> Xóa</a>
				                          </td> 
				                      </tr>

				                      <!-- Modal for Change User' Level -->
				                      <div class="modal fade" id="modal-{!! $account['id'] !!}">
								      	<div class="modal-dialog">
								      		<div class="modal-content">
								      			<div class="modal-header ">
								      				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								      				<h4 class="modal-title">Thông báo</h4>
								      			</div>
							      				@if ($account['id'] == 1 && $account['user_level'] == 0)
									      			<div class="modal-body">
									      				Tài khoản <b>{!! $account['user_login'] !!}</b> là tài khoản quản trị cao cấp nhất, không thể xóa được !
									      			</div>
									      			<div class="modal-footer">
									      				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-reply"></i> Quay lại</button>
									      			</div>
							      				@elseif(Auth::user()->id == $account['id'])
													<div class="modal-body">
									      				Không thể xóa tài khoản <b>{!! $account['user_login'] !!}</b> vì tài khoản này bạn đang đăng nhập !
									      			</div>
									      			<div class="modal-footer">
									      				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-reply"></i> Quay lại</button>
									      			</div>
									      		@elseif(Auth::user()->user_level == $account['user_level'] && (Auth::user()->id != 1 ))
													<div class="modal-body">
									      				Không thể xóa tài khoản <b>{!! $account['user_login'] !!}</b> tài khoản này cùng cấp độ với tài khoản bạn đang đăng nhập !
									      			</div>
									      			<div class="modal-footer">
									      				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-reply"></i> Quay lại</button>
									      			</div>
							      				@else
													<div class="modal-body">
														Bạn có chắc chắn muốn xóa tài khoản <b>{!! $account['user_login'] !!}</b>, Mọi thông tin về tài khoản này sẽ bị xóa khỏi CSDL. Tài khoản bị xóa sẽ không thể khôi phục lại được, 
													</div>
													<div class="modal-footer">
									      				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-reply"></i> Quay lại</button>
									      				<a type="button" class="btn btn-danger" href="{!! route('getDeleteAccount', $account['id']) !!}"><i class="icon-trash"></i> Xóa tài khoản</a>
									      			</div>
							      				@endif
								      		</div>
								      	</div>
								      </div>

									  <!-- Modal for Delete a User -->
								      <div class="modal fade" id="modal-error-{!! $account['id'] !!}">
								      	<div class="modal-dialog">
								      		<div class="modal-content">
								      			<div class="modal-header">
								      				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								      				<h4 class="modal-title">Thông báo</h4>
								      			</div>
								      			@if (Auth::user()->user_level == $account['user_level'] && (Auth::user()->id != $account['id']))
								      				<div class="modal-body">
									      				Không thể thay đổi trạng thái của tài khoản <b>{!! $account['user_login'] !!}</b> tài khoản này cùng cấp độ với tài khoản bạn đang đăng nhập !
									      			</div>
								      			@else
									      			<div class="modal-body">
									      				Bạn không thể thay đổi trạng thái của tài khoản <b>{!! Auth::user()->user_name !!}</b>, vì tài khoản này bạn đang đăng nhập !
									      			</div>
								      			@endif
								      			<div class="modal-footer">
								      				<button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
								      			</div>
								      		</div>
								      	</div>
								      </div>

								      <div class="modal fade" id="modal-edit-{!! $account['id'] !!}">
								      	<div class="modal-dialog">
								      		<div class="modal-content">
								      			<div class="modal-header">
								      				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								      				<h4 class="modal-title">Thông báo</h4>
								      			</div>
								      			<div class="modal-body">
								      				Bạn không thể sửa tài khoản <b>{!! $account['user_login'] !!}</b>. tài khoản này cùng cấp độ với tài khoản bạn đang đăng nhập !
								      			</div>
								      			<div class="modal-footer">
								      				<button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
								      			</div>
								      		</div>
								      	</div>
								      </div>
								      <!-- page end-->
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