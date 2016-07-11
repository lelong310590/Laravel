<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Đăng nhập</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! asset('dashboard_src/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('dashboard_src/css/bootstrap-reset.css') !!}" rel="stylesheet">
    <!--external css-->
    <link href="{!! asset('dashboard_src/assets/font-awesome/css/font-awesome.css') !!}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{!! asset('dashboard_src/css/style.css') !!}" rel="stylesheet">
    <link href="{!! asset('dashboard_src/css/style-responsive.css') !!}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-body">

    <div class="container">
      <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">đăng nhập hệ thống</h2>
        <div class="login-wrap">
            @include('dashboard.globalMessages.error')
            @include('dashboard.globalMessages.flash')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" class="form-control" placeholder="Tên đăng nhập" autofocus name="inputUserLogin">
            <input type="password" class="form-control" placeholder="Mật khẩu" name="inputUserPassword">
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Ghi nhớ
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Quên mật khẩu?</a>

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Đăng nhập</button>
        </div>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->
      </form>

    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{!! asset('dashboard_src/js/jquery.js') !!}"></script>
    <script src="{!! asset('dashboard_src/js/bootstrap.min.js') !!}"></script>

  </body>
</html>