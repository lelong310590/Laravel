<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! asset('dashboard_src/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('dashboard_src/css/bootstrap-reset.css') !!}" rel="stylesheet">
    <!--external css-->
    <link href="{!! asset('dashboard_src/assets/font-awesome/css/font-awesome.css') !!}" rel="stylesheet" />
    <link href="{!! asset('dashboard_src/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') !!}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{!! asset('dashboard_src/css/owl.carousel.css') !!}" type="text/css">
    <!-- Custom styles for this template -->
    <link href="{!! asset('dashboard_src/css/style.css') !!}" rel="stylesheet">
    <link href="{!! asset('dashboard_src/css/style-responsive.css') !!}" rel="stylesheet" />

    @hasSection('title', 'Thêm tin tức mới')
      <link rel="stylesheet" type="text/css" href="{!! asset('dashboard_src/assets/bootstrap-fileupload/bootstrap-fileupload.css') !!}" />
    @endif
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <section id="container" >
        @include('dashboard.modules.head')

        @include('dashboard.modules.sidenav')
        
        @yield('content')

        <footer class="site-footer">
          <div class="text-center">
              2016 &copy; Development by longlengoc90@gmail.com
              <a href="#" class="go-top">
                  <i class="icon-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{!! asset('dashboard_src/js/jquery.js') !!}"></script>
    <script src="{!! asset('dashboard_src/js/jquery-1.8.3.min.js') !!}"></script>
    <script src="{!! asset('dashboard_src/js/bootstrap.min.js') !!}"></script>
    <script class="include" type="text/javascript" src="{!! asset('dashboard_src/js/jquery.dcjqaccordion.2.7.js') !!}"></script>
    <script src="{!! asset('dashboard_src/js/jquery.scrollTo.min.js') !!}"></script>
    <script src="{!! asset('dashboard_src/js/jquery.nicescroll.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('dashboard_src/js/jquery.sparkline.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('dashboard_src/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') !!}"></script>
    <script src="{!! asset('dashboard_src/js/owl.carousel.js') !!}" ></script>
    <script src="{!! asset('dashboard_src/js/jquery.customSelect.min.js') !!}" ></script>
    <script src="{!! asset('dashboard_src/js/respond.min.js') !!}" ></script>

    <script class="include" type="text/javascript" src="{!! asset('dashboard_src/js/jquery.dcjqaccordion.2.7.js') !!}"></script>

    <!--common script for all pages-->
    <script src="{!! asset('dashboard_src/js/common-scripts.js') !!}"></script>
    @if(Route::is('getMainDashboard'))
      <!--script for this page-->
      <script src="{!! asset('dashboard_src/js/sparkline-chart.js') !!}"></script>
      <script src="{!! asset('dashboard_src/js/easy-pie-chart.js') !!}"></script>
      <script src="{!! asset('dashboard_src/js/count.js') !!}"></script>
    @endif

    @if(Route::is('getEditAccount'))
      <!--custom switch-->
      <script src="{!! asset('dashboard_src/js/bootstrap-switch.js') !!}"></script>
    @endif

    @if(Route::is('getAddPost'))
      <script src="{!! asset('dashboard_src/assets/ckeditor/ckeditor.js') !!}"></script>
      <script src="{!! asset('dashboard_src/assets/bootstrap-fileupload/bootstrap-fileupload.js') !!}"></script>
      <script src="{!! asset('dashboard_src/js/jquery.tagsinput.js') !!}"></script>
      <script src="{!! asset('dashboard_src/js/form-component.js') !!}"></script>
    @endif

    @if(Route::is('getListAddTags') || Route::is('getListAddCategory') || Route::is('getListPost'))
      <script src="{!! asset('dashboard_src/js/custom/categories-script.js') !!}"></script>
    @endif

    @if(Route::is('getAddPost'))
      <script type="text/javascript">
        var editor = CKEDITOR.replace('inputContent',{
          language:'vi',
          filebrowserImageBrowseUrl : '{!! asset('dashboard_src/assets/ckfinder/ckfinder.html?Type=Images') !!}',
          filebrowserFlashBrowseUrl : '{!! asset('dashboard_src/assets/ckfinder/ckfinder.html??Type=Flash') !!}',
          filebrowserImageUploadUrl : '{!! asset('dashboard_src/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') !!}',
          filebrowserFlashUploadUrl : '{!! asset('dashboard_src/assets/ckfinder//core/connector/php/connector.php?command=QuickUpload&type=Flash') !!}',
        });
      </script>
    @endif

    <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
              autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

    </script>

  </body>
</html>
